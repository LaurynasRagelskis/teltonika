<?php
namespace App\Http\Controllers;

class SiteController extends Controller
{
    /**
     * Get the one page frontend.
     *
     * @return View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Return API request list.
     *
     * @return View
     */
    public function api()
    {
        $actions = [
            "POST 'register'",
            "POST 'login'",
            "POST 'password/request'",
            "GET 'password/request/{token}'",
            "POST 'password/request/{token}'",

            "GET 'profile'",
            "GET 'users'",
            "GET 'users/{id}'",

            "POST 'todo'",
            "GET 'todo'",
            "GET 'todo/{id}'",
            "PUT 'todo/{id}'",
            "DELETE 'todo/{id}'",

            "GET 'log'",
            "GET 'log/{id}'",
            "DELETE 'log'",
        ];
        return view('api', ['actions' => $actions]);
    }

}