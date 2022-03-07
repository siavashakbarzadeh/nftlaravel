@extends('admin.layouts.master')

@section('content')
    <div class="middle"><!-- start middle -->
        <h1 class="text-center my-4 title-box">افزودن تخفیفات</h1>

        <form action="{{ route('discount.store') }}" method="post" class="text-right mr-5 mb-3">
            {{csrf_field()}}
            <div class="form-control border-primary">
            <div class="form-group mt-3">

            <input type="text" class="form-control ml-2 mb-3" id="name" name="name"
            value="{{old('name')}}" placeholder="نام مربوط به تخفیف را وارد کنید">
            

            <input type="text" class="form-control ml-2" id="percent" name="percent"
            value="{{old('percent')}}" placeholder=" درصد تخفیف را وارد کنید">
            </div>

            <button type="submit" class="btn btn-outline-primary">ارسال</button>
            </div>
        </form>

        <div class="clear"></div>
    </div><!-- end middle -->
@endsection