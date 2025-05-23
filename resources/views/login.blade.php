<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="css/login_style.css">
</head>

<body>
	
	
	<!--Login form starts-->
	<section class="container-fluid">
		@if(session('loginError'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        {{ session('loginError') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
		<!--row justify-content-center is used for centering the login form-->
		<section class="row justify-content-center">
			<!--Making the form responsive-->
			<section class="col-12 col-sm-6 col-md-4">
				<form class="form-container" action="{{route('auth')}}" method="post">
					@csrf
					<!--Binding the label and input together-->
					<div class="form-group">
						<br><br><br><br>
						<h4 class="text-center font-weight-bold"> Login </h4>
						<label for="Inputuser1">Username</label>
						<input type="username" class="form-control" id="username" name="username" placeholder="Username">
					</div>
					<!--Binding the label and input together-->
					<div class="form-group">
						<label for="InputPassword1">Password</label>
						<input type="password" class="form-control" id="InputPassword1" name="password" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-primary btn-block">Sign in</button>
					

				</form>
			</section>
		</section>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>