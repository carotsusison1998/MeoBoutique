<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class adminHome extends Controller
{
    public function trangchu($id)
    {
    	$user = DB::table('users')->find($id);
    	if($user)
    	{
    		return view('Home.home');
    	}
    }
}
