@extends('site.layouts.master')


@section('special')
    <div class="row">
        <div class="card">
              
            <h4 class="card-title text-right m-2">{{ $menu2->name }} (کتاب)</h4>
            <div class="row">
                
                
                @foreach ($books as $books )
                <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card m-4" style="width:13rem">
                            <a href=""><img class="card-img-top" src="{{ url('/upload/images').'/'.$books->image }}" width="200" height="150" ></a>
                            <div class="card-body">
                                <a href=""><p class="text-center">{{ $books->title }}</p></a>
                    
                                <a class="btn btn-warning btn-block" href="{{ $books->pathSlug() }}">ادامه مطلب</a>
                    
                            </div>
                        </div>
                    </div>  
                @endforeach

            </div>
        </div>
        <div class="card mt-5">
            <h4 class="card-title text-right m-2">{{ $menu2->name }} (ویدیو)</h4>
            <div class="row">
                
                
                @foreach ($videos as $videos )
                <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card m-4" style="width:13rem">
                            <a href=""><img class="card-img-top" src="{{ url('/upload/images').'/'.$videos->image }}" width="200" height="150" ></a>
                            <div class="card-body">
                                <a href=""><p class="text-center">{{ $videos->title }}</p></a>
                    
                                <a class="btn btn-warning btn-block" href="{{ $videos->pathSlug() }}">ادامه مطلب</a>
                    
                            </div>
                        </div>
                    </div>  
                @endforeach


            </div>
            
        </div>
    </div>
@endsection



