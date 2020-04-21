<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/dang-ki', ['as' => 'dang-ki', 'uses' => 'adminUsers@dangki']);
Route::post('/dang-ki', ['as' => 'dang-ki', 'uses' => 'adminUsers@postdangki']);
Route::get('/dang-nhap', ['as' => 'dang-nhap', 'uses' => 'adminUsers@dangnhap']);
Route::post('/dang-nhap', ['as' => 'dang-nhap', 'uses' => 'adminUsers@postdangnhap']);
Route::get('/dang-xuat', ['as' => 'dang-xuat', function(){
	$user = \Auth::check();
	if($user)
	{
		\Auth::logout();
		return redirect()->route('dang-nhap');
	}
}]);


Route::get('/{id}', ['as' => 'trang-chu', 'uses' => 'adminHome@trangchu']);


// them san pham
Route::get('/them-san-pham-gio-hang/{id}', ['as' => 'them-san-pham-gio-hang', 'uses' => 'adminProduct@themsanpham']);
Route::post('/them-san-pham-gio-hang/{id}', ['as' => 'them-san-pham-gio-hang', 'uses' => 'adminProduct@themsanphamgiohang']);
Route::get('/xoa-san-pham-gio-hang/{id}', ['as' => 'xoa-san-pham-gio-hang', 'uses' => 'adminProduct@xoasanphamgiohang']);
Route::get('/xoa-tat-ca-san-pham-gio-hang/{id}', ['as' => 'xoa-tat-ca-san-pham-gio-hang', 'uses' => 'adminProduct@xoatatcasanphamgiohang']);
Route::post('them-san-pham-server/{id}', ['as' => 'them-san-pham-server', 'uses' => 'adminProduct@postthemsanpham']);
// het

// danh sách sản phẩm
Route::get('danh-sach-san-pham/{id}', ['as' => 'danh-sach-san-pham', 'uses' => 'adminProduct@danhsachsanpham']);
// hết

// xuất giỏ hàng
Route::get('/xuat-san-pham-gio-hang/{id}/{id_product}', ['as' => 'xuat-san-pham-gio-hang', 'uses' => 'admiRelease@themsanpham']);
Route::get('/xoa-xuat-tat-ca-san-pham-gio-hang/{id}', ['as' => 'xoa-xuat-tat-ca-san-pham-gio-hang', 'uses' => 'admiRelease@xoatatcasanphamtronggiohangxuat']);
Route::get('/xoa-xuat-mot-san-pham-gio-hang/{id}', ['as' => 'xoa-xuat-mot-san-pham-gio-hang', 'uses' => 'admiRelease@xoamotsanphamtronggiohangxuat']);
Route::get('/sua-xuat-mot-san-pham-gio-hang/{id}', ['as' => 'sua-xuat-mot-san-pham-gio-hang', 'uses' => 'admiRelease@suamotsanphamtronggiohangxuat']);
Route::post('/luu-mot-san-pham-server/{id}', ['as' => 'luu-mot-san-pham-server', 'uses' => 'admiRelease@luumotsanphamserver']);
// hết

// danh sách đơn hàng
Route::get('danh-sach-don-hang/{id}', ['as' => 'danh-sach-don-hang', 'uses' => 'adminOrders@danhsachdonhang']);
Route::get('danh-sach-don-hang-da-thanh-toan/{id}', ['as' => 'danh-sach-don-hang-da-thanh-toan', 'uses' => 'adminOrders@danhsachdonhangdathanhtoan']);
Route::get('xac-nhan-don-hang/{id}/{id_donhang}', ['as' => 'xac-nhan-don-hang', 'uses' => 'adminOrders@xacnhandonhang']);
Route::get('chi-tiet-don-hang/{id}/{id_donhang}', ['as' => 'chi-tiet-don-hang', 'uses' => 'adminOrders@chitietdonhang']);
Route::get('them-phieu-tra-don-hang/{id}',['as' => 'them-phieu-tra-don-hang', 'uses' => 'adminOrders@getthemphieutradonhang']);
Route::post('them-phieu-tra-don-hang/{id}',['as' => 'them-phieu-tra-don-hang', 'uses' => 'adminOrders@postthemphieutradonhang']);
Route::get('xoa-tat-ca-phieu-tra-don-hang/{id}',['as' => 'xoa-tat-ca-phieu-tra-don-hang', 'uses' => 'adminOrders@xoaphieutradonhang']);
Route::post('luu-phieu-tra-don-hang/{id}',['as' => 'luu-phieu-tra-don-hang', 'uses' => 'adminOrders@postluuphieutradonhang']);

// hết

//loại sản phẩm
Route::get('them-loai-san-pham/{id}', ['as' => 'them-loai-san-pham', 'uses' => 'adminTypeProduct@getthemloaisanpham']);
Route::post('them-loai-san-pham/{id}', ['as' => 'them-loai-san-pham', 'uses' => 'adminTypeProduct@postthemloaisanpham']);
Route::get('sua-loai-san-pham/{id}', ['as' => 'sua-loai-san-pham', 'uses' => 'adminTypeProduct@getsualoaisanpham']);
Route::post('sua-loai-san-pham/{id}', ['as' => 'sua-loai-san-pham', 'uses' => 'adminTypeProduct@postsualoaisanpham']);
Route::get('xoa-loai-san-pham/{id}', ['as' => 'xoa-loai-san-pham', 'uses' => 'adminTypeProduct@getxoaloaisanpham']);
// hết



// doanh thu
Route::get('danh-thu-shop/{id}/{nam}', ['as' => 'danh-thu-shop', 'uses' => 'adminRevenue@getdoanhthushop']);
// hết


// cộng tác viên
Route::get('them-cong-tac-vien/{id}', ['as' => 'them-cong-tac-vien', 'uses' => 'adminCollaborators@getthemcongtacvien']);
// hết

