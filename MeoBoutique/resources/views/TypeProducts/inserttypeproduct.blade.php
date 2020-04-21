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
		@if(Session::has('flag'))
		<div class="alert alert-{{Session::get('flag')}}"> 
			{{Session::get('thongbao')}}
		</div>
		@endif
		<div class="card">
			<div class="card-body">
				<div class="form-validation">
					<form class="form-valide" action="{{ route('them-loai-san-pham', $id) }}" method="post">
						{{ csrf_field() }}
						<div class="form-group row">
							<label class="col-lg-4 col-form-label" for="val-email">Tên loại sản phẩm <span class="text-danger">*</span></label>
							<div class="col-lg-6">
								<input type="text" class="form-control" id="val-email" name="tenloaisanpham" placeholder="Tên loại sản phẩm.." />
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
				<h4>Danh sách loại sản phẩm</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="display nowrap table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên loại</th>
								<th>Số sản phẩm</th>
								<th>Thao tác</th>
							</tr>
						</thead>
						<tbody>
							@foreach($loaisanpham as $value)
							<?php 
							$sanpham = \App\sanpham::where('id_loaisanpham', $value['id'])->get();
							?>
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $value['tenloai'] }}</td>
								<td>{{ count($sanpham) }}</td>
								<td>
									<a href="{{ route('sua-loai-san-pham', $value['id']) }}" class="btn btn-info">sửa</a>
									<a href="{{ route('xoa-loai-san-pham', $value['id']) }}" class="btn btn-danger">xóa</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection