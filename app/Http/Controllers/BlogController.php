<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(){
        $data = [
            'title' => "Tin tức | SALE3S",
            'pages' => ["pages.blogs_list", "pages.home_blogs", "pages.home_newsletter"]
        ];

        return view("master_layout", $data);
    }
}
