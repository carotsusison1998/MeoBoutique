@extends('master')
@section('content')
<h4 class="text-center m-4">Danh Thu Nhà Trọ Theo Từng Tháng Năm {{date('Y')}}</h4>
<div class="form-group bbb">
	<button class="tablink btn btn-warning" onclick="openCity('thang1', this, '#F772BD')" id="defaultOpen">Tháng 1</button>
	<button class="tablink btn btn-warning" onclick="openCity('thang2', this, '#F772BD')" id="defaultOpen">Tháng 2</button>
	<button class="tablink btn btn-warning" onclick="openCity('thang3', this, '#F772BD')" id="defaultOpen">Tháng 3</button>
	<button class="tablink btn btn-warning" onclick="openCity('thang4', this, '#F772BD')" id="defaultOpen">Tháng 4</button>
	<button class="tablink btn btn-warning" onclick="openCity('thang5', this, '#F772BD')" id="defaultOpen">Tháng 5</button>
	<button class="tablink btn btn-warning" onclick="openCity('thang6', this, '#F772BD')" id="defaultOpen">Tháng 6</button>
	<button class="tablink btn btn-warning" onclick="openCity('thang7', this, '#F772BD')" id="defaultOpen">Tháng 7</button>
	<button class="tablink btn btn-warning" onclick="openCity('thang8', this, '#F772BD')" id="defaultOpen">Tháng 8</button>
	<button class="tablink btn btn-warning" onclick="openCity('thang9', this, '#F772BD')" id="defaultOpen">Tháng 9</button>
	<button class="tablink btn btn-warning" onclick="openCity('thang10', this, '#F772BD')" id="defaultOpen">Tháng 10</button>
	<button class="tablink btn btn-warning" onclick="openCity('thang11', this, '#F772BD')" id="defaultOpen">Tháng 11</button>
	<button class="tablink btn btn-warning" onclick="openCity('thang12', this, '#F772BD')" id="defaultOpen">Tháng 12</button>
</div>
<div id="thang1" class="tabcontent">
	<div class="col-md-11 pr-5">
		<table class="table table-bordered table-inverse table-hover">
			<thead class="text-center">
				<tr>
					<th>Ngày</th>
					<th>Số đơn hàng</th>
					<th>Giá tiền</th>
					<th>Số đơn trả</th>
				</tr>
			</thead>
			<tbody>
				<?php $date = "01-".$nam; $summonth = 0; ?>
				@for($i = 1; $i <= 31; $i++)
				<?php
					$sum = 0;
					$phieuxuat = \App\phieuxuat::where('ngaytao', $i."-".$date)->get();
					foreach ($phieuxuat as $key => $value) {
						$sum += $value['tonggia'];
					}
					$summonth += $sum;

				?>
				<tr>
					<td>{{ $i }}-01-{{ $nam }}</td>
					<td>{{ count($phieuxuat) }}</td>
					<td>{{ number_format($sum) }} vnd</td>
					<td>{{ 0 }}</td>
				</tr>
				@endfor
				<tr>
					<td colspan="4">Tổng doanh thu: {{ number_format($summonth) }} vnd</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div id="thang2" class="tabcontent">
	<div class="col-md-11 pr-5">
		<table class="table table-bordered table-inverse table-hover">
			<thead class="text-center">
				<tr>
					<th>Ngày</th>
					<th>Số đơn hàng</th>
					<th>Giá tiền</th>
					<th>Số đơn trả</th>
				</tr>
			</thead>
			<tbody>
				<?php $date = "02-".$nam; $summonth = 0; ?>
				@for($i = 1; $i <= 31; $i++)
				<?php
					$sum = 0;
					$phieuxuat = \App\phieuxuat::where('ngaytao', $i."-".$date)->get();
					foreach ($phieuxuat as $key => $value) {
						$sum += $value['tonggia'];
					}
					$summonth += $sum;

				?>
				<tr>
					<td>{{ $i }}-02-{{ $nam }}</td>
					<td>{{ count($phieuxuat) }}</td>
					<td>{{ number_format($sum) }} vnd</td>
					<td>0</td>
				</tr>
				@endfor
				<tr>
					<td colspan="4">Tổng doanh thu: {{ number_format($summonth) }} vnd</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div id="thang3" class="tabcontent">
	<div class="col-md-11 pr-5">
		<table class="table table-bordered table-inverse table-hover">
			<thead class="text-center">
				<tr>
					<th>Ngày</th>
					<th>Số đơn hàng</th>
					<th>Giá tiền</th>
					<th>Số đơn trả</th>
				</tr>
			</thead>
			<tbody>
				<?php $date = "03-".$nam; $summonth=0; ?>
				@for($i = 1; $i <= 31; $i++)
				<?php
					$sum = 0;
					$phieuxuat = \App\phieuxuat::where('ngaytao', $i."-".$date)->get();
					foreach ($phieuxuat as $key => $value) {
						$sum += $value['tonggia'];
					}
					$summonth += $sum;
				?>
				<tr>
					<td>{{ $i }}-03-{{ $nam }}</td>
					<td>{{ count($phieuxuat) }}</td>
					<td>{{ number_format($sum) }} vnd</td>
					<td>0</td>
				</tr>
				@endfor
				<tr>
					<td colspan="4">Tổng doanh thu: {{ number_format($summonth) }} vnd</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div id="thang4" class="tabcontent">
	<div class="col-md-11 pr-5">
		<table class="table table-bordered table-inverse table-hover">
			<thead class="text-center">
				<tr>
					<th>Ngày</th>
					<th>Số đơn hàng</th>
					<th>Giá tiền</th>
					<th>Số đơn trả</th>
				</tr>
			</thead>
			<tbody>
				<?php $date = "04-".$nam; $summonth = 0; ?>
				@for($i = 1; $i <= 31; $i++)
				<?php
					$sum = 0;
					$phieuxuat = \App\phieuxuat::where('ngaytao', $i."-".$date)->get();
					foreach ($phieuxuat as $key => $value) {
						$sum += $value['tonggia'];
					}
					$summonth += $sum;
				?>
				<tr>
					<td>{{ $i }}-04-{{ $nam }}</td>
					<td>{{ count($phieuxuat) }}</td>
					<td>{{ number_format($sum) }} vnd</td>
					<td>0</td>
				</tr>
				@endfor
				<tr>
					<td colspan="4">Tổng doanh thu: {{ number_format($summonth) }} vnd</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div id="thang5" class="tabcontent">
	<div class="col-md-11 pr-5">
		<table class="table table-bordered table-inverse table-hover">
			<thead class="text-center">
				<tr>
					<th>Ngày</th>
					<th>Số đơn hàng</th>
					<th>Giá tiền</th>
					<th>Số đơn trả</th>
				</tr>
			</thead>
			<tbody>
				<?php $date = "05-".$nam; $summonth=0; ?>
				@for($i = 1; $i <= 31; $i++)
				<?php
					$sum = 0;
					$phieuxuat = \App\phieuxuat::where('ngaytao', $i."-".$date)->get();
					foreach ($phieuxuat as $key => $value) {
						$sum += $value['tonggia'];
					}
					$summonth += $sum;
				?>
				<tr>
					<td>{{ $i }}-05-{{ $nam }}</td>
					<td>{{ count($phieuxuat) }}</td>
					<td>{{ number_format($sum) }} vnd</td>
					<td>0</td>
				</tr>
				@endfor
				<tr>
					<td colspan="4">Tổng doanh thu: {{ number_format($summonth) }} vnd</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div id="thang6" class="tabcontent">
	<div class="col-md-11 pr-5">
		<table class="table table-bordered table-inverse table-hover">
			<thead class="text-center">
				<tr>
					<th>Ngày</th>
					<th>Số đơn hàng</th>
					<th>Giá tiền</th>
					<th>Số đơn trả</th>
				</tr>
			</thead>
			<tbody>
				<?php $date = "06-".$nam; $summonth=0; ?>
				@for($i = 1; $i <= 31; $i++)
				<?php
					$sum = 0;
					$phieuxuat = \App\phieuxuat::where('ngaytao', $i."-".$date)->get();
					foreach ($phieuxuat as $key => $value) {
						$sum += $value['tonggia'];
					}
					$summonth += $sum;
				?>
				<tr>
					<td>{{ $i }}-06-{{ $nam }}</td>
					<td>{{ count($phieuxuat) }}</td>
					<td>{{ number_format($sum) }} vnd</td>
					<td>0</td>
				</tr>
				@endfor
				<tr>
					<td colspan="4">Tổng doanh thu: {{ number_format($summonth) }} vnd</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div id="thang7" class="tabcontent">
	<div class="col-md-11 pr-5">
		<table class="table table-bordered table-inverse table-hover">
			<thead class="text-center">
				<tr>
					<th>Ngày</th>
					<th>Số đơn hàng</th>
					<th>Giá tiền</th>
					<th>Số đơn trả</th>
				</tr>
			</thead>
			<tbody>
				<?php $date = "07-".$nam; $summonth=0; ?>
				@for($i = 1; $i <= 31; $i++)
				<?php
					$sum = 0;
					$phieuxuat = \App\phieuxuat::where('ngaytao', $i."-".$date)->get();
					foreach ($phieuxuat as $key => $value) {
						$sum += $value['tonggia'];
					}
					$summonth += $sum;
				?>
				<tr>
					<td>{{ $i }}-07-{{ $nam }}</td>
					<td>{{ count($phieuxuat) }}</td>
					<td>{{ number_format($sum) }} vnd</td>
					<td>0</td>
				</tr>
				@endfor
				<tr>
					<td colspan="4">Tổng doanh thu: {{ number_format($summonth) }} vnd</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div id="thang8" class="tabcontent">
	<div class="col-md-11 pr-5">
		<table class="table table-bordered table-inverse table-hover">
			<thead class="text-center">
				<tr>
					<th>Ngày</th>
					<th>Số đơn hàng</th>
					<th>Giá tiền</th>
					<th>Số đơn trả</th>
				</tr>
			</thead>
			<tbody>
				<?php $date = "08-".$nam; $summonth=0; ?>
				@for($i = 1; $i <= 31; $i++)
				<?php
					$sum = 0;
					$phieuxuat = \App\phieuxuat::where('ngaytao', $i."-".$date)->get();
					foreach ($phieuxuat as $key => $value) {
						$sum += $value['tonggia'];
					}
					$summonth += $sum;
				?>
				<tr>
					<td>{{ $i }}-08-{{ $nam }}</td>
					<td>{{ count($phieuxuat) }}</td>
					<td>{{ number_format($sum) }} vnd</td>
					<td>0</td>
				</tr>
				@endfor
				<tr>
					<td colspan="4">Tổng doanh thu: {{ number_format($summonth) }} vnd</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div id="thang9" class="tabcontent">
	<div class="col-md-11 pr-5">
		<table class="table table-bordered table-inverse table-hover">
			<thead class="text-center">
				<tr>
					<th>Ngày</th>
					<th>Số đơn hàng</th>
					<th>Giá tiền</th>
					<th>Số đơn trả</th>
				</tr>
			</thead>
			<tbody>
				<?php $date = "09-".$nam; $summonth=0; ?>
				@for($i = 1; $i <= 31; $i++)
				<?php
					$sum = 0;
					$phieuxuat = \App\phieuxuat::where('ngaytao', $i."-".$date)->get();
					foreach ($phieuxuat as $key => $value) {
						$sum += $value['tonggia'];
					}
					$summonth += $sum;
				?>
				<tr>
					<td>{{ $i }}-09-{{ $nam }}</td>
					<td>{{ count($phieuxuat) }}</td>
					<td>{{ number_format($sum) }} vnd</td>
					<td>0</td>
				</tr>
				@endfor
				<tr>
					<td colspan="4">Tổng doanh thu: {{ number_format($summonth) }} vnd</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div id="thang10" class="tabcontent">
	<div class="col-md-11 pr-5">
		<table class="table table-bordered table-inverse table-hover">
			<thead class="text-center">
				<tr>
					<th>Ngày</th>
					<th>Số đơn hàng</th>
					<th>Giá tiền</th>
					<th>Số đơn trả</th>
				</tr>
			</thead>
			<tbody>
				<?php $date = "10-".$nam; $summonth=0; ?>
				@for($i = 1; $i <= 31; $i++)
				<?php
					$sum = 0;
					$phieuxuat = \App\phieuxuat::where('ngaytao', $i."-".$date)->get();
					foreach ($phieuxuat as $key => $value) {
						$sum += $value['tonggia'];
					}
					$summonth += $sum;
				?>
				<tr>
					<td>{{ $i }}-10-{{ $nam }}</td>
					<td>{{ count($phieuxuat) }}</td>
					<td>{{ number_format($sum) }} vnd</td>
					<td>0</td>
				</tr>
				@endfor
				<tr>
					<td colspan="4">Tổng doanh thu: {{ number_format($summonth) }} vnd</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div id="thang11" class="tabcontent">
	<div class="col-md-11 pr-5">
		<table class="table table-bordered table-inverse table-hover">
			<thead class="text-center">
				<tr>
					<th>Ngày</th>
					<th>Số đơn hàng</th>
					<th>Giá tiền</th>
					<th>Số đơn trả</th>
				</tr>
			</thead>
			<tbody>
				<?php $date = "11-".$nam; $summonth=0; ?>
				@for($i = 1; $i <= 31; $i++)
				<?php
					$sum = 0;
					$phieuxuat = \App\phieuxuat::where('ngaytao', $i."-".$date)->get();
					foreach ($phieuxuat as $key => $value) {
						$sum += $value['tonggia'];
					}
					$summonth += $sum;
				?>
				<tr>
					<td>{{ $i }}-11-{{ $nam }}</td>
					<td>{{ count($phieuxuat) }}</td>
					<td>{{ number_format($sum) }} vnd</td>
					<td>0</td>
				</tr>
				@endfor
				<tr>
					<td colspan="4">Tổng doanh thu: {{ number_format($summonth) }} vnd</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div id="thang12" class="tabcontent">
	<div class="col-md-11 pr-5">
		<table class="table table-bordered table-inverse table-hover">
			<thead class="text-center">
				<tr>
					<th>Ngày</th>
					<th>Số đơn hàng</th>
					<th>Giá tiền</th>
					<th>Số đơn trả</th>
				</tr>
			</thead>
			<tbody>
				<?php $date = "12-".$nam; $summonth=0; ?>
				@for($i = 1; $i <= 31; $i++)
				<?php
					$sum = 0;
					$phieuxuat = \App\phieuxuat::where('ngaytao', $i."-".$date)->get();
					foreach ($phieuxuat as $key => $value) {
						$sum += $value['tonggia'];
					}
					$summonth += $sum;
				?>
				<tr>
					<td>{{ $i }}-12-{{ $nam }}</td>
					<td>{{ count($phieuxuat) }}</td>
					<td>{{ number_format($sum) }} vnd</td>
					<td>0</td>
				</tr>
				@endfor
				<tr>
					<td colspan="4">Tổng doanh thu: {{ number_format($summonth) }} vnd</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<script>
	function openCity(cityName,elmnt,color) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablink");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].style.backgroundColor = "";
		}
		document.getElementById(cityName).style.display = "block";
		elmnt.style.backgroundColor = color;

	}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
@endsection