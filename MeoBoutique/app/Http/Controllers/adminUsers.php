<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Hash, Auth;
use App\User;
class adminUsers extends Controller
{
	public function dangki($value='')
	{
		return view('Users.dangki');
	}

	public function postdangki(Request $req)
	{
		$admin = new User;
		$admin->name = $req->name;
		$admin->username = $req->username;
		$admin->password = Hash::make($req->password);
		$admin->save();
		return redirect()->back();
	}

	public function dangnhap($value='')
	{
		return view('Users.dangnhap');
	}

	public function postdangnhap(Request $req)
	{
		if(Auth::attempt(array('username' => $req->username,'password' => $req->password), false, true))
		{
			$user = Auth::check();
			$id = Auth::user()['id'];

            return redirect()->route('trang-chu', $id);
		}
		else
		{
			return redirect()->back();
		}
	}
}
