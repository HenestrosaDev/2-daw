<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<header class="text-center py-4">
		<h1>Users</h1>
	</header>

	<main class="container">
		<form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
			<div class="row g-3">
				<div class="col-sm-12 text-center">
					<img src="/images/{{ $user->image ? $user->image->name : 'default.png' }}" width="150" alt="image of {{ $user->name }}">
					<input id="form_img" type="file" class="form-control mt-3 w-auto mx-auto" name="image_name" accept="image/*" aria-label="Upload image">
				</div>

				<div class="col-sm-6">
					<label for="form__name" class="form-label">Name</label>
					<input id="form__name" class="form-control" type="text" name="name" value="{{ $user->name }}">
				</div>

				<div class="col-sm-6">
					<label for="form__role" class="form-label">Role</label>
					<input id="form__role" class="form-control" type="text" name="role_id" value="{{ $user->role_id }}">
				</div>

				<div class="col-sm-6">
					<label for="form__email" class="form-label">Email</label>
					<input id="form__email" class="form-control" type="email" name="email" value="{{ $user->email }}">
				</div>

				<div class="col-12 text-center">
					<button class="btn btn-secondary" type="reset">Reset</button>
					<button class="btn btn-primary" type="submit" name="submit">Edit user</button>
				</div>

				@csrf
				@method('PATCH')
			</div>
		</form>
	</main>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>