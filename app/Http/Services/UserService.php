<?php


namespace App\Http\Services;


use App\Models\User;

class UserService
{
    public function getProduct($id = false){
        if(!$id){
            return User::get();
        }else{
            return User::find($id)-> get();
        }
    }
    public function getProductStatus($status){
        return User::where("status", $status)->get();
    }
}
