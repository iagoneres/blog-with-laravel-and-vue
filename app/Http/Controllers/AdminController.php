<?php

namespace App\Http\Controllers;

use App\Entities\Article;
use App\Entities\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumb = json_encode([
            ['title' => 'Admin', 'url' => ""]
        ]);

        $totalUsers     = User::count();
        $totalArticles  = Article::count();

        return view('admin', compact('breadcrumb', 'totalUsers', 'totalArticles'));
    }
}
