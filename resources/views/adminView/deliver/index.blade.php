@extends('layouts.master')

@section('content')

	<div class="container p-3 my-3 border">
		<div class="container-fluid">
			<h3>Delivered List</h3>
			<div class="list-group p-3 my-3 border">
				<ul class="glyphicon glyphicon-plus">
					{{-- <a href="/customer/create">Add new Customer</a> --}}
				</ul>					
				<div class="container">
					<table class="table table-bordered border-primary table-responsive">
						<tr>
							<th>Order ID</th>
							<th>Name</th>
							<th>Product Name</th>
							<th>Date Delivered</th>
							<th>Action</th>
						</tr>
						@foreach($deliver as $item)
						<tr>
                            <td>{{$item->Delivery_Id}}</td>
							<td>{{$item->User_Fname}} {{$item->User_Lname}}</td>
							<td>{{$item->Product_name}}</td>
							<td>{{$item->Date_Delivered}}</td>
							<td>
								{{-- <a href="/manageOrder/{{$item->Delivery_Id}}">View</a> |
								<a href="/manageOrder/{{$item->Delivery_Id}}/edit">Edit</a> | --}}
								 <form action="delivery/{{$item->Delivery_Id}}" method="POST">
								 	@csrf
								 	@method("DELETE")

								 	<input type="submit" class="btn btn-danger" name="submit" value="Delete">
								 </form>
							</td>
						</tr>	
						@endforeach
					</table>
					{{$deliver->links()}}

				</div>
			</div>
				
		</div>		
	</div>
@endsection