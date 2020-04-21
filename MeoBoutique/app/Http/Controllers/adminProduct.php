<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaisanpham;
use App\phieunhap;
use App\sanpham;
use Cart;
class adminProduct extends Controller
{
	public function themsanpham($id, Request $req)
	{
		$loaisanpham = loaisanpham::get(['id', 'tenloai']);
		$data_list = $req->session()->get('data');
		return view('Products.insertproduct', compact('loaisanpham', 'id', 'data_list'));
	}

	public function themsanphamgiohang(Request $req)
	{
		$this->validate($req, 
			[
				'loaisanpham' => 'required',
				'tensanpham' => 'required',
				'gianhap' => 'required',
				'giaban' => 'required',
				'soluong' => 'required',
			],
			[
				'loaisanpham.required' => 'vui lòng nhập loại sản phẩm',
				'tensanpham.required' => 'vui lòng nhập tên sản phẩm',
				'gianhap.required' => 'vui lòng nhập giá nhập sản phẩm',
				'giaban.required' => 'vui lòng nhập giá ban sản phẩm',
				'soluong.required' => 'vui lòng nhập số lượng sản phẩm',
				// 'tensanpham.unique' => 'tên đã được sử dụng rồi'
			]
		);

		$data_list = $req->session()->get('data');
		if ($data_list==null){
			$data_list=array();
		}
		$data = array(
			'id' => time(),
			'loaisanpham' => $req->loaisanpham,
			'tensanpham' => $req->tensanpham,
			'gianhap' => $req->gianhap,
			'giaban' => $req->giaban,
			'soluong' => $req->soluong,
			'mota' => $req->mota,
			'hinhanh' => $req->hinhanh,
			'mausac' => $req->mausac
		);
		array_push($data_list, $data);
		$req->session()->put('data', $data_list);
		return redirect()->back();
	}
	public function xoasanphamgiohang($id, Request $req)
	{

		$data_list = $req->session()->get('data');
		foreach ($data_list as $key => $value) {
			if($value['id'] == $id){
				$a = array_search($key, array_keys($data_list));
				echo $a;
				unset($data_list[$a]);
			}	
			$req->session()->put('data', $data_list);
		}
		return redirect()->back();
	}

	public function xoatatcasanphamgiohang($id, Request $req)
	{
		$req->session()->forget('data');
		return redirect()->back();
	}

	public function postthemsanpham($id, Request $req)
	{
		$phieunhap = new phieunhap;
		$phieunhap->thongtinhap = $req->ghichu;
		$phieunhap->ngaynhap = $req->ngaynhap;
		$phieunhap->tongtiennhap = $req->tongtiennhap;
		$phieunhap->tongtienban = $req->tongtienban;
		$phieunhap->save();

		$data = $req->session()->get('data');
		foreach ($data as $value) {
			$sanpham = new sanpham;
			$sanpham->id_user = $id;
			$sanpham->id_phieunhap = $phieunhap->id;
			$sanpham->id_loaisanpham = $value['loaisanpham'];
			$sanpham->tensanpham = $value['tensanpham'];
			$sanpham->gianhap = $value['gianhap'];
			$sanpham->giaban = $value['giaban'];
			$sanpham->soluong = $value['soluong'];
			$sanpham->mota = $value['mota'];
			$sanpham->hinhanh = $value['hinhanh'];
			$sanpham->mausac = $value['mausac'];
			$sanpham->save();
		}
		$req->session()->forget('data');
		return redirect()->back()->with('thongbao', 'thêm sản phẩm thành công');
	}

	public function danhsachsanpham($id, Request $req)
	{
		$sanpham = sanpham::where('id_user', $id)->get();
		$data_list = Cart::getContent();
		return view('Products.hrmproduct', compact('sanpham', 'id', 'data_list'));
	}
}
