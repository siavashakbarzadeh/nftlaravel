@extends('admin.layouts.master')

@section('content')
    <div class="middle"><!-- start middle -->
        <h1 class="text-center my-4 title-box">نمایش تخفیفات</h1>

        <div class="container">
            <table class="table table-bordered">
                <thead>
                <tr class="text-center">
                    <td>ردیف</td>
                    <td>نام تخفیف</td>
                    <td>درصد تخفیف</td>
                    <td>ویرایش</td>
                    <td>حذف</td>
                </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach ( $dis as $dis )
                    <tr class="text-center">
                            <td>{{ $i++ }}</td>
                            <td>{{ $dis->name }}</td>
                            <td>{{ $dis->percent }}</td>
                            <td>
                                <a href="{{ route('discount.edit',['id'=>$dis->id]) }}" class="btn btn-primary">ویرایش</a>
                            </td>
                            <td>
                                <form action="{{ route('discount.destroy',['id'=>$dis->id]) }}" method="post">
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