// SPメニュー
(function($) {
    $(function() {
        var $header = $('#header');
        // Nav Toggle Button
        $('#nav-toggle,#global_menu ul li a').click(function(){
            $header.toggleClass('open');
        });
    });
})(jQuery);

// メニュー追従
jQuery(function() {
    var nav = jQuery('#header');

    // メニューのtop座標を取得する
    var offsetTop = nav.offset().top;

    var floatMenu = function() {
        // スクロール位置がメニューのtop座標を超えたら固定にする
        if (jQuery(window).scrollTop() > offsetTop) {
            nav.addClass('fixed');
        } else {
            nav.removeClass('fixed');
        }
    }
    jQuery(window).scroll(floatMenu);
    jQuery('body').bind('touchmove', floatMenu);
});

// スムーススクロール
var windowWidth = $(window).width();
var windowSm = 1199;
if (windowWidth <= windowSm) {
	$(function () {
		var headerHight = 40; //ヘッダの高さ
		$('a[href^=#]:not(#tab li a)').click(function(){
			var href= $(this).attr("href");
			var target = $(href == "#" || href == "" ? 'html' : href);
			var position = target.offset().top-headerHight; //ヘッダの高さ分位置をずらす
			$("html, body").animate({scrollTop:position}, 500, "swing");
			return false;
		});
	});
} else {
	$(function(){
		$('a[href^="#"]').click(function(){
			var speed = 500;
			var href= $(this).attr("href");
			var target = $(href == "#" || href == "" ? 'html' : href);
			var position = target.offset().top;
			$("html, body").animate({scrollTop:position}, speed, "swing");
			return false;
		});
	});
}

// 背景
$(function(){
    $('.contents').each(function(i, elem){
        var contentsPOS = $(elem).offset().top;
        $(window).on('load scroll resize', function(){
            var winHeight = $(window).height();
            var scrollTop = $(window).scrollTop();
            var showClass = 'show';
            var timing = 100;
            if (scrollTop >= contentsPOS - winHeight + timing){
              $(elem).addClass(showClass);
            } else {
              $(elem).removeClass(showClass);
            }
        });
    });
});

// アンカーリンクcurrent処理
$(function() {
  function targetCu(){
    var margin = 50,   //ウインドウ上部からどれぐらいの位置で変化させるか
        sectionTop = new Array, //sectionのTop位置格納用
        current = -1;   //現在のカレント位置
    //(1)各targetの縦位置を取得
    $('.target').each(function(i) {
      sectionTop[i] = $(this).offset().top;
    });
    //init
    changeNavCurrent(0);
    //スクロールした時の処理
    $(window).scroll(function(){
      scrollY = $(window).scrollTop();
      //(2)各targetの位置とスクロール位置を比較して、条件にあったらchangeNavCurrentを実行
      for (var i = sectionTop.length - 1 ; i >= 0; i--) {
        if (scrollY > sectionTop[i] - margin) {
          changeNavCurrent(i);
          break;
        }
      };
    });
    //(3)ナビの処理
    function changeNavCurrent(curNum) {
      if (curNum != current) {
        current = curNum;
        curNum2 = curNum + 1;//HTML順序用
        $('.home_menu ul li').removeClass('on');
        $('.home_menu ul li:nth-child(' + curNum2 +')').addClass('on');
      }
    };
  }
  //ファンクション実行
  $(window).load(function(){targetCu();})
  var timer = false;
  //リサイズ時ファンクション再実行
  $(window).resize(function() {
    if (timer !== false) {
      clearTimeout(timer);
    }
    timer = setTimeout(function() {
      console.log('resized');
      targetCu();
    }, 200);
  });
});

// 別ページからアンカーリンクスクロール
$(function(){
    url = window.location.toString();
	anc = url.substring(url.search('#') + 1);
	
    if(anc){
        var Hash = $("#"+anc);
        var HashOffset = $(Hash).offset().top;
        jQuery("html,body").animate({
            scrollTop: HashOffset
        }, 500);
    }
});
