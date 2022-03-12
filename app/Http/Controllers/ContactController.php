<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){
        $data = [
            'title' => "Về chúng tôi | SALE3S",
            'pages' => ["pages.contact"]
        ];

        return view("master_layout", $data);
    }
}
