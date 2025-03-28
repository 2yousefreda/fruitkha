@extends('layout.app')
@section('title') categoty @endsection
	
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
        @if ($categories!=null)
            
        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <ul>
                        <li class="active"  data-filter="*">All</li>
                        @foreach ($categories as $category )
                            
                        <li  data-filter=".{{$category->id}}">{{$category->name}}</li>
                        
                        @endforeach
                        
                    </ul>
                </div>
            </div>
        </div>
        @endif

        {{-- @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
         @endif --}}
         <?php
         if(session('error')){

              $msg =session('error') ;
              echo "<script type='text/javascript'>alert('$msg');</script>";
         }
         ?>
        <div class="row product-lists">
            @foreach ($products as $product)
            @php
                
                $path=Storage::url($product->imagepath)
            @endphp
            @if ($product->quantity>=0)
            <div class="col-lg-4 col-md-6 text-center  {{$product->category_id}}">
                <div class="single-product-item shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="product-image">
                        <a href="{{route('product.show',$product->id)}}"><img style="max-height: 250px; min-height: 250px;" src="{{ $path}}" alt=""></a>
                    </div>
                    <h3>{{$product->name}}</h3>
                    <p class="product-price"><span>Per Kg</span> {{$product->price}}$ </p>
                    @if($product->quantity==0)
                    <p class="product-quantity"><span>Quantity:</span> out of stock </p>
                    @else
                    <p class="product-quantity"><span>Quantity:</span> {{$product->quantity}} </p>

                    @endif
                    <form method="POST" action="{{route('cart.store',[$product->id,'quantity'=>1]) }}">
                        @csrf
                    
                    <input type="submit" value="Add to Cart"  class="cart-btn" ><i class="fas fa-shopping-cart"></i> </input>
                </form>
                </div>
            </div>
                
            @endif
                
            @endforeach
        
    </div>
</div>
<!-- end products -->
@endsection