@extends('layouts.master')

@section('content')

	<div class="container p-3 my-3 border">
		<div class="container-fluid">
			<h3>Customer</h3>
			<div class="list-group p-3 my-3 border">
				<ul class="glyphicon glyphicon-plus">
					<a href="/customer/create">Add new Customer</a>
				</ul>					
				<div class="container">
					<table class="table table-bordered border-primary table-responsive">
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Address</th>
							<th>Contact No</th>
							<th>Email</th>
							<th>User type</th>
							<th>Action</th>
						</tr>
						@foreach($user as $item)
						<tr>

							{{-- // $table->string('Cus_Fname');
							//    $table->string('Cus_Lname');
							//    $table->string('Cus_Address');
							//    $table->string('Cus_ContactNo');
							//    $table->string('Email');
							//    $table->string('Password');
							//    $table->string('Username'); --}}
							<td>{{$item->User_Fname}}</td>
							<td>{{$item->User_Lname}}</td>
							<td>{{$item->User_Address}}</td>
							<td>{{$item->ContactNo}}</td>
							<td>{{$item->email}}</td>
							<td>{{$item->user_type}}</td>
							<td>
								<a href="/customer/{{$item->id}}">View</a> |
								<a href="/customer/{{$item->id}}/edit">Edit</a> |
								 <form action="customer/{{$item->id}}" method="POST">
								 	@csrf
								 	@method("DELETE")

								 	<input type="submit" name="submit" value="Delete">
								 </form>
							</td>
						</tr>
						@endforeach
					</table>
					{{$user->links()}}
				</div>
			</div>				
		</div>		
	</div>

@endsection