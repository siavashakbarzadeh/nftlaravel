
<div class="sidebar">
    <div class="head">
        <img src="{{url('images/avatar5.jpg')}}">
        <h3>پنل مدیریت سایت PHP MVC</h3>

        <div class="level-user">
            <span class="label-name">سطح مدیریتی : </span>
            <span class="label-level">مدیر اصلی </span>
        </div>
        <div class="clear"></div>
    </div>

    <div class="menu">
        <UL class="text-right">

            <li><a href="{{ url('admin') }}">پیشخوان</a></li>
            <li class="has-sub"><a href="#">دوره ها</a>
                <ul>
                    <li><a href="#">افزودن</a></li>
                    <li><a href="#">نمایش دوره ها</a></li>
                </ul>
            </li>

            <li class="has-sub"><a href="#">دسته ها</a>
                <ul>
                    <li><a href="{{route('category.create')}}">افزودن</a></li>
                    <li><a href="{{route('category.index')}}">نمایش دسته ها</a></li>
                </ul>
            </li>
            <li class="has-sub"><a href="#">کتاب</a>
                <ul>
                    <li><a href="{{route('book.create')}}">افزودن</a></li>
                    <li><a href="{{ route('book.index') }}">نمایش کتاب ها</a></li>
                </ul>
            </li>
            <li class="has-sub"><a href="#">ویدیو</a>
                <ul>
                    <li><a href="{{route('video.create')}}">افزودن</a></li>
                    <li><a href="{{ route('video.index') }}">نمایش ویدیو ها</a></li>
                </ul>
            </li>
            <li class="has-sub"><a href="#">سفارشات</a>
                <ul>
                    <li><a href="{{ route('success') }}">سفارشات موفق</a></li>
                    <li><a href="{{ route('unsuccess') }}">سفارشات ناموفق</a></li>
                </ul>
            </li>
            <li class="has-sub"><a href="#">نظرات</a>
                <ul>
                    <li><a href="#">نمایش نظرات</a></li>
                </ul>
            </li>
            <li class="has-sub"><a href="#">تخفیفات</a>
                <ul>
                    <li><a href="{{ route('discount.create') }}">افزودن</a></li>
                    <li><a href="{{ route('discount.index') }}">نمایش تخفیفات</a></li>
                </ul>
            </li>



            <li><a href="#">تنظیمات</a></li>

        </UL>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>