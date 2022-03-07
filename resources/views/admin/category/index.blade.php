@extends('admin.layouts.master')

@section('content')
    <div class="middle"><!-- start middle -->
        <h1 class="text-center my-4 title-box">نمایش دسته ها</h1>

        <div class="container">
            <table class="table table-bordered">
                <thead>
                <tr class="text-center">
                    <td>ردیف</td>
                    <td>نام دسته</td>
                    <td>نام دسته اصلی</td>
                    <td>ویرایش</td>
                    <td>حذف</td>
                </tr>
                </thead>
                <tbody>
                 <?php $i=1; ?>
                @foreach($category as $cat)
                    <tr class="text-center">
                        <td>{{$i++}}</td>
                        <td>{{$cat->name}}</td>
                        <td>{{$cat->getParent['name']}}</td>
                        <td>
                            <a href="{{ route('category.edit',['id'=>$cat->id]) }}" class="btn btn-primary">ویرایش</a>
                        </td>
                        <td>
                            <form action="{{route('category.destroy',['id'=>$cat->id])}}" method="post">
                                {{method_field('delete')}}
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-danger">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <div class="clear"></div>
    </div><!-- end middle -->
@endsection