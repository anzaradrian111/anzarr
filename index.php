<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootsrap CSS-->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<title>Aplikasi Kasir</title>
</head>
<body>
<section>
	<div class="container mt-5 pt-5">
		<div class="row">
			<div class="col-12 col-sm-7 col-md-6 m-auto">
				<div class="card border-0 shadow">
					<div class="card-body">
						<form action="config/proses_login.php" method="post">
							<div class="row mb-3 center">
								<h3><center>LOGIN PAGE</center></h3>
							</div>
							<div class="row mb-3">
								<label for="inputEmail3" class="col-sm-3 col-form-label">Username</label>
								<div class="col-sm-12">
								<input type="text" name="username" class="form-control">
								</div>

							</div>
							<div class="row mb-3">
							<label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
							<div class="col-sm-12">
							<input type="password" name="password" class="form-control">
							</div>
							</div>
							<button type="submit" class="btn btn-primary">Login</button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

</body>
</html>