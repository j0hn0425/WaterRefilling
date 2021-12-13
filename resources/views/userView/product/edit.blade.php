@extends('layouts.masterUser')

@section('content')

	<div class="container p-3 my-3 border">
		<div class="container-fluid">
			<h3>Create new Product</h3>
			
			<div class="container p-3 my-3 border">

			<form action="/product/{{$product->Product_id}}" method="POST">
				@csrf
				@method('PUT')
				<div class="row mb-3">
					<label for="inputProduct_name" class="col-sm-2 col-form-label">Product Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Prodname" value="{{$product->Product_name}}">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputPrize" class="col-sm-2 col-form-label">Prize</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Prodprize" value="{{$product->Prize}}">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="ProdDesc" value="{{$product->Description}}">
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>				
			</div>		
	</div>

@endsection