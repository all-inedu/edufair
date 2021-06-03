<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
	<style>
		body { font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans","Liberation Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"}
		button { background: #0E264C; border-radius: 3em; border: none; padding: .6em 1.5em; font-size: 20px; font-weight: bold; color: #FFF; }
		h3 { font-size: 1.75rem; }
		.container-fluid { width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; }
		.container { width: 50%; margin-right: auto; margin-left: auto; }
		.text-center { text-align: center }
	</style>
</head>
<body>
 	<div class="container-fluid">
	    <div class="container">
	    	<div class="row" style="padding-bottom: 20px">
	    		<div class="col-xl-8 offset-xl-2">
	    			<img src="<?php echo base_url(); ?>assets/home/logo_normal_small-300x68-1-e1593521308518.png" alt="https://all-inedu.com/">
	    		</div>
	    	</div>
	    	<div class="row pt-4" style="border-top: 1px solid #efefef">
	    		<div class="col-xl-8 offset-xl-2 text-center border-top pt-4">
	    			<h3>Email Verification</h3>
	    		</div>
	    	</div>
	    	<div class="row pt-4">
	    		<div class="col-xl-8 offset-xl-2 text-center">
	    			<p>
	    				Hi there!<br><br>
	    				Thank you for registering your email at ALL-in.
	    				<br>
	    				Please click on the link below to verify your email address.<br>
	    				The link will expire at 
	    			</p>
	    		</div>
	    	</div>
	    	<div class="row pt-4">
	    		<div class="col-xl-8 offset-xl-2 text-center">
	    			<a href="<?php echo $url; ?>">Click This Link</a>
	    		</div>
	    	</div>
	    	<div class="row pt-4">
	    		<div class="col-xl-8 offset-xl-2 text-center">
	    			<p style="font-size:14px">If you have not registered your email at ALL-in,<br>please ignore this email.</p>
	    		</div>
	    	</div>
	    	<div class="row pt-4">
	    		<div class="col-xl-8 offset-xl-2 text-center">
	    			<p style="font-size:12px">Please do not reply to this email<br><a href="https://all-inedu.com">www.All-inedu.com</a></p>
	    		</div>
	    	</div>
	    </div>
	</div>
</body>
</html>