@extends('master')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title" id="lol">Danh sách mua sản phẩm</h4>
				<div class="table-responsive m-t-40">
					<form action="{{ route('luu-mot-san-pham-server', $id) }}" method="post">
						{{ csrf_field() }}
						<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>STT</th>
									<th>Tên sản phẩm</th>
									<th>Giá bán</th>
									<th>Số lượng</th>
									<th>Loại sản phẩm</th>
									<th>Thao tác</th>
								</tr>
							</thead>
							<tbody id="myTable">
								@if($data_list)
									<?php $i = 1; ?>
								@foreach($data_list as $value)
									<?php 
									$sanphamgiohang = DB::table('sanpham')->where('id', $value['id'])->first();
									$loaitronggiohang = DB::table('loaisanpham')->where('id', $sanphamgiohang->id_loaisanpham)->first();
									?>
								<tr>
									<td>{{ $i++}}</td>
									<td>{{ $value->name }}</td>
									<td>{{ number_format($value->price) }} vnd</td>
									<td style="width: 90px">
										<input type="number" name="" value="{{ $value['quantity'] }}" class="form-control qty" min="1">
										<input type="hidden" value="{{ $value['id'] }}" class="form-control id">
									</td>
									<td>{{ $loaitronggiohang->tenloai }}</td>
									<td>
										<a class="btn btn-info sua" style="color: white">sửa</a>
										<a href="{{ route('xoa-xuat-mot-san-pham-gio-hang', $value['id']) }}" class="btn btn-danger">xóa</a>
									</td>
								</tr>
								@endforeach
								<tr>
									<td colspan="1">
										Số lượng: {{count(\Cart::getContent())}}
									</td>
									<td colspan="5">
										Tổng tiền: {{number_format(\Cart::getTotal())}} vnd
									</td>
								</tr>
								<tr>
									<td colspan="6"><a href="{{ route('xoa-xuat-tat-ca-san-pham-gio-hang', $id) }}" class="btn btn-primary">xóa tất cả</a></td>
								</tr>
								@endif
							</tbody>
						</table>
						<div class="form-group row mt-2">
							<label class="col-lg-3" for="val-email">Tên khách hàng <span class="text-danger">*</span></label>
							<div class="col-lg-3">
								<input type="text" class="form-control" id="val-email" required="" name="tenkhachhang" placeholder="Tên khách hàng.." />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label" for="val-email">Số điện thoại <span class="text-danger">*</span></label>
							<div class="col-lg-3">
								<input type="text" class="form-control" id="val-email" required="" name="sodienthoai" placeholder="Số điện thoại.." />
							</div>
						</div>
						<button class="btn btn-outline-success mt-3 mb-3"><b>Xuất đơn hàng</b></button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Danh sách sản phẩm</h4>
				<div class="table-responsive m-t-40">
					<input type="text" id="myInput" placeholder="điền từ khóa" class="form-control mb-2">
					<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên sản phẩm</th>
								<th>Giá nhập</th>
								<th>Giá bán</th>
								<th>Số lượng</th>
								<th>Loại sản phẩm</th>
								<th>Thao tác</th>
							</tr>
						</thead>
						<tbody id="myTable">
							<?php $i = 1; ?>
							@foreach($sanpham as $value)
							<?php 
								$loai = DB::table('loaisanpham')->where('id', $value['id_loaisanpham'])->first();
							?>
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $value['tensanpham'] }}</td>
								<td>{{ number_format($value['gianhap']) }} vnd</td>
								<td>{{ number_format($value['giaban']) }} vnd</td>
								<td>{{ number_format($value['soluong']) }}</td>
								<td>{{ $loai->tenloai }}</td>
								<td>
									<a href="" class="btn btn-danger">xóa</a>
									<a href="" class="btn btn-info">sửa</a>
									<a href="{{ route('xuat-san-pham-gio-hang', [$id, $value['id']]) }}" class="btn btn-success">Xuất</a>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){

		$("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});

		$(".sua").click(function(){
			var id = $(this).parent().parent().find(".id").val();
			var qty = $(this).parent().parent().find(".qty").val();
			$id = id;

			$.ajax({
				url: '{{route('sua-xuat-mot-san-pham-gio-hang', $id)}}',
				type: 'get',
				data: {"id":id, "qty":qty},
				success: function(data){
					if(data == "ok")
					{	
						alert('sửa thành công');
						location.reload();
					}
					else{
						alert('sửa thất bại');
						location.reload();
					}
				}
			});
		})

	});
</script>
@endsection