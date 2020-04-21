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
					<form class="form-valide" action="{{ route('them-san-pham-gio-hang', $id) }}" method="post">
						{{ csrf_field() }}
						<div class="form-group row">
							<label class="col-lg-4 col-form-label" for="val-skill">Loại sản phẩm <span class="text-danger">*</span></label>
							<div class="col-lg-6">
								<select class="form-control" id="val-skill" name="loaisanpham">
									<option value="0" />vui lòng chọn
									@foreach($loaisanpham as $value)
									<option value="{{ $value['id'] }}" />{{ $value['tenloai'] }}
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label" for="val-email">Tên sản phẩm <span class="text-danger">*</span></label>
							<div class="col-lg-6">
								<input type="text" class="form-control" id="val-email" name="tensanpham" placeholder="Tên sản phẩm.." />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label" for="val-email">Giá nhập <span class="text-danger">*</span></label>
							<div class="col-lg-6">
								<input type="number" class="form-control" id="val-email" name="gianhap" placeholder="Giá bán.." />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label" for="val-email">Giá bán <span class="text-danger">*</span></label>
							<div class="col-lg-6">
								<input type="number" class="form-control" id="val-email" name="giaban" placeholder="Giá bán.." />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label" for="val-email">Số lượng <span class="text-danger">*</span></label>
							<div class="col-lg-6">
								<input type="number" class="form-control" id="val-email" name="soluong" placeholder="Số lượng.." />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label" for="val-email">Mô tả </label>
							<div class="col-lg-6">
								<input type="text" class="form-control" id="val-email" name="mota" placeholder="Mô tả.." />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label" for="val-email">Hình ảnh </label>
							<div class="col-lg-6">
								<input type="file" class="form-control" id="val-email" name="hinhanh" placeholder="Hình ảnh.." />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label" for="val-email">Màu sắc </label>
							<div class="col-lg-6">
								<input type="text" class="form-control" id="val-email" name="mausac" placeholder="Màu sắc.." />
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
				<h4>Danh sách thêm</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<form action="{{ route('them-san-pham-server', $id) }}" method="post">
						{{ csrf_field() }}
						<table class="table table-de mb-0">
							<thead>
								<tr>
									<th>Loại sản phẩm</th>
									<th>Tên sản phẩm</th>
									<th>Giá nhập</th>
									<th>Giá bán</th>
									<th>Số lượng</th>
									<th>Mô tả</th>
									<th>Hình ảnh</th>
									<th>Màu sắc</th>
								</tr>
							</thead>
							<tbody>
								@if($data_list != '')
								<?php $sumnhap = 0; $sumban = 0; ?>
								@foreach($data_list as $value)
								<?php 
									$loai = DB::table('loaisanpham')->where('id', $value['loaisanpham'])->first();
									$tongtiennhap = ($value['gianhap'] * $value['soluong']);
									$tongtienban = $value['giaban'] * $value['soluong'];
									$sumnhap += $tongtiennhap;
									$sumban += $tongtienban;
								?>
								<tr>
									<td>{{ $loai->tenloai }}</td>
									<td>{{ $value['tensanpham'] }}</td>
									<td>{{ number_format($value['gianhap']) }} vnd</td>
									<td>{{ number_format($value['giaban']) }} vnd</td>
									<td>{{ $value['soluong'] }}</td>
									<td>{{ $value['mota'] }}</td>
									<td>{{ $value['hinhanh'] }}</td>
									<td>{{ $value['mausac'] }}</td>
									<td>
										<a href="{{ route('xoa-san-pham-gio-hang', $value['id']) }}" class="btn btn-sm round btn-outline-danger">
											Xóa
										</a>
									</td>
								</tr>
								@endforeach
								@endif
								<tr>
									@if($data_list != 0)
									<td>Tổng tiền nhập: {{ number_format($sumnhap) }} vnd</td>
									<input type="hidden" name="tongtiennhap" value="{{$sumnhap }}">
									<td>Tổng tiền bán: {{ number_format($sumban) }} vnd</td>
									<input type="hidden" name="tongtienban" value="{{$sumban }}">
									@endif
									<td colspan="8">
										<a href="{{route('xoa-tat-ca-san-pham-gio-hang', $id)}}" class="btn btn-sm round btn-outline-primary mt-3 mb-3">Xóa tất cả</a>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label" for="val-email">Ngày nhập </label>
							<div class="col-lg-6">
								<input type="date" class="form-control" name="ngaynhap" placeholder="Ngày nhập.." />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-4 col-form-label" for="val-email">Ghi chú </label>
							<div class="col-lg-6">
								<input type="text" class="form-control" name="ghichu" placeholder="Ghi chú.." />
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