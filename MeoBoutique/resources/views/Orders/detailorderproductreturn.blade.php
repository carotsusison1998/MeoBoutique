@extends('master')
@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Chi tiết đơn hàng bị trả số {{ $phieutra->id }} của: {{ $khachhang->tenkhachhang }}</h4>
		<div class="table-responsive m-t-40">
			<input type="text" id="myInput" placeholder="điền từ khóa" class="form-control mb-2">
			<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>STT</th>
						<th>Sản phẩm</th>
						<th>Giá</th>
						<th  style="width: 10%">Số lượng sản phẩm</th>
						<th>Thành tiền</th>
					</tr>
				</thead>
				<tbody id="myTable">
					@foreach($chitietphieutra as $value)
					<?php 
						$sanpham = \App\sanpham::where('id', $value['id_sanpham'])->first();
						$sum += $value['thanhtien'];
					?>
					<tr>
						<td>{{ $i++ }}</td>
						<td>{{ $sanpham->tensanpham }}</td>
						<td>{{ number_format($sanpham->giaban) }} vnd</td>
						<td>{{ $value['soluong'] }}</td>
						<td>{{ number_format($value['thanhtien']) }} vnd</td>
					</tr>
					@endforeach 
					<tr>
						<td colspan="5">Tổng tiền: {{ number_format($sum) }} vnd</td>
					</tr>
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