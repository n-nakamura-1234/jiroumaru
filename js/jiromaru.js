document.addEventListener("DOMContentLoaded",() => {
  const title = document.querySelectorAll('.js-accordion-title');

  for (let i = 0; i < title.length; i++){
    let titleEach = title[i];
    let content = titleEach.nextElementSibling;
    titleEach.addEventListener('click', () => {
      titleEach.classList.toggle('is-active');
      content.classList.toggle('is-open');
    });
  }

});


jQuery(function($) {
  //リンクからハッシュを取得
  var hash = location.hash;
  hash = (hash.match(/^#tab\d+$/) || [])[0];
 
  //リンクにハッシュが入っていればtabnameに格納
  if($(hash).length){
    var tabname = hash.slice(1) ;
  } else{
    var tabname = "tab1";
  }
 
  document.getElementById(tabname).click();
});

jQuery(function ($) {
  var headerHight = $("header").height();

  // $('a[href^="#"]').not('.flex-direction-nav a').click(function(e) {
  $('a[href^="#"]').not('.flex-direction-nav a, .night-menu__btn-box a').click(function(e) {
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top - headerHight;

    $.when(
      $("html, body").animate({
        scrollTop: position
      }, 400, "swing"),
      e.preventDefault(),
    ).done(function() {
      var diff = target.offset().top - headerHight;
      if (diff === position) {
      } else {
        $("html, body").animate({
        scrollTop: diff
        }, 10, "swing");
      }
    });
  });
});

jQuery(function($){
$(".openbtn").click(function () {//ボタンがクリックされたら
  $(this).toggleClass('active');//ボタン自身に activeクラスを付与し
    $("#g-nav").toggleClass('panelactive');//ナビゲーションにpanelactiveクラスを付与
});

$("#g-nav a").click(function () {//ナビゲーションのリンクがクリックされたら
    $(".openbtn").removeClass('active');//ボタンの activeクラスを除去し
    $("#g-nav").removeClass('panelactive');//ナビゲーションのpanelactiveクラスも除去
});
});


jQuery(function($){
  $(document).on('click','.drawer-navigation .menu-tab1 a',function () {  
    $('#tab1').trigger("click");
  });
  $(document).on('click','.drawer-navigation .menu-tab2 a',function () {  
    $('#tab2').trigger("click");
  });
  $(document).on('click','.drawer-navigation .menu-tab3 a',function () {  
    $('#tab3').trigger("click");
  });
  $(document).on('click','.drawer-navigation .menu-tab4 a',function () {  
    $('#tab4').trigger("click");
  });
  $(document).on('click','.drawer-navigation .menu-tab5 a',function () {  
    $('#tab5').trigger("click");
  });
});

jQuery(function($){
  $('.drawer-navigation a').on('click',function() {
    $('.main-header').removeClass('drawer-opened');
  });
});

jQuery(function($){
  $('.mv-slider').slick({
    autoplay: true,
    arrows: false,
    pauseOnHover: false,
    fade: true,
    speed : 1500,
    autoplaySpeed: 3500,
    cssEase: 'ease-in-out',
  });
});
