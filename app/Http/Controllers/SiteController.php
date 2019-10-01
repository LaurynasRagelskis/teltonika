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
}