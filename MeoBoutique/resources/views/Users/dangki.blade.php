<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng kí</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		body{
			padding: 0;
			margin: 0;
			font-family: sans-serif;
		}
		img{
			position: absolute;
			width: 100%;
			height: 740px;
			overflow: hidden;
			background-size: cover;
			background-repeat: no-repeat;
			background: center;
		}
		.signup{
			position: absolute;
			left: 55%;
			margin: 120px 0;
			overflow: hidden;

		}
		.signup h1{
			font-size: 32px;
			width: 80%;
			border-bottom: 5px solid #4caf50;
			transition: 0.5s;
		}
		.text-box{
			float: left;
			width: 80%;
			overflow: hidden;
			font-size: 20px;
			padding: 8px 0;
			margin: 8px 0;
			border-bottom: 1px solid #4caf50;
			transition: 0.5s;

		}
		.btn{
			width: 80%;
			background: none;
			border:2px solid #4caf50;
			color: black;
			padding: 5px;
			font-size: 18px;
			cursor: pointer;
			margin-top: 25px;
			transition: 0.5s;

		}
		.text-box input{
			border:none;
			outline: none;
			background: none;
			float: left;
			margin-left: 10px;
			color: black;

		}
		.text-box i{
			float: left;
			border:none;
			outline: none;
			background: none;
			transition: 0.5s;

		}
		.btn:hover{
			background-color: #4caf50;
			color: black;
		}
		@media (max-width: 680px) {\
			img{
				width: 100%;
				margin-left: 100px; 
			}
			.text-box{
				width: 100%;
				height: 100%;
				margin: 20px 0;
			}
		}
	</style>
</head>
<body>
	<img src="hinh2.jpg" alt="">
	<div class="signup">
		<form action="{{ route('dang-ki') }}" method="post">
			{{ csrf_field() }}
			<h1>Đăng Kí Admin Mẹo Boutique</h1>
			<div class="text-box">
				<i class="fa fa-users"></i>
				<input type="text" placeholder="name" name="name" value="">
			</div>
			<div class="text-box">
				<i class="fa fa-lock"></i>
				<input type="text" placeholder="Username" name="username" value="">
			</div>
			<div class="text-box">
				<i class="fa fa-lock"></i>
				<input type="password" placeholder="password" name="password" value="">
			</div>
			<input type="submit" class="btn" value="Sign up">
		</form>
	</div>
</body>
</html>