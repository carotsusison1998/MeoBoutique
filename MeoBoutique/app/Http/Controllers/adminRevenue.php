<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminRevenue extends Controller
{
    public function getdoanhthushop($id, $nam)
    {
    	$songay = 30;
		$phieuxuat = \App\phieuxuat::get();
    	return view('Revenues.revenueproduct', compact('songay', 'nam', 'phieuxuat'));
    }
}
