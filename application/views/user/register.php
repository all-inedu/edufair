<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<style type="text/css">
		.allin-registration {
			margin-top: 15vh;
			background: #efefef;
			padding: 2em;
			border-radius: 10px;
			box-shadow: 5px 5px 5px 0px rgb(0,0,0,0.1);
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="container">
			<div class="col-xl-6 offset-xl-3 allin-registration" style="margin-top:15vh;background:#efefef">
			<h3 class="text-center">Registration</h3>
			<br>
				<div class="row">
					<div class="col" data-page="1">
						<form method="post">
							<div class="form-group">
								<label>Full Name</label>
								<input type="fullname" class="form-control" placeholder="Mikhael Jackdad">
								<small></small>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="xxxxx@xxxx.com">
								<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Phone Number</label>
								<input type="text" class="form-control" id="exampleInputPassword1" placeholder="08xx xxxx">
							</div>
							<div class="form-group">
								<label>You came here as:</label>
								<div class="form-control border-0">
									<div class="form-check form-check-inline">
										<input class="form-check-input input-status" type="radio" name="input-status" value="parent">
										<label class="form-check-label" for="exampleRadios1">Parent</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input input-status" type="radio" name="input-status"" value="student" checked>
										<label class="form-check-label" for="exampleRadios1">Student</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Is this your first time attending ALL-in event?</label>
								<div class="form-control border-0">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="first_time" value="option1" checked>
										<label class="form-check-label" for="exampleRadios1">Yes</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="first_time" value="option1">
										<label class="form-check-label" for="exampleRadios1">No</label>
									</div>
								</div>
							</div>
							<br>
							<hr>
							<div class="form-group text-right">
								<button type="button" class="btn btn-primary navigate navigate-page-2">Next</button>
							</div>
						</form>
					</div>
					<div class="col" data-page="2" style="display: none">
						<form method="post">
							<div class="form-group">
								<label>What grade are you in?</label>
								<input type="number" class="form-control" name="grade" placeholder="" onchange="limit(this)" />
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">What school are you going to graduate from?</label>
								<select class="form-control">
									<option>Aldebaran Senior High School</option>
								</select>
								<small></small>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Where's your country destination to study abroad?</label>
								<select class="form-control">
									<option>United States</option>
								</select>
								<small></small>
							</div>
							<div class="form-group">
								<label>What's your intended major in university?</label>
								<select class="form-control">
									<option>Aldebaran University</option>
								</select>
								<small></small>
							</div>
							<div class="form-group">
								<label>I know this Edufair from</label>
								<input type="text" name="" class="form-control">
							</div>
							<br>
							<hr>
							<div class="form-group">
								<div class="row">
									<div class="col-xl-6 text-left"><button type="button" class="btn btn-primary navigate-page-1">Back</button></div>
									<div class="col-xl-6 text-right"><button type="button" class="btn btn-primary navigate-page-3">Next</button></div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function() {

	});

	$(".navigate-page-1").on('click', function() {
		$("div[data-page='2']").hide("slide", { direction: "right" }, 350, function() {
			$("div[data-page='1']").show("slide", { direction: "left" }, 350);
		});
	});

	$(".navigate-page-2").on('click', function() {
		$("div[data-page='1']").hide("slide", { direction: "left" }, 350, function() {
			$("div[data-page='2']").show("slide", { direction: "right" }, 350);
		});
	})
</script>
</html>