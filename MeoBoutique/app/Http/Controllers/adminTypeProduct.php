<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaisanpham;
use App\sanpham;
use Auth;
class adminTypeProduct extends Controller
{
    public function getthemloaisanpham($id)
    {
    	$i = 1;
    	$loaisanpham = loaisanpham::get(['id', 'tenloai']);
    	return view('TypeProducts.inserttypeproduct', compact('id', 'loaisanpham', 'i'));
    }

    public function postthemloaisanpham(Request $req)
    {
    	$loaisanpham = new loaisanpham;
    	$loaisanpham->tenloai = $req->tenloaisanpham;
    	$loaisanpham->save();
    	return redirect()->back()->with(['flag' => 'success', 'thongbao' => 'thêm loại sản phẩm thành công']);
    }

    public function getsualoaisanpham($id)
    {
    	$loaisanpham = loaisanpham::find($id);
    	return view('TypeProducts.updatetypeproduct', compact('loaisanpham'));
    }

    public function postsualoaisanpham($id, Request $req)
    {
    	$user = Auth::check();
    	$id_user = Auth::user()['id'];
    	$loaisanpham = loaisanpham::find($id);
    	$loaisanpham->tenloai = $req->tenloaisanpham;
    	$loaisanpham->save();
    	return redirect()->route('them-loai-san-pham', $id_user);
    }

    public function getxoaloaisanpham($id)
    {
    	$checkempty = sanpham::where('id_loaisanpham', $id)->first();

    	if($checkempty != [])
    	{
    		return redirect()->back()->with(['flag' => 'danger', 'thongbao' => 'loại sản phẩm này có sản phẩm tồn tại. không cho xóa']);
    	}
    	else
    	{
    		$loaisanpham = loaisanpham::find($id);
    		$loaisanpham->delete();
    		return redirect()->back()->with(['flag' => 'success', 'thongbao' => 'xóa loại sản phẩm thành công']);
    	}
    }
}
