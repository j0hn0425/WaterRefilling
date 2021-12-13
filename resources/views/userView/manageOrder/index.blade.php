@extends('layouts.masterUser')

@section('content')

	<div class="container p-3 my-3 border">
		<div class="container-fluid">
			<h3>Manage Order</h3>
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
							<th>Quantity</th>
							<th>Amount</th>
							<th>Total Amount</th>
							<th>Date Time</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
						@foreach($manageOrder as $item)
						<tr>

							{{-- // $table->string('Cus_Fname');
							//    $table->string('Cus_Lname');
							//    $table->string('Cus_Address');
							//    $table->string('Cus_ContactNo');
							//    $table->string('Email');
							//    $table->string('Password');
							//    $table->string('Username'); --}}
							<td>{{$item->Order_id}}</td>
							<td>Harry</td>
							<td>{{$item->Product_name}}</td>
							<td>{{$item->Quantity}}</td>
							<td>{{$item->Rate}}</td>
							<td>{{$item->Amount}}</td>
							<td>{{$item->created_at}}</td>
							<td>{{$item->Status}}</td>
							<td>
								<a href="/manageOrder/{{$item->Order_id}}">View</a> |
								<a href="/manageOrder/{{$item->Order_id}}/edit">Edit</a> |
								 <form action="manageOrder/{{$item->Order_id}}" method="POST">
								 	@csrf
								 	@method("DELETE")

								 	<input type="submit" name="submit" value="Delete">
								 </form>
							</td>
						</tr>	
						@endforeach
					</table>
					{{-- {{$manageOrder->links()}} --}}

				</div>
			</div>
				
		</div>		
	</div>

@endsection