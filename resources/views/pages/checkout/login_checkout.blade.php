
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{asset('fontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('fontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('fontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('fontend/css/price-range.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<style>
    @import url("https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css");
@import url("https://unicons.iconscout.com/release/v2.1.9/css/unicons.css");
@import url("https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900");
body {
    font-family: "Poppins", sans-serif;
    font-weight: 300;
    font-size: 15px;
    line-height: 1.7;
    background: linear-gradient(to right, #4e5150, #c1d3e6, #f897c4,brown); /* Gradient from left to right */  }
  a {
    cursor: pointer;
    transition: all 200ms linear;
  }
  
  a:hover {
    text-decoration: none;
  }
  
  link {
    color: #c4c3ca;
  }
.link:hover{
color: #ffeba7;
}  
p {
    font-weight: 500;
    font-size: 14px;
    line-height: 1.7;
  }
  
  h4 {
    font-weight: 600;
  }
  
  h6 span{
    padding: 0 20px;
    text-transform: uppercase;
    font-weight: 700;
  }
  .section{
    position: relative;
    width: 100%;
    display: block;
  }
  .full-height{
    min-height: 100vh;
  }
  [type="checkbox"]{
    position: absolute;
    appearance: none;
  }
  .checkbox:checked+label,
  .checkbox:not(:checked)+label{
    position: relative;
    display: block;
    text-align: center;
    width: 60px;
    height: 16px;
    background-color: #ffeba7;
    border-radius: 8px;
    padding: 0;
    margin: 10px auto;
    cursor: pointer;
  }
  .checkbox:checked+label:before,
  .checkbox:not(:checked)+label:before{
    position: absolute;
    display: block;
    width: 36px;
    height: 36px;
    background-color: #102770;
    border-radius: 50%;
    color: #ffeba7;
    font-family: "unicons";
    content: "\eb4f";
    z-index: 20;
    top: -10px;
    left: -10px;
    line-height: 36px;
    text-align: center;
    font-size: 24px;
    transition: all 0.5s ease;
  }
  .checkbox:checked+label:before{
    transform: translateX(44px) rotate(-270deg);
  }
  .card-3d-wrap{
    position: relative;
    width: 440px;
    max-width: 100%;
    height: 400px;
    transform-style:preserve-3d ;
    perspective: 800px;
    margin-top: 60px;
  }
  .card-3d-wrapper{
    width: 100%;
    height: 100%;
    display: flex;
    gap: 10px;
    position: absolute;
    top: 0;
    left: 0;
    transform-style: preserve-3d;
    transition: all 600ms ease-out;
  }
  .card-front,
.card-back{
  width: 100%;
  height: 100%;
  background-color: #2a2b3B;
  background-image: url("{{ asset('frontend/img/image.png') }}");
background-repeat: no-repeat;
  background-size: cover; /* This will cover the entire element */
  border-radius: 6px;
  left: 0;
  top: 0;
  transform-style: preserve-3d;
  backface-visibility: hidden;
}

  .center-wrap{
position: absolute;
width: 100%;
padding: 0 35px;
top: 50%;
left: 0;
transform: translate3d(0, -50%,35px)perspective(100px);
z-index: 20;
display: block;
  }
  .form-group {
    position: relative;
    display: block;
    margin: 0;
    padding: 0;
  }
  .form-style{
    color: #c4c3ca;
    background-color: #1f2029;
    padding: 13px 20px;
    padding-left: 55px;
    height: 48px;
    width: 100%;
    font-weight:500 ;
    border-radius: 4px;
    font-size: 14px;
    line-height: 22px;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
    transition: all 200ms linear;
    box-shadow: 0 4px 8px 0 rgba(21, 21, 21, 0.2);
  }
  .form-style:focus{
    border: none;
    outline: none;
    box-shadow: 0 4px 8px 0 rgba(21, 21, 21, 0.2);
  }
  .input-icon{
    position: absolute;
    top: 0;
    left: 18px;
    height: 48px;
    font-size: 24px;
    line-height: 48px;
    text-align: left;
    color: #ffeba7;
    transition: all 200ms linear;
  }
  input:focus::-webkit-input-placeholder{
    opacity: 0;
    transition: all 200ms linear;
  }
  .btn{
    background-color: #ffeba7;
    color: #102770;
    border-radius: 4px;
    height: 44px;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    transition: all 200ms linear;
    padding: 0 30px;
    letter-spacing: 1px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    border: none;
    box-shadow: 0 8px 24px 0 rgba(255, 235, 167, 0.2);
  }
  .btn:hover{
    background-color: #102770;
    color: #ffeba7;
    box-shadow: 0 8px 24px 0 rgba(16, 39, 112, 0.2);
  }
  .card-front,
  .card-back{
    position: absolute;
  }
  .card-back{
    transform: rotateY(180deg);
  }
  .checkbox:checked~.card-3d-wrap .card-3d-wrapper{
    transform: rotateY(180deg);
  }
</style>
  </head>
  <body>
    <header id="header"><!--header-->
		<div class="header_top" style="background-color: brown; height:40px;"><!--header_top-->
			<div class="container" >
				<div class="row" >
					<div class="col-md-12">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#" style="color:white;"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#" style="color:white;"><i class="fa fa-envelope"></i> info@domain.com</a></li>
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
				
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3"><span>Log In</span><span>Sign Up</span></h6>
                        <input class="checkbox" id="reg-log" type="checkbox" name="reg-log">
                        <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Log In</h4>
                                            <form action="{{URL::to('/login-customer')}}" method="POST">
                                                {{csrf_field()}}
                                            <div class="form-group">
                                              <input type="text" name="tk" id="logemail" class="form-style" placeholder="Your emai" autocomplete="off" aria-describedby="helpId">
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" name="mk" class="form-style" placeholder="Your password" id="logpass" autocomplete="off">
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <button type="submit" class="btn mt-4">Login</button>
                                            </form>
                                            <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Sign up</h4>
                                            <form action="{{URL::to('/add-customer')}}" method="POST">
                                              {{csrf_field()}}
                                            <div class="form-group">
                                                <input type="text" name="cus_name" class="form-style" placeholder="Your full name" id="logname" autocomplete="off">
                                                <i class="input-icon uil uil-user"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="email" name="cus_email" class="form-style" placeholder="Your email" autocomplete="off">
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" name="cus_pass" class="form-style" placeholder="Your password" autocomplete="off">
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="text" name="cus_phone" class="form-style" placeholder="Your phone" autocomplete="off">
                                                <i class="input-icon uil uil-phone-alt"></i>
                                            </div>
                                            <button type="submit" class="btn mt-4">Signup</button>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>