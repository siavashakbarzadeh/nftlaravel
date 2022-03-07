@include('site.section.header')

<!-- image header -->
@yield('imageheader')
<!-- /image header -->

<!-- Slider -->
<!--########################START HERE#########################-->
<div class="container">
    @yield('slider')
</div>
<!-- /Slider -->

<!-- Spical-product -->
<!--########################START HERE#########################-->
<div class="container">
    @yield('special')
</div>
<!--/Spical-product -->

<!-- new-product -->
<!--########################START HERE#########################-->
<div class="container">
    @yield('new')
</div>
<!--/new-product -->

<!-- دوره های پر مخاطب -->
<!--########################START HERE#########################-->
<div class="container">
    @yield('user')
</div>
<!--/دوره های پر مخاطب -->

<!-- Start Free Product -->
<!--########################START HERE#########################-->
<div class="container">
    @yield('free')
</div>
<!--/Start Free Product -->


@include('site.section.footer')
