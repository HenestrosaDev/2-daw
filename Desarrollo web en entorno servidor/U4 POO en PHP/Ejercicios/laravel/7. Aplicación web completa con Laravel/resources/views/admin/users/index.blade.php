<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
</head>

<body>
	<h1 class="text-center py-4">Users</h1>

	<main class="container">
		<div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">Id</th>
						<th scope="col">Role id</th>
						<th scope="col">Role name</th>
						<th scope="col">Image</th>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Created at</th>
						<th scope="col">Updated at</th>
					</tr>
				</thead>
				<tbody>
					@if(!empty($users))
						@foreach($users as $user)
							<tr>
								<th scope="row">{{ $user->id }}</th>
								<td>{{ $user->role_id }}</td>
								<td>{{ $user->role->name }}</td>
								<td><img src="/images/{{ $user->image ? $user->image->name : 'default.png' }}" width="150" alt="image of {{ $user->name }}"></td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->created_at }}</td>
								<td>{{ $user->updated_at }}</td>
								<td><a class="btn btn-warning" href="{{ route('users.edit', $user->id) }}"><i class="fas fa-edit"></i></a></td>
								<td><a class="btn btn-danger" href="{{ route('users.destroy', $user->id) }}"><i class="fas fa-trash"></i></a></td>
							</tr>
						@endforeach
					@else
						<p>gfg</p>
					@endif
				</tbody>
			</table>
		</div>

		@if(Session::has('user_edited'))
			<div class="alert alert-success text-center" role="alert">
  			{!! session('user_edited') !!}
			</div>
		@endif
	</main>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>