
@extends('welcome')
@section('content')
<link href="product.css" rel="stylesheet">

<style>
	.product-image-wrapper{
		border:solid 2px black;
		border-radius:10px;
	}
	.img{
		margin:10px;
	}
	.li:hover{
		background-color:brown;
		border-radius:10px;
	}
	.add-to-cart:hover{
		border-radius:20px;
		background-color:brown;
	}
	.product-image-wrapper:hover{
		transform: scale(0.9);
		border: solid brown 2px; /* Scale lớn hơn khi hover */
    }
</style>
<div class="features_items"><!--features_items-->
						<h2 class="title text-center" style="color: brown;">Sản phẩm mới nhất</h2>
						@foreach($all_product as $key => $product)
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
										<a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
											<img class="img" style="width:150px; height:150px;" src="{{URL::to('uploads/product/'.$product->product_image)}}" alt="" />
											</a>

											<h2>{{number_format($product->product_price).' '.'VNĐ'}}</h2>
											<p>{{$product->product_name}}</p>
											<a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li class="li"><a style="color:black;" href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
										<li class="li"><a style="color:black;"  href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
				
					</div><!--features_items-->
					<div class="pagination">
						{!! $all_product->onEachSide(1)->links('vendor.pagination.bootstrap-4') !!}
					</div>
@endsection
