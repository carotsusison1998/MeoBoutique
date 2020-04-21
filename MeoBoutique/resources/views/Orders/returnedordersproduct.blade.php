@extends('master')
@section('content')
<div class="row justify-content-center">
	
	<div class="col-lg-7">
		@if(count($errors)>0)
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</div>
		@endif
		@if(Session::has('thongbao'))
		<div class="alert alert-success">
			{{ Session::get('thongbao') }}
		</div>
		@endif
		<div class="card">
			<div class="card-body">
				<div class="form-validation">
					<form class="form-valide" action="{{ route('them-phieu-tra-don-hang', $id) }}" method="post">
						{{ csrf_field() }}
						<div class="form-group row">
							<label class="col-lg-4 col-form-label" for="val-skill">Loại sản phẩm <span class="text-danger">*</span></label>
							<div class="col-lg-6">
								<select class="form-control" id="val-skill" name="id_sanpham">
									<option value="0" />vui lòng chọn
									@foreach($sanpham as $value)
									<option value="{{ $value['id'] }}" />{{ $value['tensanpham'] }}
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label" for="val-email">Số lượng <span class="text-danger">*</span></label>
							<div class="col-lg-6">
								<input type="number" class="form-control" min="1" id="val-email" name="soluong" placeholder="Số lượng.." />
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-8 ml-auto">
								<button type="submit" class="btn btn-primary" style="width: 317px;">Thêm mới</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-11">
		<div class="card">
			<div class="card-title">
				<h4>Danh sách trả hàng</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<form action="{{ route('luu-phieu-tra-don-hang', $id) }}" method="post">
						{{ csrf_field() }}
						<table class="table table-de mb-0">
							<thead>
								<tr class="text-center">
									<th>STT</th>
									<th>Tên sản phẩm</th>
									<th>Giá bán</th>
									<th>Số lượng</th>
									<th>Thành tiền</th>
									<th>Thao tác</th>
								</tr>
							</thead>
							<tbody>
								@if($data_list)

								@foreach($data_list as $value)
								<?php 
									$sanphamgiohang = \App\sanpham::where('id', $value['id_sanpham'])->first();
									$sum += $sanphamgiohang->giaban * $value['soluong'];
								?>
								<tr>
									<td class="text-center">{{ $i++ }}</td>
									<td class="text-center">{{ $sanphamgiohang->tensanpham }}</td>
									<td class="text-center">{{ number_format($sanphamgiohang->giaban) }} vnd</td>
									<td class="text-center">{{ $value['soluong'] }}</td>
									<td class="text-center">{{ number_format($sanphamgiohang->giaban * $value['soluong']) }} vnd</td>
									<td>
										<a href="" class="btn btn-danger">xóa</a>
									</td>
								</tr>
								@endforeach
								<tr>
									<td class="text-center">
										tổng số sản phẩm: {{ count($data_list) }}
										<input type="hidden" name="tongsosanpham" value="{{count($data_list)}}">
									</td>
									<td class="text-center">
										tổng tiền: {{ number_format($sum) }} vnd
										<input type="hidden" name="tongtien" value="{{$sum}}">
									</td>
									<td colspan="5">
										<a href="{{ route('xoa-tat-ca-phieu-tra-don-hang', $id) }}" class="btn btn-warning">xóa tất cả</a>
									</td>
								</tr>
								@endif
							</tbody>
						</table>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label" for="val-email">Khách hàng </label>
							<div class="col-lg-6">
								<select class="form-control" id="val-skill" name="id_khachhang">
									<option value="0" />vui lòng chọn
									@foreach($khachhang as $value)
									<option value="{{ $value['id'] }}" />{{ $value['tenkhachhang'] }}
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label" for="val-email">Ngày nhập </label>
							<div class="col-lg-6">
								<input type="date" class="form-control" name="ngaytao" placeholder="Ngày nhập.." />
							</div>
						</div>
						<button type="submit" class="form-control btn btn-outline-success mt-5"><b>Lưu</b></button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection