@extends('admin.layouts.master')

@section('content')
    <div class="middle"><!-- start middle -->
        <h1 class="text-center my-4 title-box">نمایش کتاب ها</h1>

        <div class="container">
            <table class="table table-bordered">
                <thead>
                <tr class="text-center">
                    <td>ردیف</td>
                    <td>عنوان کتاب</td>
                    <td> نوع کتاب</td>
                    <td>توضیحات</td>
                    <td>تصویر کتاب</td>
                    <td>دانلود کتاب</td>
                    <td>دسته بندی</td>
                    <td>قیمت کتاب</td>
                    <td>ویرایش</td>
                    <td>حذف</td>
                </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($book as $book)
                        <tr class="text-center">
                            <td>{{$i++}}</td>
                            <td>{{$book->title}}</td>
                            <td><?php if($book->type==0)
                            echo "نقدی";
                            else echo "رایگان"
                            ?>
                            </td>
                            <td>{{ $book->description }}</td>
                            <td><img src="{{ url('upload/images').'/'.$book->image }}"
                                width="90" height="60"/></td>
                            <td "width:1000px;"><a href="{{ url('upload/sources').'/'.$book->path }}" 
                                style="font-size:10px;">{{ "دانلود" }}</a></td>
                                <td>
                                    @foreach ($book->categories()->pluck('name') as $cat)
                                        {{ $cat }}</br>
                                    @endforeach
                                </td>
                            <td>{{ $book->price }}</td>
                            <td>
                                <a href="{{route('book.edit',['id'=>$book->id])}}" class="btn btn-primary">ویرایش</a>
                            </td>
                            <td>
                                <form action="{{route('book.destroy',['id'=>$book->id])}}" method="post">
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