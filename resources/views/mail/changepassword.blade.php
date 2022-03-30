<!DOCTYPE html>
<html>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title></title>
</head>
<style type="text/css">
	.pass_show{position: relative} 

.pass_show .ptxt { 

position: absolute; 

top: 50%; 

right: 10px; 

z-index: 1; 

color: #f36c01; 

margin-top: -10px; 

cursor: pointer; 

transition: .3s ease all; 

} 

.pass_show .ptxt:hover{color: #333333;} 
</style>
<body>
 
<!------ Include the above in your HEAD tag ---------->

<div class="container" style="padding-left: 450px" style="padding-top: 200px">
	<div class="row">
		<div class="col-sm-4">
		    <form method="post" action="{{route('newpassword')}}">
		    	@csrf
		    	
		       <label>New Password</label>
            <div class="form-group pass_show"> 
            	<input type="hidden"  name="email" value="{{$email}}">
                <input type="password" name="password"  class="form-control" placeholder="New Password"> 
            </div> 
		       <label>Confirm Password</label>
            <div class="form-group pass_show"> 
                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password"> 
            </div>
            <div class="form-group pass_show"> 
                <input type="submit"  class="form-control" name="submit" value="submit"> 
            </div> 
		    </form>
            
		</div>  
	</div>
</div>
</body>
</html>