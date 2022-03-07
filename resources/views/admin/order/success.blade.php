@extends('admin.layouts.master')

@section('content')
<div class="middle"><!-- start middle -->
    <h1 class="text-center my-4 title-box">سفارشات موفق</h1>

    <div class="card">
        
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="text-right">
              <tr>
                  <th>ردیف</th>
                  <th>نام کاربر</th>
                  <th>نام محصول</th>
                  <th>مقدار پرداختی</th>
                  <th>شماره تراکنش</th>
                  <th>تنظیمات</th>
              </tr>
            </thead>
            <tbody class="text-right">
              <?php $i=1; ?>
              @foreach ($success as $success )
              <tr>
                <td class="font-weight-medium">
                  {{ $i++ }}
                </td>
                <td>{{ $success->user->name }}</td>

                @if(isset($success->book))
                <td>{{ $success->book['title'] }}</td>
                @elseif(isset($success->video))
                <td>{{ $success->video['title'] }}</td>
                @endif
                <td>{{ $success->price }}</td>
                <td>{{ $success->id_get }}</td>
                <td>
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                   <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                   <div class="btn-group" role="group" aria-label="First group">
                         
                    <form action="{{ route('delete',['id'=>$success->id]) }}" method="post">
                      {{ method_field('delete') }}
                      {{ csrf_field() }}
                      <div class="btn-group btn-group-xs">
                          <button type="submit" class="btn btn-danger">حذف</button>
                      </div>
                    </form>

                   </div>
                </td>
              </tr>
             @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<div class="clear"></div>
    </div><!-- end middle -->
@endsection