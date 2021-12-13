@extends('layouts.master')

@section('content')

<div class="container p-3 my-3 border">
	<div class="container-fluid">
		<h3>Update Deliver</h3>
		
		<div class="container p-3 my-3 border">

			<form action="/manageOrder/{{$manageOrder->Order_id}}" method="POST">
				@csrf
				@method('PUT')
				<div class="row mb-3">
					<label for="inputProduct_name" class="col-sm-2 col-form-label">Product Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" readonly="true" value="{{$manageOrder->Product_id}}" name="product_id">
						<input type="text" class="form-control" readonly="true" value="{{$manageOrder->Order_id}}" name="order_id">
						<input type="text" class="form-control" readonly="true" value="{{$manageOrder->Product_name}}" name="Prodname">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputPrize" class="col-sm-2 col-form-label">Quantity</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" readonly="true" value="{{$manageOrder->Quantity}}" name="quantity">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputDescription" class="col-sm-2 col-form-label">Rate</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" value="{{$manageOrder->Rate}}" readonly="true" name="rate">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputDescription" class="col-sm-2 col-form-label">Total Amount</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" readonly="true" value="{{$manageOrder->Amount}}" name="total_Amount">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputDescription" class="col-sm-2 col-form-label">Date</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" readonly="true" value="{{$manageOrder->created_at}}" name="date">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputDescription" class="col-sm-2 col-form-label">Status</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" value="{{$manageOrder->Status}}" name="status">
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>				
		</div>		
	</div>
</div>

@endsection