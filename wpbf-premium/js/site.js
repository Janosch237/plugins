!function(n){n('.wpbf-mega-menu > .sub-menu > .menu-item a[href="#"]').click(function(n){n.preventDefault()});var i=n(".wpbf-navigation").data("sub-menu-animation-duration");n(".wpbf-sub-menu-animation-down > .menu-item-has-children").hover(function(){n(".sub-menu",this).first().stop().css({display:"block"}).animate({marginTop:"0",opacity:"1"},i)},function(){n(".sub-menu",this).first().stop().animate({opacity:"0",marginTop:"-10px"},i,function(){n(this).css({display:"none"})})}),n(".wpbf-sub-menu-animation-up > .menu-item-has-children").hover(function(){n(".sub-menu",this).first().stop().css({display:"block"}).animate({marginTop:"0",opacity:"1"},i)},function(){n(".sub-menu",this).first().stop().animate({opacity:"0",marginTop:"10px"},i,function(){n(this).css({display:"none"})})}),n(".wpbf-sub-menu-animation-zoom-in > .menu-item-has-children").hover(function(){n(".sub-menu",this).first().stop(!0).css({display:"block"}).transition({scale:"1",opacity:"1"},i)},function(){n(".sub-menu",this).first().stop(!0).transition({scale:".95",opacity:"0"},i).fadeOut(5)}),n(".wpbf-sub-menu-animation-zoom-out > .menu-item-has-children").hover(function(){n(".sub-menu",this).first().stop(!0).css({display:"block"}).transition({scale:"1",opacity:"1"},i)},function(){n(".sub-menu",this).first().stop(!0).transition({scale:"1.05",opacity:"0"},i).fadeOut(5)}),n(document).on({mouseenter:function(){n(".wpbf-menu-item-cart .woo-sub-menu").stop().fadeIn(i)},mouseleave:function(){n(".wpbf-menu-item-cart .woo-sub-menu").stop().fadeOut(i)}},".wpbf-menu-item-cart.menu-item-has-children")}(jQuery);