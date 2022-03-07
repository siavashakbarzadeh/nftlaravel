@extends('admin.layouts.master')

@section('content')
    <div class="middle"><!-- start middle -->
        <h1 class="text-center my-4 title-box">ویرایش کتاب ها</h1>
        <form method="post" action="{{route('book.update',['id'=>$book->id])}}" class="text-right mr-5 mb-3" enctype="multipart/form-data">
            {{csrf_field()}}
            {{ method_field('PATCH') }}
            <div class="form-control border-primary">
                <div class="form-group mt-3">
                    <input type="text" class="form-control ml-2" id="title" name="title"
                           value="{{ $book->title }}" placeholder="عنوان کتاب را وارد کنید">
                </div>
                <div class="form-group mt-3">
                    <label>نوع کتاب</label>
                    <select name="type" class="form-control border">
                      <option value="0" {{ $book->type == '0' ? 'selected':'' }}>نقدی</option>
                      <option value="1" {{ $book->type == '1' ? 'selected':'' }}>رایگان</option>  
                    </select>
                </div>
                <div class="form-group mt-3">
                    <textarea rows="5" class="form-control ml-2" id="article-ckeditor" name="description"
                              value="{{old('description')}}" placeholder="توضیحات را وارد کنید">
                            {{ $book->description }}</textarea>
                </div>
                <div class="form-group mt-3">
                    <label>تصویر کتاب</label>
                    <input type="file" class="form-control ml-2" id="image" name="image"
                           value="{{old('imageUrl')}}">
                    <input type="image" id="image" src="{{ url('upload/images').'/'.$book->image }}" 
                    width="100" height="80">
                    <input type="hidden" name="image" value="{{ $book->image }}">
                </div>
                <div class="form-group mt-3">
                    <label>آپلود کتاب</label>
                    <input type="file" class="form-control ml-2" id="path" name="path"
                           value="{{old('path')}}">{{ $book->path }}
                    <input type="hidden" name="path" value="{{ $book->path }}">
                </div>
                <div class="form-group mt-3">
                    <label>دسته بندی</label>
                    <select name="category_id[]" id="category" class="form-control selectpicker" title="دسته بندی مورد نظر را انتخاب کنید" multiple>
                        <option value="0">---</option>
                        @foreach ($categories as $categories)
                        <option
                        @foreach ($book->categories as $item )
                            @if ($item->id == $categories->id)
                                {{ "selected" }}
                            @endif
                        @endforeach
                        value="{{ $categories->id }}">{{ $categories->name }}</option>
                            
                        @endforeach
                        </select>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control ml-2" id="price" name="price"
                           value="{{ $book->price}}" placeholder="قیمت کتاب را وارد کنید">
                </div>
                <button type="submit" class="btn btn-outline-primary">ارسال</button>
            </div>
        </form>



        <div class="clear"></div>
    </div><!-- end middle -->
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

	<!-- (Optional) Latest compiled and minified JavaScript translation files -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>

   <script type="text/javascript">
   	$('.selectpicker').selectpicker();
   </script>

@endsection