@extends('admin.layouts.master')

@section('content')
    <div class="middle"><!-- start middle -->
        <h1 class="text-center my-4 title-box">نمایش ویدیو ها</h1>

        <div class="container">
            <table class="table table-bordered">
                <thead>
                <tr class="text-center">
                    <td>ردیف</td>
                    <td>عنوان ویدیو</td>
                    <td> نوع ویدیو</td>
                    <td>توضیحات</td>
                    <td>تصویر ویدیو</td>
                    <td>دانلود ویدیو</td>
                    <td>دسته بندی</td>
                    <td>قیمت</td>
                    <td>ویرایش</td>
                    <td>حذف</td>
                </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($video as $video)
                        <tr class="text-center">
                            <td>{{$i++}}</td>
                            <td>{{$video->title}}</td>
                            <td><?php if($video->type==0)
                            echo "نقدی";
                            else echo "رایگان"
                            ?>
                            </td>
                            <td>{{ $video->description }}</td>
                            <td><img src="{{ url('upload/images').'/'.$video->image }}"
                                width="90" height="60"/></td>
                            <td "width:1000px;"><a href="{{ url('upload/sources').'/'.$video->path }}" 
                                style="font-size:10px;">{{ "دانلود" }}</a></td>
                            <td>
                                @foreach ($video->categories()->pluck('name') as $cat)
                                    {{ $cat }}</br>
                                @endforeach
                            </td>
                            <td>{{ $video->price }}</td>
                            <td>
                                <a href="{{route('video.edit',['id'=>$video->id])}}" class="btn btn-primary">ویرایش</a>
                            </td>
                            <td>
                                <form action="{{route('video.destroy',['id'=>$video->id])}}" method="post">
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