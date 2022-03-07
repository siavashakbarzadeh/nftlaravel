@extends('admin.layouts.master')

@section('content')
    <div class="middle"><!-- start middle -->
        <h1 class="text-center my-4 title-box">ویرایش دسته ها</h1>

        <form action="{{ route('category.update',['id'=>$category->id]) }}" method="post" class="text-right mr-5 mb-3">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="form-control border-primary">
            <div class="form-group mt-3">
                <input type="text" class="form-control ml-2" id="name" name="name"
                       value="{{$category->name}}" placeholder="نام دسته را وارد کنید">
            </div>
            <div class="form-group mt-3">
                <label>نام زیر دسته</label>
                <select name="parent_id" class="form-control border">
                    <option value="0">---</option>
                    @foreach($cat as $key=>$value)
                        <option @if($value==$category->getParent['name']) selected="selected" @endif value="{{$key}}" >{{$value}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-outline-primary">ارسال</button>
            </div>
        </form>

        <div class="clear"></div>
    </div><!-- end middle -->
@endsection