$(document).ready(function () {

    $(".avatar").click(function () {
        $(".navProfileDropdown").fadeToggle(350);
    })
    // Codes menu right
    $(document).ready(function () {
        $('.menu li.active').addClass('open').children('ul').show();

        $(".menu li.has-sub> a").on('click', function () {
            $(this).removeAttr('href');
            var e = $(this).parent('li');
            if (e.hasClass('open')) {
                e.removeClass('open');
                e.find('li').removeClass('open');
                e.find('ul').slideUp(400);

            } else {
                e.addClass('open');
                e.children('ul').slideDown(400);
                e.siblings('li').children('ul').slideUp(400);
                e.siblings('li').removeClass('open');
                e.siblings('li').find('li').removeClass('oepn');
                e.siblings('li').find('ul').slideUp(200);
            }
        });
    });// end codes menu right

    // code tab-box

    $(".tab li").click(function () {
        $(".tab li").removeClass("active")
        $(this).addClass("active");
        var index = $(this).index();
        $(".tab-content .section").hide();
        $(".tab-content .section").eq(index).fadeIn(200);
    });


})
// ;
// // Modal Box
//
// var modal = document.getElementById("modal-id");
// var middle = document.getElementById("middle");
// window.onclick = function (event) {
//     if (event.target == modal || event.target == middle) {
//         modal.style.display = "none";
//     }
// }
// end modal box





