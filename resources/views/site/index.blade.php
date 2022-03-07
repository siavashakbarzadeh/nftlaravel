@extends('site.layouts.master')

@section('imageheader')
<div class="container pt-4  d-none d-lg-block">
    <div class="d-flex flex-row">
        <div class="port-item m-2 text-center">
            <img src="image/8.jpg.png" class="mr-2 img1"><br>
            <span>تلفن همراه</span>
        </div>
        <div class="port-item m-2 text-center">
            <img src="image/7.jpg.png" class="mr-2 img1"><br>
            <span>تبلت</span>
        </div>
        <div class="port-item m-2 text-center">
            <img src="image/6.jpg.png" class="mr-2 img1"><br>
            <span>لپتاپ و الترابوک</span>
        </div>
        <div class="port-item m-2 text-center">
            <img src="image/6.jpg.png" class="mr-2 img1"><br>
            <span>کامپیوتر</span>
        </div>
        <div class="port-item m-2 text-center">
            <img src="image/4.jpg.png" class="mr-2 img1"><br>
            <span>دوربین</span>
        </div>
        <div class="port-item m-2 text-center">
            <img src="image/3.jpg.png" class="mr-2 img1"><br>
            <span> لوازم اداری</span>
        </div>
        <div class="port-item m-2 text-center">
            <img src="image/2.jpg.png" class="mr-2 img1"><br>
            <span>تلویزیون</span>
        </div>
        <div class="port-item m-2 text-center">
            <img src="image/1.jpg.png" class="mr-2 img1"><br>
            <span>هارد دیسک</span>
        </div>
    </div>
</div>
@endsection

@section('slider')
    <div class="row">
        <div class="col-lg-9 col-md-12 col-sm-12 m-auto">
            <div id="slider3" class="carousel slide mb-5" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li class="active" data-target="slider3" data-slide-to="0"></li>
                    <li data-target="slider3" data-slide-to="1"></li>
                    <li data-target="slider3" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="Image/slider1.jpg" class="d-block img-fluid" alt="First Slide">
                    </div>
                    <div class="carousel-item">
                        <img src="Image/slider2.jpg" class="d-block img-fluid" alt="Second Slide">
                    </div>
                    <div class="carousel-item">
                        <img src="Image/slider3.jpg" class="d-block img-fluid" alt="Third Slide">
                    </div>
                </div>
                <a href="#slider3" class="carousel-control-prev" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a href="#slider3" class="carousel-control-next" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        <div class="col-lg-3 d-none d-lg-block m-auto">
            <div class="m-auto">
                <img src="image/4.jpg" class="img-fluid mb-2" alt="Responsive image" />
            </div>
            <div class="">
                <img src="image/5.jpg" class="img-fluid" alt="Responsive image" />
            </div>
        </div>
    </div>
@endsection


@section('special')
    <div class="row">
        <div class="card">
            <h4 class="card-title text-right m-2">آخرین کتاب ها</h4>
            <div class="row">
                
                
                @foreach ($lastbook as $lastbook )
                <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card m-4" style="width:13rem">
                            <a href="{{ $lastbook->pathSlug() }}"><img class="card-img-top" src="{{ url('/upload/images').'/'.$lastbook->image }}" width="200" height="150" ></a>
                            <div class="card-body">
                                <a href="{{ $lastbook->pathSlug() }}"><p class="text-center">{{ $lastbook->title }}</p></a>
                                
                                @if(isset($discount[0]))
                                <?php $dis = (($discount[0]->percent)*($lastbook->price))/100; ?> 
                                <a class="btn btn-primary btn-block" href="#"><del>{{ $lastbook->price }}</del> تومان</a>
                                <a class="btn btn-warning btn-block" href="{{ $lastbook->pathSlug() }}"> {{ $dis }}تومان</a>
                                @else
                                <a class="btn btn-warning btn-block" href="{{ $lastbook->pathSlug() }}">{{ $lastbook->price }}تومان</a>
                                @endif

                                <div class="card-footer text-center" style="font-size:10px;">(۱ ساعت و ۱۰ دقیقه)</div>
                            </div>
                        </div>
                    </div>  
                @endforeach

            </div>
        </div>
    </div>
@endsection

@section('new')
    <div class="row">
        <div class="card">
            <h4 class="card-title text-right m-2">آخرین ویدیو ها</h4>
            <div class="row">
                
                @foreach ($lastvideo as $lastvideo)
                <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card m-4" style="width:13rem">
                            <a href="{{ $lastvideo->pathSlug() }}"><img class="card-img-top" src="{{ url('/upload/images').'/'.$lastvideo->image }}" width="200" height="150" alt="Card image cap"></a>
                            <div class="card-body">
                                <a href="{{ $lastvideo->pathSlug() }}"><p class="text-center">{{ $lastvideo->title }}</p></a>
                                @if(isset($discount[0]))
                                <?php $dis = (($discount[0]->percent)*($lastvideo->price))/100; ?> 
                                <a class="btn btn-primary btn-block" href="#"><del>{{ $lastvideo->price }}</del> تومان</a>
                                <a class="btn btn-warning btn-block" href="{{ $lastvideo->pathSlug() }}"> {{ $dis }}تومان</a>
                                @else
                                <a class="btn btn-warning btn-block" href="{{ $lastvideo->pathSlug() }}">{{ $lastvideo->price }}تومان</a>
                                @endif
                                <div class="card-footer text-center" style="font-size:10px;">(۱ ساعت و ۱۰ دقیقه)</div>
                            </div>
                        </div>
                    </div>   
                @endforeach

            </div>
        </div>
    </div>
@endsection

