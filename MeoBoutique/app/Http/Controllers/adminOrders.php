<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chitietphieuxuat;
use App\phieuxuat;
use App\khachhang;
use App\sanpham;
use App\chitietphieutra;
use App\phieutra;

class adminOrders extends Controller
{
    public function danhsachdonhang($id)
    {
    	$i = 1;
    	$phieuxuat = phieuxuat::where('trangthai', 1)->orderBy('created_at', 'desc')->get(['id_khachhang', 'tongsosanpham', 'id', 'tonggia', 'trangthai', 'created_at']);
    	return view('Orders.hrmorderproduct', compact('phieuxuat', 'i', 'id'));
    }

    public function danhsachdonhangdathanhtoan($id)
    {
    	$i = 1;
    	$phieuxuat = phieuxuat::where('trangthai', 0)->orderBy('created_at', 'desc')->get(['id_khachhang', 'tongsosanpham', 'id', 'tonggia', 'trangthai', 'created_at']);
    	return view('Orders.hrmporderproductpayment', compact('phieuxuat', 'i', 'id'));
    }

    public function chitietdonhang($id, $id_donhang)
    {
        $i = 1; $sum = 0;
        $phieuxuat = phieuxuat::find($id_donhang);
        $khachhang = khachhang::where('id', $phieuxuat->id_khachhang)->first();
        $chitietphieuxuat = chitietphieuxuat::where('id_phieuxuat', $phieuxuat->id)->get();
        return view('Orders.detailorderproduct', compact('i', 'sum', 'khachhang', 'phieuxuat', 'chitietphieuxuat'));
    }

    public function xacnhandonhang($id, $id_donhang)
    {
    	$phieuxuat = phieuxuat::find($id_donhang);
    	$phieuxuat->trangthai = 0;
    	$phieuxuat->save();
    	return redirect()->back();
    }

    public function getthemphieutradonhang($id, Request $req)
    {
        $sanpham = sanpham::get(['id', 'tensanpham']);
        $data_list = $req->session()->get('phieutra');
        $i = 1;
        $sum = 0;
        $khachhang = khachhang::get(['id', 'tenkhachhang']);
        return view('Orders.returnedordersproduct', compact('sanpham', 'id', 'data_list', 'i', 'khachhang', 'sum'));
    }

    public function postthemphieutradonhang(Request $req)
    {
        $data_list = $req->session()->get('phieutra');
        if ($data_list==null){
            $data_list=array();
        }
        $data = array(
            'id' => time(),
            'id_sanpham' => $req->id_sanpham,
            'soluong' => $req->soluong,
        );
        array_push($data_list, $data);
        $req->session()->put('phieutra', $data_list);
        return redirect()->back();
    }

    public function xoaphieutradonhang(Request $req)
    {
        $req->session()->forget('phieutra');
        return redirect()->back();
    }

    public function postluuphieutradonhang($id, Request $req)
    {
        $phieutra = new phieutra;
        $phieutra->id_user = $id;
        $phieutra->id_khachhang = $req->id_khachhang;
        $phieutra->tongsosanpham = $req->tongsosanpham;
        $phieutra->tonggia = $req->tongtien;
        $phieutra->ngaytao = $req->ngaytao;
        $phieutra->save();

        foreach ($req->session()->get('phieutra') as $key => $value) {
            $sanphamgiohang = \App\sanpham::where('id', $value['id_sanpham'])->first();
            $chitietphieutra = new chitietphieutra;
            $chitietphieutra->id_phieutra = $phieutra->id;
            $chitietphieutra->id_sanpham = $value['id_sanpham'];
            $chitietphieutra->soluong = $value['soluong'];
            $chitietphieutra->thanhtien = $sanphamgiohang->giaban * $value['soluong'];
            $chitietphieutra->save();
            $sanphamgiohang->soluong = $sanphamgiohang->soluong - $value['soluong'];
            $sanphamgiohang->save();
        }
        return redirect()->back()->with('thongbao', 'thêm phiếu trả thành công');
    }

    public function danhsachdonhangbitra($id)
    {
        $i = 1;
        $phieutra = phieutra::orderBy('created_at', 'desc')->get();
        return view('Orders.hrmorderreturn', compact('phieutra', 'i', 'id'));
    }

    public function chitietdonhangbitra($id, $id_donhang)
    {
        $i = 1; $sum = 0;
        $phieutra = phieutra::find($id_donhang);
        $khachhang = khachhang::where('id', $phieutra->id_khachhang)->first();
        $chitietphieutra = chitietphieutra::where('id_phieutra', $phieutra->id)->get();
        return view('Orders.detailorderproductreturn', compact('i', 'sum', 'khachhang', 'phieutra', 'chitietphieutra'));
    }
}
