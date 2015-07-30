<?php

namespace App\Http\Controllers;

use App\Category, App\Topic, App\Article, App\Blog;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Index page
     *
     * @return Response
     */
    public function index()
    {
        $assign['topics'] = (new Topic)->getHotContents(4);
        $assign['articles'] = (new Article)->getHotContents(6);
        $assign['blogs'] = (new Blog)->getHotContents(3);

        return view('homes.index', $assign);
    }

    /**
     * Zone page
     *
     * @return Response
     */
    public function zone()
    {
        return view('homes.zone');
    }

    /**
     * Contact page
     *
     * @return Response
     */
    public function contact()
    {
         return view('homes.contact');
    }
}
