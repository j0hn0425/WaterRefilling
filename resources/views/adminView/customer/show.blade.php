@extends('layouts.master')

@section('content')

	<div class="container p-3 my-3 border">
		<div class="container-fluid">
			<h3>Create new Customer</h3>
			
			<div class="container p-3 my-3 border">

			{{-- <form action="/customer" method="POST">
				@csrf --}}
				<div class="row mb-3">
					<label for="inputCusFname" class="col-sm-2 col-form-label">Firts Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cusFname" value="{{$user[0]->User_Fname}}" disabled="true">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputCusLname" class="col-sm-2 col-form-label">Last Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cusLname" value="{{$user[0]->User_Lname}}" disabled="true">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputCusAddress" class="col-sm-2 col-form-label">Address</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cusAddress" value="{{$user[0]->User_Address}}" disabled="true">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputCusContactNo" class="col-sm-2 col-form-label">Contact No.</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cusContactNo" value="{{$user[0]->ContactNo}}" disabled="true">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="email" value="{{$user[0]->email}}" disabled="true">
					</div>
				</div>

				{{-- <button type="submit" class="btn btn-info">Back</button> --}}
			{{-- </form>				 --}}
			</div>		
	</div>

@endsection