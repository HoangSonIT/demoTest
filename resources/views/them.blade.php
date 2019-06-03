<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>demo</title>
	<base href="{{asset('')}}" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	@if(count($errors) > 0)
		@foreach($errors->all() as $err)
		<div class="alert alert-danger">
			{{$err}}<br>
		</div>
		@endforeach	
	@endif
	@if(Session('thongbao'))
	<div class="alert alert-success">
		{{Session('thongbao')}}
	</div>
	@endif
	<form action="{{route('them')}}" method="POST">
		<input type="hidden" name="_token" value={{csrf_token()}}>
		<div class="form-control">
			<label>NAME: </label>
			<input class="input-name" type="text" name="name" placeholder="Exp: Trần Hoàng Sơn" required>
		</div>
		<div class="form-control">
			<label>EMAIL: </label>
			<input class="input-email" type="email" name="email" placeholder="Exp: Hoangsonitam@gmail.com" required>
		</div>
		<div class="form-control">
			<label>PASSWORD: </label>
			<input class="input-password" type="password" name="password" placeholder="8-32 characters" required>
		</div>	
		<div class="form-control">	
			<button type="submit">thêm</button>
		</div>
	</form>
</body>
</html>
<style type="text/css">
 .form-control{
 	text-align: center;
 	margin: 10px;
 	padding: 5px;
 	border: none;
 }
 .input-password{
 	margin-right: 35px;
 	width: 20%;
 	height: 25px;
 }
 .input-name{
 	margin-left: 1px;
 	height: 25px;
 	width: 20%;
 }
 .input-email{
 	height: 25px;
 	width: 20%;
 }
 button{
 	text-align: center;
 	width: 50px;
 	height: 35px;
 	border-radius: 5px;
 	background: #DCDCDC;
 }
</style>