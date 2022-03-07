
<!-- Footer -->
<footer id="myFooter" class="page-footer font-small text-white lighten-3 pt-4">
    <div class="container text-center text-md-left">
        <div class="row">
            <div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">
                <h5 class="font-weight-bold text-uppercase mb-4">درباره سایت  ما</h5>
                <p>آموزش نرم افزار مختلف و طراحی و گرافیک</p>
            </div>

            <hr class="clearfix w-100 d-md-none">
            <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">
                <h5 class="font-weight-bold text-uppercase mb-4">درباره ما</h5>
                <ul class="list-unstyled">
                    <li><p><a href="#">مقالات</a><p></li>
                    <li><p><a href="#">درباره ما</a></p></li>
                    <li><p><a href="#">بلاگ</a></p></li>
                </ul>
            </div>

            <hr class="clearfix w-100 d-md-none">
            <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">
                <h5 class="font-weight-bold text-uppercase mb-4">آدرس</h5>
                <ul class="list-unstyled">
                    <li><p>آدرس<i class="fa fa-home mr-3"></i></p></li>
                    <li><p>info@example.com<i class="fa fa-envelope mr-3"></i></p></li>
                    <li><p>234 567 88<i class="fa fa-phone mr-3"></i></p></li>
                    <li><p>234 567 89<i class="fa fa-print mr-3"></i></p></li>
                </ul>
            </div>

            <hr class="clearfix w-100 d-md-none">
            <div class="col-md-2 col-lg-2 mx-auto my-4">
                <h5 class="font-weight-bold text-uppercase mb-4">شبکه اجتماعی</h5>
                <a type="button" class="social-networks"><i class="fa fa-facebook"></i></a>
                <a type="button" class="social-networks"><i class="fa fa-twitter"></i></a>
                <a type="button" class="social-networks"><i class="fa fa-google-plus"></i></a>
            </div>
        </div>

    </div>

    <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href="#"> 000000.com</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script  src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $(".navbar-toggler").click(function(){
            $("#nav-content").toggle();
        });
    });
</script>

<script src="{{url('js/front.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
    $('#refresh').click(function(){
      $.ajax({
         type:'GET',
         url:'refreshcaptcha',
         success:function(data){
            $(".captcha span").html(data.captcha);
         }
      });
    });
});
</script>
</html>
