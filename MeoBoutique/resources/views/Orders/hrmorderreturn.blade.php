@extends('master')
@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Danh sách đơn hàng đã bị trả</h4>
		<div class="table-responsive m-t-40">
			<input type="text" id="myInput" placeholder="điền từ khóa" class="form-control mb-2">
			<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên khách hàng</th>
						<th  style="width: 10%">Số lượng sản phẩm</th>
						<th>Tổng tiên</th>
						<th>Thời gian nhập</th>
						<th  style="width: 10%">Thao tác</th>
					</tr>
				</thead>
				<tbody id="myTable">
					@foreach($phieutra as $value)
					<?php $khachhang = \App\khachhang::where('id', $value['id_khachhang'])->first(); ?>
					<tr>
						<td>{{ $i++ }}</td>
						<td>{{ $khachhang->tenkhachhang }}</td>
						<td>{{ $value['tongsosanpham'] }}</td>
						<td>{{ number_format($value['tonggia']) }} vnd</td>
						<td>{{ date_format(date_create($value['created_at']),"(H:i) d-m-Y") }}</td>
						<td>
							<a href="{{ route('chi-tiet-don-hang-bi-tra', [$id, $value['id']]) }}" class="btn btn-primary">chi tiết</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
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
	});
</script>
@endsection