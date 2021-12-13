@extends('layouts.master')

@section('content')

	<div class="container p-3 my-3 border">
		<div class="container-fluid">
			<h3>Point Of Sale</h3>
			<div class="list-group p-3 my-3 border">
				<ul class="glyphicon glyphicon-plus">
					<a href="/customer/create">Add new Customer</a>
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
							<th>Status</th>
							<th>Action</th>
						</tr>
						<p hidden>
							{{ $total = 0 }}
						</p>
						@foreach($pointofSale as $item)
						<tr>
							<td>{{$item->Order_id}}</td>
							<td>{{$item->User_Fname}} {{$item->User_Lname}}</td>
							<td>{{$item->Product_name}}</td>
							<td>{{$item->Quantity}}</td>
							<td>{{$item->Rate}}</td>
							<td>{{$item->Amount}}</td>
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
						<p hidden>
							{{ $total = $total + $item->Amount }}
						</p>
						@endforeach
					</table>
					<div class="col-2">
						<h3>Total sales:</h3>
						<h2>{{ $total }}</h2>
					</div>
					{{$pointofSale->links()}}

				</div>
			</div>
				
		</div>		
	</div>

@endsection