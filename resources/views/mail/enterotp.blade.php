<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title></title>
</head>
<style type="text/css">
	.card {
    width: 350px;
    padding: 10px;
    border-radius: 20px;
    background: #fff;
    border: none;
    height: 350px;
    position: relative
}

.container {
    height: 100vh
}

body {
    background: #eee
}

.mobile-text {
    color: #989696b8;
    font-size: 15px
}

.form-control {
    margin-right: 12px
}

.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #ff8880;
    outline: 0;
    box-shadow: none
}

.cursor {
    cursor: pointer
}
</style>
<body>
<div class="d-flex justify-content-center align-items-center container">
    <div class="card py-5 px-3">
    	 @if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
        <h5 class="m-0">Email verification</h5><span class="mobile-text">Enter the code we just send on your email<b class="text-danger">--------</b></span>
        <form method="post" action="{{route('setpassword')}}">
        	@csrf
        <div class="d-flex flex-row mt-5">
        	<input type="text" name="otp">
        	<input type="hidden"  name="email" value="{{$email}}">
        </div>
         <div class="d-flex flex-row mt-5">
        	<input type="submit" name="submit" value="submit">
        </div>
    </form>
        <div class="text-center mt-5"><span class="d-block mobile-text">Don't receive the code?</span><span class="font-weight-bold text-danger cursor"><a href="#">Resend</a></span></div>
    </div>
</div>
</body>
</html>