
@extends('layout.app')
@section('title') Shop @endsection
	
@section('content')
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Shop</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
<!-- products -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row product-lists">
            @foreach ($products as $product)
            <?php
                $path=Storage::url($product->imagepath)
            ?>
                
            <div class="col-lg-4 col-md-6 text-center  {{$product->category_id}}">
                <div class="single-product-item shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="product-image">
                        <a href="{{route('product.show',$product->id)}}"><img style="max-height: 250px; min-height: 250px;" src="{{$path }}" alt=""></a>
                    </div>
                    <h3>{{$product->name}}</h3>
                    <p class="product-price"><span>Per Kg</span> {{$product->price}}$ </p>
                    <p class="product-quantity"><span>Quantity:</span> {{$product->quantity}} </p>
                    <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
            @endforeach
        
    </div>
</div>
<!-- end products -->
@endsection