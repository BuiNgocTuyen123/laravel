@extends('layout')
@section('content')
@foreach($product_details as $key => $value)
<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to('uploads/product/'.$value->product_image)}}" alt="" />
								<h3 style="background-color: rgb(27, 27, 42)">ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								<style>
									.imgct{
										width: 85px;
										height: 85px;
									}
								</style>
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img class="imgct" src="{{URL::to('fontend/img/img4.jpg')}}" alt=""></a>
										  <a href=""><img class="imgct" src="{{URL::to('fontend/img/img5.jpg')}}" alt=""></a>
										  <a href=""><img class="imgct" src="{{URL::to('fontend/img/img6.jpg')}}" alt=""></a>
										</div>
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i style="background-color: rgb(27, 27, 42)" class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i style="background-color: rgb(27, 27, 42)" class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2>{{$value->product_name}}</h2>
								<p>ID: {{$value->product_id}}</p>
								<span>
									<span style="color: #4e5150">{{number_format($value->product_price)}} VNĐ</span>
									<form action="{{URL::to('/save-cart')}}" method="POST">
										{{csrf_field()}}
										<label>Số lượng:</label>
										<input name="qty" type="number" value="1" min="1" @if($value->qty_remaining <= 0) disabled @endif />
										<input name="productid_hidden" type="hidden" value="{{$value->product_id}}" />
										<button style="background-color: rgb(27, 27, 42);border-radius:20px; color:white; width:200px;" type="submit" class="btn btn-fefault cart" @if($value->qty_remaining <= 0) disabled @endif>
											<i class="fa fa-shopping-cart"></i>
											Thêm vào giỏ hàng
										</button>
									</form>
								</span>
								<p><b>Tình trạng:</b> @if($value->qty_remaining > 0) Còn hàng @else Hết hàng @endif</p>
								<p><b>Điều kiện:</b> Mới 100%</p>
								<p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
								<p><b>Danh mục:</b> {{$value->category_name}}</p>
							</div>
						</div>
					</div><!--/product-details-->
                    <div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs" style="background: linear-gradient(to right, #4e5150, #c1d3e6, #f897c4,brown);">
								<li class="active" ><a href="#details" data-toggle="tab">Mô tả</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
								<li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<p>{!! $value->product_desc !!}</p>
							</div>
							<div class="tab-pane fade" id="companyprofile" >
								<p>{!! $value->product_content !!}</p>
							</div>
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					@endforeach
                    <div style="margin-top:100px;" class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center" style="color: #4e5150">Sản phẩm liên quan</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									@foreach($relate as $key => $lienquan)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}">
													<img src="{{URL::to('uploads/product/'.$lienquan->product_image)}}" alt="" />
													</a>
													<h2 style="color: #4e5150">{{number_format($lienquan->product_price).' '.'VNĐ'}}</h2>
													<p>{{$lienquan->product_name}}</p>
													<button style="background-color: rgb(27, 27, 42); border-radius:20px; margin-left:-10px;" type="submit" class="btn btn-fefault cart">
														<i class="fa fa-shopping-cart"></i>
														Thêm giỏ hàng
													</button>												</div>
											
										</div>
										</div>
									</div>
									@endforeach
								</div>
									
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i style="background-color: rgb(27, 27, 42)" class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i style="background-color: rgb(27, 27, 42)" class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->		
					@endsection