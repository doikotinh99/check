<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');

    }

    public function index(){
        $data = [
            'title' => "Quản trị webisite",
            'page' => "admin.pages.admin",
            'role' => Auth::user()->name
        ];
        return view("admin.admin", $data);
    }
}
