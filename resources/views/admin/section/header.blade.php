<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/admin.css') }}">

    @yield('styles')
    <title>پنل مدیریت</title>
</head>
<body>

<header> <!--    start header-->
    <DIV class="right">
        <span></span>
    </DIV>

    <DIV class="left">
        <div class="avatar">
            <img src="images/user-avatar.jpg" alt="">
        </div>
        <ul class="navProfileDropdown">

            <li class="head">
                <a href="">
                    <img src="images/user-avatar.jpg" alt="">
                    <span class="labelName">نام و نام خانوادگی فرد</span>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="images/small-nofi.jpg"/>

                    <span>تنظیمات اطلاع رسانی</span>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="images/settings-profile.jpg"/>

                    <span>تنظیمات اصلی سایت</span>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="images/exit-profile.jpg"/>
                    <span>خروج</span>
                </a>
            </li>

        </ul>
        <div class="notification">
            <img src="images/notifications-bell-button.png" alt="">
        </div>
    </DIV>
</header><!--    end header -->