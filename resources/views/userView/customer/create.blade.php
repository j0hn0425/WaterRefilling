@extends('layouts.masterUser')

@section('content')

	<div class="container p-3 my-3 border">
		<div class="container-fluid">
			<h3>Create new Customer</h3>
			
			<div class="container p-3 my-3 border">

			<form action="/customer" method="POST">
				@csrf
				<div class="row mb-3">
					<label for="inputCusFname" class="col-sm-2 col-form-label">Firts Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cusFname">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputCusLname" class="col-sm-2 col-form-label">Last Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cusLname">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputCusAddress" class="col-sm-2 col-form-label">Address</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cusAddress">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputCusContactNo" class="col-sm-2 col-form-label">Contact No.</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cusContactNo">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="email">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="password">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputUsername" class="col-sm-2 col-form-label">UserName</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="username">
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>				
			</div>		
	</div>

@endsection