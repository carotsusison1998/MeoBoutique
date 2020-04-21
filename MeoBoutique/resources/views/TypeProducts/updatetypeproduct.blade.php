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
					<form class="form-valide" action="{{ route('sua-loai-san-pham', $loaisanpham->id) }}" method="post">
						{{ csrf_field() }}
						<div class="form-group row">
							<label class="col-lg-4 col-form-label" for="val-email">Tên loại sản phẩm <span class="text-danger">*</span></label>
							<div class="col-lg-6">
								<input type="text" class="form-control" id="val-email" name="tenloaisanpham" placeholder="Tên loại sản phẩm.." value="{{ $loaisanpham->tenloai }}" />
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-8 ml-auto">
								<button type="submit" class="btn btn-primary" style="width: 317px;">Cập nhật</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection