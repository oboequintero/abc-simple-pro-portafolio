$(function() {
  $('.menu_categorias').click(function () {
    $('.section_noticias .categorias').toggle();
  });
    redes_fixed();

    $(window).scroll(function () {

        redes_fixed()

    });
    function toTop(){
  if($(this).scrollTop() <= 700){
    $('.go_top').css('display','none');
  }
  else{
    $('.go_top').css('display','inline-block');
  }
}
toTop();
$(window).scroll(function () {
  toTop()
});
$('.go_top').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, 600);
    return false;
});
});


function redes_fixed(){

    if($(this).scrollTop() <= window.alto){

        $('.navbar').css('top', window.alto+'px');

        $('.navbar').css('position', 'absolute');

    }

    else{

        $('.navbar').css('position', 'fixed');

        $('.navbar').css('top', '0px');

    }

}