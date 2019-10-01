<?php
namespace App\Http\Controllers;

use App\Log;

class LogController extends Controller
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
     * Get all logs.
     *
     * @return Response
     */
    public function all()
    {
        try {
            $this->authorize('all', Log::class);

            return response()->json(['log' => Log::all()], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'you don\'t have permissions'], 404);
        }
    }

    /**
     * Get one log item.
     *
     * @param  integer  $id
     * @return Response
     */
    public function view($id)
    {
        try {
            $this->authorize('view', Log::class);

            $log = Log::findOrFail($id);
            return response()->json(['log' => $log], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'log item not found!'], 404);
        }
    }

    /**
     * Delete Todo's (available only for admin).
     *
     * @param  integer  $id
     * @return Response
     */
    public function clear()
    {
        try {
            $this->authorize('clear', Log::class);
            $count = Log::all()->count();

            if( Log::truncate() ) {
                Log::add('clear', 'Log data cleared.');
            }
            return response()->json(['message' => 'Log data cleared. Deleted items count: ' . $count], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'log data not found!'], 404);
        }
    }
}