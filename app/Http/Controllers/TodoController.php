<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class TodoController extends Controller
{
    private $user;

    /**
     * Instantiate a new TodoController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->user = Auth::user();
    }

    /**
     * Create new Todo.
     *
     * @param  Request  $request
     * @return Response
     */
    public function add(Request $request)
    {
        $this->validate($request, [
            'task' => 'required|string',
        ]);

        try {
            $this->authorize('add', Todo::class);

            $todo = new Todo();
            $todo->task = $request->input('task');
            $todo->user_id = $this->user->id;
            if($todo->save()) {
                Log::add('add', 'Created new todo id: ' . $todo->id);
            }
            return response()->json(['todo' => $todo, 'message' => 'CREATED'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Todo Registration Failed!'], 409);
        }
    }

    /**
     * Edit owned Todo (available only for user).
     *
     * @param  Request  $request
     * @param  integer  $id
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'task' => 'required|string',
        ]);

        try {
            $todo = Todo::findOrFail($id);
            $this->authorize('edit', $todo);

            $todo->task = $request->input('task');
            if($todo->update()) {
                Log::add('edit','Edited todo id: ' . $id);
            }
            return response()->json(['todo' => $todo, 'message' => 'UPDATED'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'task not found!'], 404);
        }
    }

    /**
     * Get Todo.
     *
     * @param  integer  $id
     * @return Response
     */
    public function view($id)
    {
        try {
            $todo = Todo::findOrFail($id);
            $this->authorize('view', $todo);

            return response()->json(['todo' => $todo], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'todo not found!'], 404);
        }
    }

    /**
     * Get all available Todo's.
     *
     * @return Response
     */
    public function all()
    {
        try {
            if($this->user->role == 'role2')
                $todo = Todo::where('user_id', $this->user->id)->get();
            elseif ($this->user->role == 'role1')
                $todo = Todo::all();

            return response()->json(['todo' => $todo], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'todo not found!'], 404);
        }
    }

    /**
     * Delete Todo's (available only for admin).
     *
     * @param  integer  $id
     * @return Response
     */
    public function delete($id)
    {
        try {
            $this->authorize('delete', Todo::class);

            $todo = Todo::findOrFail($id);
            if( $todo->delete() ) {
                Log::add('delete', 'Deleted todo id: ' . $id);
            }
            return response()->json(['message' => 'todo deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'todo not found!'], 404);
        }
    }
}