<?php

namespace App\Http\Controllers;

use Mail;
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
        $assign['topics'] = (new Topic)->getHotContents(10);
        $assign['articles'] = (new Article)->getHotContents(10);
        $assign['blogs'] = (new Blog)->getHotContents(10);

        return view('homes.index', $assign);
    }

    public function getJob()
    {
        return view('homes.wait');
    }
    public function getHouse()
    {
        return view('homes.wait');
    }
    public function getTrade()
    {
        return view('homes.wait');
    }
    public function getTao()
    {
        return view('homes.wait');
    }
    public function getSeller()
    {
        return view('homes.wait');
    }
    public function getLove()
    {
        return view('homes.wait');
    }
    public function getMore()
    {
        return view('homes.wait');
    }

}
