<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get the authenticated User.
     *
     * @return Response
     */
    public function profile()
    {
        return response()->json(['user' => Auth::user()], 201);
    }

    /**
     * Get all Users.
     *
     * @return Response
     */
    public function all()
    {
        try {
            $this->authorize('all', User::class);

            return response()->json(['users' => User::all()], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'you don\'t have permissions'], 404);
        }
    }

    /**
     * Get one user.
     *
     * @param  integer  $id
     * @return Response
     */
    public function view($id)
    {
        try {
            $user = User::findOrFail($id);
            $this->authorize('view', $user);

            return response()->json(['user' => $user], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'user not found!'], 404);
        }
    }
}