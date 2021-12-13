@extends('layouts.master')

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
				{{-- <fieldset class="row mb-3">
					<legend class="col-form-label col-sm-2 pt-0">Radios</legend>
					<div class="col-sm-10">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
							<label class="form-check-label" for="gridRadios1">
								First radio
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
							<label class="form-check-label" for="gridRadios2">
								Second radio
							</label>
						</div>
						<div class="form-check disabled">
							<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
							<label class="form-check-label" for="gridRadios3">
								Third disabled radio
							</label>
						</div>
					</div>
				</fieldset> --}}
				{{-- <div class="row mb-3">
					<div class="col-sm-10 offset-sm-2">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck1">
							<label class="form-check-label" for="gridCheck1">
								Example checkbox
							</label>
						</div>
					</div>
				</div> --}}
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>				
			</div>		
	</div>

@endsection