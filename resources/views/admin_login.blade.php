
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-image: url("./bb.jpg");
		background-color: #bbe8fc;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    /* Các điều chỉnh cho phần đăng nhập */
    .home {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #fff;
    }

    .content {
        text-align: center;
        max-width: 600px;
        margin-right: 30px;
    }

    .content a {
        text-decoration: none;
        color: #bbe8fc;
        font-size: 20px;
        border: 2px solid #ff6633;
        padding: 10px 40px;
        border-radius: 40px;
        font-weight: 500;
        transition: 0.3s all;
    }

    .content a:hover {
        background-color: #ddd;
        color: #000;
    }

    .login {
        width: 450px;
        margin-left: 150px;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 40px;
        border-radius: 10px;
    }

    .login h2 {
        text-align: center;
    }

    .login form {
        display: flex;
        flex-direction: column;
    }

    .input-box {
        position: relative;
        margin-bottom: 20px;
    }

    .input-box .icon {
        position: absolute;
        top: 15px;
        right: 15px;
        color: #e0f3fe;
    }

    .input {
        width: 100%;
        height: 40px;
        border: 2px solid #7e6dfb;
        border-radius: 20px;
        background: transparent;
        outline: none;
        color: #fff;
        padding: 0 40px 0 20px;
        font-size: 16px;
    }

    .remember-forgot {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .remember-forgot a {
        color: #bbe8fc;
        text-decoration: none;
    }

    .button {
        border-radius: 50px;
        font-size: 20px;
        color: #fff;
        font-weight: 800;
        margin-bottom: 20px;
        cursor: pointer;
        transition: all 0.2s ease;
        background-color: #ff6633;
        border: none;
        padding: 10px 20px;
        text-transform: uppercase;
    }

    .button:hover {
        font-size: 25px;
        letter-spacing: 2px;
    }

    .register-link {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .register-link p {
        color: #10aae7;
    }
</style>

</head>
<body>
    <section class="home">
        <div class="content">
            <h2>Chào mừng !!!</h2>
            <p>Tên tôi là Tuyến. Tôi 19 tuổi và tôi đến từ thành phố Bảo Lộc.</p>
            <a href="{{URL::to('/trang-chu')}}">Bắt đầu</a>
        </div>
        <div class="login">
            <h2>Đăng nhập</h2>
			<?php
	$message = Session::get('message');
	if($message){
		echo'<b style="color:brown; text-align:center;">'.$message.'</b>';
		Session::put('message',null);
	}
	?>
            <form action="{{URL::to('/admin-dashboard')}}" method="post">
				{{csrf_field()}}
                <div style="margin-right:100px;" class="input-box">
                    <span class="icon">
                        <i class="fa-soild fa-lock"></i>
                        <input type="" class="input" name="admin_email" placeholder="Nhập tên đăng nhập của bạn" autocomplete="off" required>
                    </span>
                </div>
                <div style="margin-top:60px; margin-right:100px;" class="input-box">
                    <span class="icon">
                        <i class="fa-soild fa-lock"></i>
                        <input type="password" class="input" name="admin_password" placeholder="Nhập mật khẩu của bạn" autocomplete="off" required>
                    </span>
                </div>
                <div style="margin-top:80px;" class="remember-forgot">
                    <label for=""><input type="checkbox">Nhớ tài khoản</label>
                    <a href="#">Quên mật khẩu?</a>
                </div>
                <button type="submit" name="login" class="button">Tiếp tục</button>
                <div class="register-link">
                    <p>Chưa là thành viên?</p>
                    <a href="#">Đăng ký ngay</a>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
