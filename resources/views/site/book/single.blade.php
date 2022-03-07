@extends('site.layouts.master')

@section('special')
    <div class="row">
        <div class="card">
                @foreach ($book as $book )
            <h4 class="card-title text-center m-2">{{ $book->title }}</h4>
            <div class="row">
               
                <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card m-4" style="width:13rem">
                            <a href=""><img class="card-img-top" src="{{ url('/upload/images').'/'.$book->image }}" width="200" height="150" ></a>
                            
                            
                            <div class="card-body">
                                
                                <p class="text-center">
                                    <?php
                                    if($book->type==0)
                                    echo "نقدی";
                                    else echo "رایگان" ?>
                                </p>
                                <p class="text-center">{{ "دانلود" }}</p>
                                <p class="text-center">{{ $book->description }}</p>

                                @if(isset($discount[0]))
                                <?php $dis = (($discount[0]->percent)*($book->price))/100; ?> 
                                <a class="btn btn-primary btn-block" href="#"><del>{{ $book->price }}</del> تومان</a>
                                <a class="btn btn-warning btn-block" href="{{ Url('pay') }}"> {{ $dis }}تومان</a>
                                @else
                                <a class="btn btn-warning btn-block" href="{{ Url('pay') }}">{{ $book->price }} تومان</a>
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