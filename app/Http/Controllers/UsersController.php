<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    
    public function display( $id = '19' ) {

        $user = DB::table('users')
            ->where('id', '=', $id)
            ->get();
        return view('home', ['users' => $user]);
        
    }

}
