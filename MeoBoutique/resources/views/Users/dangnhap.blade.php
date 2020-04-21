<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		body{
			padding: 0px;
			margin: 0px;
			font-family: sans-serif;
			background-color: #B6A7A7;
			color: white;
			text-align: center;
			width: 100%;
			height: 100%;
			text-shadow: 2px 2px 10px #cc0000;
		}
		img{
			width: 45%;
			height: 730px;
			margin-top: -100px;
		}
		.login{
			width: 280px;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}

		.login h1{
			float: left;
			font-size: 40px;
			border-bottom: 6px solid #4caf50;
		}
		.text-box{
			float: left;
			width: 100%;
			overflow: hidden;
			font-size: 20px;
			padding: 8px 0;
			margin: 8px 0;
			border-bottom: 1px solid #4caf50;
		}
		.text-box input{
			border:none;
			outline: none;
			background: none;
			color: white;
			float: left;
			margin-left: 10px;

		}
		.text-box i{
			float: left;
			border:none;
			outline: none;
			background: none;
		}
		.btn{
			width: 100%;
			background: none;
			border:2px solid #4caf50;
			color: white;
			padding: 5px;
			font-size: 18px;
			cursor: pointer;
		}
		.btn:hover{
			background-color: #4caf50;
			color: black;
		}
		@media (max-width: 650px) {
			.login{
				width: 100%;
			}
			.login h1{
				width: 100%;
			}
			img{
				width: 100%;
			}
		}
	</style>
</head>
<body>
	<img src="1.png" alt="">
	<div class="login">
		<form action="{{ route('dang-nhap') }}" method="post">
			{{ csrf_field() }}
			<h1>Đăng Nhập Mẹo Boutique</h1>
			<div class="text-box">
				<i class="fa fa-user"></i>
				<input type="text" placeholder="username" name="username" value="">
			</div>
			<div class="text-box">
				<i class="fa fa-lock"></i>
				<input type="password" placeholder="password" name="password" value="">
			</div>
			<input type="submit" class="btn" value="Sign in">
		</form>
	</div>
</body>
</html>