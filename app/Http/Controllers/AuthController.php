<?php
namespace App\Http\Controllers;

use App\Log;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    private $user_email;

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        try {

            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);

            if ( $user->save() ) {
                Log::add('register', 'New user registered.', $user->id);
            }

            return response()->json(['user' => $user, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        try {
            $credentials = $request->only(['email', 'password']);

            if (! $token = Auth::attempt($credentials)) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            Log::add('login','User logged in.');
            return $this->respondWithToken($token);
        }
        catch (\Exception $e) {
            return response()->json(['message' => 'user not logged'], 404);
        }
    }

    /**
     * Request new user password.
     *
     * @param  Request  $request
     * @return Response
     */
    public function requestNewPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if ( !$user || $user->role === 'role1') {
            return response()->json(['message' => 'user not found'], 404);
        }
        $user->psw_request_token = Str::random(14);
        $data = [
            'title' => 'You requested new password',
            'link' =>  $_SERVER['SCRIPT_URI'] . '/' . $user->psw_request_token
        ];

        $this->user_email = $user->email;

        Mail::send('emails.pswrequest', $data, function($msg) {
            $msg->to($this->user_email)->subject('Password reset request');
        });

        if (Mail::failures()) {
            return response()->json(['message' => 'E-mail is not sent, please try again later.'], 409);
        } else {
            $user->update();
            Log::add('password_reset_request', 'User request new password.', $user->id);
            return response()->json(['message' => 'E-mail is sent, please check your postbox.'], 200);
        }
    }

    /**
     * Reset user password with form.
     *
     * @param  string   $token
     * @return mixed
     */
    public function newPasswordForm($token)
    {
        $user = User::where('psw_request_token', $token)->first();

        if ( !$user) {
            return response()->json(['message' => 'user not found'], 404);
        }

        return view('reset', ['psw_request_token' => $token, 'message' => 'Wrong input']);
    }

    /**
     * Reset user password.
     *
     * @param  Request  $request
     * @param  string   $token
     * @return Response
     */
    public function resetPassword(Request $request, $token)
    {
        //validate incoming request
        $this->validate($request, [
            'password' => 'required|confirmed',
        ]);

        try {
            $user = User::where('psw_request_token', $token)->first();

            if ( !$user ) {
                return response()->json(['message' => 'user not found'], 404);
            }
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);
            $user->psw_request_token = null;

            if ( $user->update() ) {
                Log::add('password_reset', 'User reset password.', $user->id);
            }

            return response()->json(['user' => $user, 'message' => 'new password created'], 201);

        } catch (\Exception $e) {
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }
    }
}