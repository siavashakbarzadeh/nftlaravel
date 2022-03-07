<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فروشگاه فایل انلاین</title>
    <link rel="stylesheet" href="{{url('css/front.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
        
<!-- header -->


<!--########################START HERE#########################-->
<header id="main-header" class="py-2">
        
    <!-- nav with logo... -->
    <nav class="navbar navbar-expand-sm mb-2">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="input-group">
                        <button class="btn blue" type="button"><i class="fa fa-shopping-cart"></i></button>
                        <button class="btn blue" type="button">سبد خرید ( ۰ )</button>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <div class="input-group">
                    <input class="form-control mr-sm-0" placeholder="جست و جو">
                    <button class="btn blue my-sm-0"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <a class="navbar-brand" href="#">Logo</a>
        </div>
    </nav>
    <!-- /nav with logo... -->

    <!-- nav with menu -->

    <nav class="navbar navbar-expand-sm navbar-light blue bg-faded">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-content">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('') }}">صفحه اصلی</a>
                </li>
               <?php
               use App\Category;
               $menu = Category::with('getChild')->where('parent_id',0)->get();
               ?>
                @foreach($menu as $menu)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="Preview" href="{{ url('category/'.$menu->id) }}" role="button" aria-haspopup="true" aria-expanded="false">
                        {{$menu->name}}
                    </a>
                    @if($menu->getChild->count()>0)

                        <div class="dropdown-menu text-center" aria-labelledby="Preview">
                            @foreach($menu->getChild as $submenu)
                            <a class="dropdown-item" href="{{ url('category/'.$menu->id.'/'.$submenu->id) }}"> {{$submenu->name}} </a>
                            @endforeach
                        </div>

                    @endif
                </li>
                @endforeach
            </ul>
        </div>

        <div style="position: absolute; left: 100px;">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    
                    @if(\Auth::guest())
                    <a class="nav-link dropdown-toggle pr-3" style="color:red;" id="Preview" href="" role="button" aria-haspopup="true" aria-expanded="false">ورود/ثبت نام</a> 
                    <div class="dropdown-menu text-center" aria-labelledby="Preview">
                        <a class="dropdown-item" href="{{ url('/register') }}">ثبت نام</a>
                        <a class="dropdown-item" href="{{ url('/login') }}">ورود</a>  
                    </div>
                    @else
                        @if(!\Auth::user()->check_role())
                            <a class="nav-link dropdown-toggle pr-3" style="color:red;" id="Preview" href="" role="button" aria-haspopup="true" aria-expanded="false">{{ \Auth::user()->name }} خوش آمدید</a> 
                            <div class="dropdown-menu text-center" aria-labelledby="Preview">
                            <a class="dropdown-item" href="{{ url('/logout') }}" 
                            onclick="event.preventDefault();document.getElementById('login-form').submit()">خروج</a>
                            <form id="login-form" action="{{ url('/logout') }}" method="POST" style="display:none;">
                                {{ csrf_field() }}
                            </form>
                            </div>
                        @else
                            <a class="nav-link dropdown-toggle pr-3" style="color:red;" id="Preview" href="" role="button" aria-haspopup="true" aria-expanded="false">{{ \Auth::user()->name }} خوش آمدید</a> 
                            <div class="dropdown-menu text-center" aria-labelledby="Preview">
                            <a class="dropdown-item" href="{{ url('/admin') }}">ورود به پنل مدیریت</a>
                            <a class="dropdown-item" href="{{ url('/logout') }}" 
                            onclick="event.preventDefault();document.getElementById('login-form').submit()">خروج</a>
                            <form id="login-form" action="{{ url('/logout') }}" method="POST" style="display:none;">
                                {{ csrf_field() }}
                            </form>
                            </div>
                        @endif
                    @endif
              
                </li>
            </ul>       
        </div>  
        
    </nav>


    
    <!-- /image in header -->

</header>
<!-- /header -->


</html>
