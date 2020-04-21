<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sanpham;
use Cart;
use App\khachhang;
use App\phieuxuat;
use App\chitietphieuxuat;

class admiRelease extends Controller
{
	public function themsanpham($id, $id_product, Request $req)
	{
		$sanpham = sanpham::find($id_product);
		Cart::add(array(
		    'id' => $sanpham->id, // inique row ID
		    'name' => $sanpham->tensanpham,
		    'price' => $sanpham->giaban,
		    'quantity' => 1,
		));
		return redirect()->back();
	}

	public function xoatatcasanphamtronggiohangxuat($value='')
	{
		Cart::clear();
		return redirect()->back();
	}

	public function xoamotsanphamtronggiohangxuat($id)
	{
		Cart::remove($id);
		return redirect()->back();
	}

	public function suamotsanphamtronggiohangxuat(Request $req)
	{
		$sanpham = sanpham::find($req->id);
		if($sanpham->soluong < $req->qty)
		{
			echo "no";
		}
		else
		{
			Cart::update($req->id, array(
				'quantity' => array(
					'relative' => false,
					'value' => $req->qty
				)
			));
			echo "ok";
		}
	}

	public function luumotsanphamserver($id, Request $req)
	{
		$sdt = khachhang::where('sodienthoai', $req->sodienthoai)->first();
		if($sdt)
		{
			$key = Cart::getTotal();
			if($key >= 100000 && $key < 200000)
			{
				$sdt->sodiem = $sdt->sodiem + 1;
				$sdt->solanmua = $sdt->solanmua + 1;
				$sdt->sosanphammua = $sdt->sosanphammua + count(Cart::getContent());
				$sdt->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $sdt->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key >= 200000 && $key < 300000)
			{
				$sdt->sodiem = $sdt->sodiem + 2;
				$sdt->solanmua = $sdt->solanmua + 1;
				$sdt->sosanphammua = $sdt->sosanphammua + count(Cart::getContent());
				$sdt->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $sdt->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key >= 300000 && $key < 400000)
			{
				$sdt->sodiem = $sdt->sodiem + 3;
				$sdt->solanmua = $sdt->solanmua + 1;
				$sdt->sosanphammua = $sdt->sosanphammua + count(Cart::getContent());
				$sdt->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $sdt->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key >= 400000 && $key < 500000)
			{
				$sdt->sodiem = $sdt->sodiem + 4;
				$sdt->solanmua = $sdt->solanmua + 1;
				$sdt->sosanphammua = $sdt->sosanphammua + count(Cart::getContent());
				$sdt->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $sdt->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key >= 500000 && $key < 600000)
			{
				$sdt->sodiem = $sdt->sodiem + 5;
				$sdt->solanmua = $sdt->solanmua + 1;
				$sdt->sosanphammua = $sdt->sosanphammua + count(Cart::getContent());
				$sdt->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $sdt->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key >= 600000 && $key < 700000)
			{
				$sdt->sodiem = $sdt->sodiem + 6;
				$sdt->solanmua = $sdt->solanmua + 1;
				$sdt->sosanphammua = $sdt->sosanphammua + count(Cart::getContent());
				$sdt->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $sdt->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key >= 700000 && $key < 800000)
			{
				$sdt->sodiem = $sdt->sodiem + 7;
				$sdt->solanmua = $sdt->solanmua + 1;
				$sdt->sosanphammua = $sdt->sosanphammua + count(Cart::getContent());
				$sdt->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $sdt->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key >= 800000 && $key < 900000)
			{
				$sdt->sodiem = $sdt->sodiem + 8;
				$sdt->solanmua = $sdt->solanmua + 1;
				$sdt->sosanphammua = $sdt->sosanphammua + count(Cart::getContent());
				$sdt->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $sdt->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key >= 900000 && $key < 1000000)
			{
				$sdt->sodiem = $sdt->sodiem + 9;
				$sdt->solanmua = $sdt->solanmua + 1;
				$sdt->sosanphammua = $sdt->sosanphammua + count(Cart::getContent());
				$sdt->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $sdt->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key >= 1000000 && $key < 1100000)
			{
				$sdt->sodiem = $sdt->sodiem + 10;
				$sdt->solanmua = $sdt->solanmua + 1;
				$sdt->sosanphammua = $sdt->sosanphammua + count(Cart::getContent());
				$sdt->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $sdt->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key < 100000)
			{
				$sdt->sodiem = $sdt->sodiem + 0;
				$sdt->solanmua = $sdt->solanmua + 1;
				$sdt->sosanphammua = $sdt->sosanphammua + count(Cart::getContent());
				$sdt->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $sdt->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
		}
		else
		{
			$key = Cart::getTotal();

			if($key >= 100000 && $key < 200000)
			{
				$khachhang = new khachhang;
				$khachhang->tenkhachhang = $req->tenkhachhang;
				$khachhang->sodienthoai = $req->sodienthoai;
				$khachhang->sodiem = 1;
				$khachhang->solanmua = 1;
				$khachhang->sosanphammua = count(Cart::getContent());
				$khachhang->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $khachhang->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key >= 200000 && $key < 300000)
			{
				$khachhang = new khachhang;
				$khachhang->tenkhachhang = $req->tenkhachhang;
				$khachhang->sodienthoai = $req->sodienthoai;
				$khachhang->sodiem = 2;
				$khachhang->solanmua = 1;
				$khachhang->sosanphammua = count(Cart::getContent());
				$khachhang->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $khachhang->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key >= 300000 && $key < 400000)
			{
				$khachhang = new khachhang;
				$khachhang->tenkhachhang = $req->tenkhachhang;
				$khachhang->sodienthoai = $req->sodienthoai;
				$khachhang->sodiem = 3;
				$khachhang->solanmua = 1;
				$khachhang->sosanphammua = count(Cart::getContent());
				$khachhang->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $khachhang->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key >= 400000 && $key < 500000)
			{
				$khachhang = new khachhang;
				$khachhang->tenkhachhang = $req->tenkhachhang;
				$khachhang->sodienthoai = $req->sodienthoai;
				$khachhang->sodiem = 4;
				$khachhang->solanmua = 1;
				$khachhang->sosanphammua = count(Cart::getContent());
				$khachhang->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $khachhang->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key >= 500000 && $key < 600000)
			{
				$khachhang = new khachhang;
				$khachhang->tenkhachhang = $req->tenkhachhang;
				$khachhang->sodienthoai = $req->sodienthoai;
				$khachhang->sodiem = 5;
				$khachhang->solanmua = 1;
				$khachhang->sosanphammua = count(Cart::getContent());
				$khachhang->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $khachhang->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key >= 600000 && $key < 700000)
			{
				$khachhang = new khachhang;
				$khachhang->tenkhachhang = $req->tenkhachhang;
				$khachhang->sodienthoai = $req->sodienthoai;
				$khachhang->sodiem = 6;
				$khachhang->solanmua = 1;
				$khachhang->sosanphammua = count(Cart::getContent());
				$khachhang->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $khachhang->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key >= 700000 && $key < 800000)
			{
				$khachhang = new khachhang;
				$khachhang->tenkhachhang = $req->tenkhachhang;
				$khachhang->sodienthoai = $req->sodienthoai;
				$khachhang->sodiem = 7;
				$khachhang->solanmua = 1;
				$khachhang->sosanphammua = count(Cart::getContent());
				$khachhang->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $khachhang->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key >= 800000 && $key < 900000)
			{
				$khachhang = new khachhang;
				$khachhang->tenkhachhang = $req->tenkhachhang;
				$khachhang->sodienthoai = $req->sodienthoai;
				$khachhang->sodiem = 8;
				$khachhang->solanmua = 1;
				$khachhang->sosanphammua = count(Cart::getContent());
				$khachhang->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $khachhang->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key >= 900000 && $key < 1000000)
			{
				$khachhang = new khachhang;
				$khachhang->tenkhachhang = $req->tenkhachhang;
				$khachhang->sodienthoai = $req->sodienthoai;
				$khachhang->sodiem = 9;
				$khachhang->solanmua = 1;
				$khachhang->sosanphammua = count(Cart::getContent());
				$khachhang->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $khachhang->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key >= 1000000 && $key < 1100000)
			{
				$khachhang = new khachhang;
				$khachhang->tenkhachhang = $req->tenkhachhang;
				$khachhang->sodienthoai = $req->sodienthoai;
				$khachhang->sodiem = 10;
				$khachhang->solanmua = 1;
				$khachhang->sosanphammua = count(Cart::getContent());
				$khachhang->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $khachhang->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();

					$sanpham = sanpham::find($value['id']);
					$sanpham->soluong = $sanpham->soluong - $value['quantity'];
					$sanpham->save();

				}
				return redirect()->back();
			}
			elseif($key < 100000)
			{
				$khachhang = new khachhang;
				$khachhang->tenkhachhang = $req->tenkhachhang;
				$khachhang->sodienthoai = $req->sodienthoai;
				$khachhang->sodiem = 0;
				$khachhang->solanmua = 1;
				$khachhang->sosanphammua = count(Cart::getContent());
				$khachhang->save();

				$phieuxuat = new phieuxuat;
				$phieuxuat->id_user = $id;
				$phieuxuat->id_khachhang = $khachhang->id;
				$phieuxuat->tongsosanpham = count(Cart::getContent());
				$phieuxuat->tonggia = Cart::getTotal();
				$phieuxuat->trangthai = '1';
				$phieuxuat->ngaytao = date('d-m-Y');
				$phieuxuat->save();

				foreach (Cart::getContent() as $key => $value) {
					$chitietphieuxuat = new chitietphieuxuat;
					$chitietphieuxuat->id_phieuxuat = $phieuxuat->id;
					$chitietphieuxuat->id_sanpham = $value['id'];
					$chitietphieuxuat->giaxuat = $value['price'];
					$chitietphieuxuat->soluong = $value['quantity'];
					$chitietphieuxuat->thanhtien = $value['quantity'] * $value['price'];
					$chitietphieuxuat->save();
				}
				return redirect()->back();
			}
		}

	}
}
