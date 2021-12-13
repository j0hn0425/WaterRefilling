@extends('layouts.masterUser')

@section('content')

	<div class="container p-3 my-3 border">
		<div class="container-fluid">
			<h3>Create new Customer</h3>
			
			<div class="container p-3 my-3 border">

			<form action="/customer/{{$customer->Cus_id}}" method="POST">
				@csrf
				@method('PUT')
				<div class="row mb-3">
					<label for="inputCusFname" class="col-sm-2 col-form-label">Firts Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cusFname" value="{{$customer->Cus_Fname}}">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputCusLname" class="col-sm-2 col-form-label">Last Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cusLname" value="{{$customer->Cus_Lname}}">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputCusAddress" class="col-sm-2 col-form-label">Address</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cusAddress" value="{{$customer->Cus_Address}}">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputCusContactNo" class="col-sm-2 col-form-label">Contact No.</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cusContactNo" value="{{$customer->Cus_ContactNo}}">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="email" value="{{$customer->Email}}">
					</div>
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>				
			</div>		
	</div>

@endsection