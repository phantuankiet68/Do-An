<!DOCTYPE html>
<head>
<title>|Đăng-nhập|</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Custom CSS -->
<link rel="stylesheet" href="{{asset('public/back-end/css/login.css')}}">
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="login-div">
        <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span class="message-text">'.$message.'</span>';
                Session::get('message',null);
            }
        ?>
        <div class="logo-title">Đăng nhập</div>
        <div class="logo-sub-titel">
            Nhà trọ uy tính số 1 Việt Nam
        </div>
        <form action="{{URL::to('/admin-login')}}" method="post">
			{{csrf_field()}}
            
            <div class="login-field">
                <div class="username">
                    <input type="username" class="user-input" name="admin_email" placeholder="Email">
                </div>
                <div class="password">
                    <input type="password" class="password-input" name="admin_password" placeholder="mật khẩu">
                </div>
                <button class="signin-btn">Đăng nhập</button>
            </div>
        </form>
    </div>
</body>
</html>
