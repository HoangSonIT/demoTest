<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>demo</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	
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
	<form action="{{route('sua', $post->id)}}" method="POST">
		<input type="hidden" name="_token" value={{csrf_token()}}>
		<div class="form-control">
			<label>NAME: </label>
			<input class="input-name" type="text" name="name" placeholder="Exp: Trần Hoàng Sơn" value="{{$post->name}}"required>
		</div>
		<div class="form-control">
			<label>EMAIL: </label>
			<input class="input-email" type="email" name="email" placeholder="Exp: Hoangsonitam@gmail.com" value="{{$post->email}}" required>
		</div>
		<div class="form-checkbox">
			<input type="checkbox" name="changePassword" id="changePassword"/> Tích ô vuông để đổi mật khẩu
		</div>
        <div class="form-control">
            <label>Password: </label>
            <input type="password" class="input-password" name="password" placeholder="Nhập mật khẩu" disabled="" />
        </div>

        <div class="form-control">
            <label>PasswordAgain: </label>
            <input type="password" id = "input-passwordAgain" class="input-password" name="passwordAgain" placeholder="Nhập lại mật khẩu" disabled="" />
        </div>	
		<div class="form-control">	
			<button type="submit">Sửa</button>
		</div>
	</form>
</body>
</html>
<script>
	$(document).ready(function(){
		$("#changePassword").change(function(){
			if($(this).is(":checked"))
			{
				$(".input-password").removeAttr('disabled');
			}else{
				$(".input-password").attr('disabled', '');
			}
		});
	});
</script>
<style type="text/css">
 .form-control{
 	text-align: center;
 	margin: 10px;
 	padding: 5px;
 	border: none;
 }
 .form-checkbox{
 	text-align: center;
 	margin: -10px -2% -10px 10px;
 }
 .input-password{
 	margin-right: 20px;
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
 #input-passwordAgain{
  	margin-right: 60px;
 	width: 20%;
 	height: 25px;
 }
</style>