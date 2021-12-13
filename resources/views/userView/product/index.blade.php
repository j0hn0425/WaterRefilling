@extends('layouts.masterUser')

@section('content')

	<div class="container p-3 my-3 border">
		<div class="container-fluid">
			<h3>Products</h3>
			<div class="list-group p-3 my-3 border">
				<ul class="glyphicon glyphicon-plus">
					{{-- <a href="/product/create">Add new Product</a> --}}
				</ul>					
				<div class="container">
					<table class="table table-bordered border-primary table-responsive">
						<tr>
							<th>Product Name</th>
							<th>Prize</th>
							<th>Description</th>
							{{-- <th>Action</th> --}}
						</tr>
						@foreach($products as $product)
						<tr>
							<td>{{$product->Product_name}}</td>
							<td>{{$product->Prize}}</td>
							<td>{{$product->Description}}</td>
							{{-- <td>
								<a href="/product/{{$product->Product_id}}">View</a> |
								<a href="/product/{{$product->Product_id}}/edit">Edit</a> |
								 <form action="product/{{$product->Product_id}}" method="POST">
								 	@csrf
								 	@method("DELETE")

								 	<input type="submit" name="submit" value="Delete">
								 </form>
							</td> --}}
						</tr>
						@endforeach
					</table>

					{{-- {{$products->links()}} --}}

				</div>
			</div>
				
		</div>		
	</div>

@endsection