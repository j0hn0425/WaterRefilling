@extends('layouts.master')

@section('content')

<div class="container p-3 my-3 border">
	<div class="container-fluid">
		<h3>Create Order</h3>

		<div class="container p-3 my-3 border">

			<form action="/order" method="POST">
				@csrf
				<div class="row mb-3" style="display: none;">
					<label for="inputProduct_name" class="col-sm-2 col-form-label" >Product ID</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="prod_id" value="{{$product->Product_id}}">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputProduct_name" class="col-sm-2 col-form-label">Product Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="prod_name" readonly="true" value="{{$product->Product_name}}">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputQuantity" class="col-sm-2 col-form-label">Quantity</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="quantity" name="Quantity" oninput="calculateTotal()">
					</div>
				</div>
			{{-- 	<div class="col-sm-4">
							<label for="inputPrize" class="col-sm-2 col-form-label">Quantity</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="Quantity" id="quantity" oninput="calculateTotal()">
							</div>
						</div> --}}
				<div class="row mb-3">
					<label for="inputPrize" class="col-sm-2 col-form-label">Price</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" readonly="true" id="rate" required="true" name="Rate" value="{{$product->Prize}}">
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputDescription" class="col-sm-2 col-form-label">Amount</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" readonly="true" id="amount" name="Amount">
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Order</button>
			</form>				
		</div>		
	</div>
</div>
@endsection


<script type="text/javascript">
		
	function calculateTotal(){

		var quantity = parseFloat(document.getElementById("quantity").value);
		var rate = parseFloat(document.getElementById("rate").value);
		var result = quantity * rate;
		debugger;
		console.log(result);
		if(quantity === "NaN"){
			document.getElementById("amount").value = "0.00";
		}
		else{
			document.getElementById("amount").value = result;
		}
	}		

</script>
