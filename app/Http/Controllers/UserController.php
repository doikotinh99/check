<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userservices;
    public function __construct(UserService $userService)
    {
        $this->userservices = $userService;
    }

    //
    public function get($id = false){
        $result = $this->userservices->getProduct($id);
        return view("admin.pages.user_show", ['users' => $result]);
    }

    public function status($status){
        $result = $this->userservices->getProductStatus($status);
        return view("admin.pages.user_show", ['users' => $result, 'status' => $status]);
    }
    public function info(){
        $data = [
            'title' => "Thông tin người dùng",
            'pages' => ["pages.user_info"]
        ];
        return view('master_layout', $data);
    }
}
