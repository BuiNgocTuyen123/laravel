<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | RE-Shopper</title>
    <link href="{{asset('fontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('fontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('fontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('fontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('fontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{('fontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png')}}">
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<style>
		 @import url('http://fonts.googleapis.com/css?family=poppins:ital,wght@0,400;0,500;1,500&display=swap');
*{
    padding: 0;
    margin: 0;
}
  .logo ion-icon:hover {
    color: red;  
  }
  header .logo ion-icon {
    font-size: 50px;
    color: white;
    animation: animate 4s infinite linear;
  }
  
  .logo ion-icon:hover {
  color: red;  
  animation: rotate 4s infinite linear, scaleUp 0.3s forwards; /* Kích hoạt cả hai animation khi hover */
}
  @keyframes animate {
    0% {
      transform: rotate(0deg);
    }
  
    100% {
      transform: rotate(360deg);
    }
  }
  @keyframes scaleUp {
  0% {
    transform: scale(1);
  }

  100% {
    transform: scale(1.3);
  }
}
	</style>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top" style="background-color: brown"><!--header_top-->
			<div class="container" >
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#" style="color:white;"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#" style="color:white;"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#" style="color:white;"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" style="color:white;"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" style="color:white;"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" style="color:white;"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#" style="color:white;"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		<div class="header-middle" style="background-color: black; height:100px;"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="logo">
							<a style="color: aliceblue" href="{{URL::to('/trang-chu')}}"> <ion-icon name="logo-react"></ion-icon>Reshop</a>
						   </div>

					</div>
					<style>
						.hi{
							color: azure;
						}
						.nav .ui:hover{
							width: 100px;
							background-color: chartreuse;
							border-radius: 20px;
							text-align: center;
							border: solid 2px yellow;
						}
						.nav .ui{
							background-color: black;
														width: 150px;
														text-align: center
						}
					</style>
					<div class="col-md-2">
					</div>
					<div class="col-sm-6">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<?php
								$customer_id = Session::get('customer_id');
								if($customer_id != NULL){
								?>
								<li><a class="ui" href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs hi"></i><b style="color:aliceblue">Thanh toán</b></a></li>
								<?php
								}else {
								?>
								<li><a class="ui" href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs hi"></i><b style="color:aliceblue">Thanh toán</b></a></li>
								<?php } ?>
								<li><a class="ui" href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart hi"></i><b style="color:aliceblue"> Giỏ hàng</b></a></li>
								<?php
								$customer_id = Session::get('customer_id');
								if($customer_id != NULL){
								?>
																<li><a class="ui"  href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock hi"></i><b style="color:aliceblue">Đăng xuất</b></a></li>
								<?php
								}else {
								?>
<li><a class="ui"  href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock hi"></i><b style="color:aliceblue">Đăng nhập</b></a></li>
									<?php } ?>
									<div style="margin-right:-330px;" class="search_box pull-right">
										<form action="{{URL::to('/tim-kiem')}}" method="POST">
											{{csrf_field()}}
										<input name="keywords_submit"  type="text" placeholder="Search"/>
											<input type="submit" name="search_items" class="btn btn-success btn-sm" value="tìm kiếm">
										</form>
									</div>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div style="width:1526px; margin-left:-256px; margin-top:-59px;" id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<img style="width:1500px;" src="{{('uploads/product/slider_2.jpg')}}" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<img style="width:1500px;" src="{{('uploads/product/slider4.jpg')}}" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<img style="width:1500px;" src="{{('uploads/product/slider5.jpg')}}" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2 style="color: brown">Danh mục sản phẩm</h2>
						<div style="background-color: rgb(189, 189, 206)" class="panel-group category-products" id="accordian"><!--category-productsr-->
							<ul class="nav nav-pills nav-stacked">
						@foreach($category as $key => $cate)
									<li style="background-color: rgb(27, 27, 42)" class="panel-title"><a  style="color: brown" href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
							@endforeach
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2 style="color:blueviolet">Thương hiệu sản phẩm</h2>
							<div style="background-color: rgb(189, 189, 206)" class="brands-name">
								<ul class="nav nav-pills nav-stacked">
								@foreach($brand as $key => $brand)
									<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}"> <span class="pull-right">(50)</span>{{$brand->brand_name}}</a></li>
									@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					@yield('content')
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer" style="background: linear-gradient(to right, #4e5150, #c1d3e6, #f897c4,brown);"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span style="color: black">Re</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{('fontend/img/iframe1.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{('fontend/img/iframe2.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{('fontend/img/iframe3.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{('fontend/img/iframe4.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="{{('fontend/img/map.png')}}" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button style="background-color: #4e5150" type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom" style="background: linear-gradient(to right,brown,#f897c4,#c1d3e6, #4e5150  );">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 RE-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
    <script src="{{asset('fontend/js/jquery.js')}}"></script>
	<script src="{{asset('fontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('fontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('fontend/js/price-range.js')}}"></script>
    <script src="{{asset('fontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('fontend/js/main.js')}}"></script>
<!-- ... Các script khác ... -->
<script>
$(document).ready(function() {
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        fetchProducts(url);
    });

    function fetchProducts(url) {
        $.ajax({
            url: url,
            success: function(data) {
                $('#product-list').html(data); // Assuming you have a div with id="product-list" that wraps your products.
            }
        });
    }
});

</script>

</body>
</html>