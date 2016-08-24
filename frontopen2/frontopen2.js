jQuery(window).resize(function(){
		FocusSize()
	})
	
    //焦点图
	jQuery(document).ready(function($){
		dn = 0;
		imgNum  = $('.focus_img img').length;
		homeFocus(0)
		
		FocusSize()
		
		for(i=0;i<imgNum;i++){
			$("<a href='javascript:;'></a>").appendTo(".bt_line");
		}
			
		$('.bt_line a').mouseover(function(){
			var btIndex = $(this).index();
			$('.bt_line a').eq(btIndex).addClass('current').siblings().removeClass();
			homeFocus(btIndex)
			dn = btIndex;
		})
		
		$('.bt_line a').eq(0).addClass('current');
		$('.focus_img li').eq(0).show();
		
		$('.focus').hover(function(){
			clearTimeout(clocks);
		},function(){
			clocks = setInterval(clock,5000)
		})
		
		clocks = setInterval(clock,5000)
		
		function clock(){
			if(dn >= imgNum - 1){dn = 0}else{dn++};
			homeFocus(dn)
		}
		
		
		function homeFocus(nub){
			$('.focus_img li').eq(nub).css('z-index','3').siblings().css('z-index','0');
			$('.focus_img li').eq(nub).fadeIn(500).siblings().fadeOut(500);
			$('.bt_line a').eq(nub).addClass('current').siblings().removeClass();
			imgSrc = $('.focus_img li img').eq(nub).attr('data-focus-src');
			$('.focus_img li img').eq(nub).attr('src',imgSrc);
		}
	})
	
	function FocusSize(){
	  defHeight = 380;
	  defWidth  = 960;
	  nowImgWidth = jQuery('.focus').width();
	  biLi = defHeight/defWidth;
	  FocusHeight = nowImgWidth * biLi;
	  jQuery('.focus_img').height(FocusHeight);
	  jQuery('.focus_img li').height(FocusHeight)
	  jQuery('.focus_img img').height(FocusHeight)
	}

window.onerror=function(){return true;};

function loading(l,t){
	var long = l || '100%';
	var time = t || 1000;
	jQuery('.loading').clearQueue();
	jQuery('.loading').animate({'width':long},time);
};


$(function() {
	$('.toggletitle').click(function(){
		$(this).next('.togglecon').slideToggle();
	});
//	var windowHeight = $(window).height();
	var windowWidth = $(window).width();
	
	$('#mobile_nav_btn').click(function(){
		$(this).next('.menu-header').slideToggle()
	});

	

	
//	function cons(){
//		var navHtml = $('.menu-header').html();
//		$('#nav_bs').html(navHtml);
////		var nav_bs = $('#nav_bs').height();
////		$('#nav_bs').css('height',windowHeight);
//		var mobileNavHeight = $(document).height()
//		$('.mobile_nav').height(mobileNavHeight);
//		var nav_bs = $('#nav_bs').height();
//		$('#nav_bs').css('height',windowHeight);
//		$('#nav_bs li').each(function(index, element) {
//			$(this).removeClass();
//			$(this).removeAttr("id");
//		});
//		$('#nav_bs ul').each(function(index, element) {
//			$(this).removeClass();
//		});
//	}
//
//	$('#mobile_nav_btn').click(function(){
////		$(this).next('.menu-header').slideToggle()
//		if ($('.web_bod').hasClass('animate_app')) {
//			$('.web_bod').removeClass('animate_app');
////			$('#nav_bs').html('');
//		}
//		 else {
//			$('.web_bod').addClass('animate_app');
//			cons()
//		}
//	});


	if($('#g_box li')[0] && $('#g_box li').length > 1){
		$('.gonggao').show()
		var tId = setInterval(gg_roll,5000)
	}else if($('#g_box li')[0]){
		$('.gonggao').show()
	}
	
		
	if($('#g_box li')[0] && $('#g_box li').length > 1){
		$('.gonggao').show()
		var tId = setInterval(gg_roll,5000)
	}else if($('#g_box li')[0]){
		$('.gonggao').show()
	}
	
		
	doNow = 0;  //初始化全局变量
	doNow2 = 0;
	doin = 0; //side返回顶部的变量
	ofText = $('#official').text();


	$('#article-index').hover(function(){
			if(doNow2 == 1){$(this).clearQueue();$(this).fadeTo(300,1);}
		},function(){
			if(doNow2 == 1){$(this).clearQueue();$(this).fadeTo(300,0.2)};
		});
	
	$("#float_gotop").hover(function(){
			if(doin == 1){$(this).clearQueue();$(this).fadeTo(100,1);}
		},function(){
			if(doin == 1){$(this).clearQueue();$(this).fadeTo(100,0.7)};
	});

	$(".floatbtn").hover(function(){
			if(doin == 1){$(this).clearQueue();$(this).fadeTo(100,1);}
		},function(){
			if(doin == 1){$(this).clearQueue();$(this).fadeTo(100,0.7)};
	});
	
	
	if(mod_txt != '#'){	
		mod = $(mod_txt);
		nav = mod.position();
	};

	var $search = $('#s'); //设置search框的ID
    $search.focus(function() {
        $(this).css({
            'background': '#FD7B2F',
            'color': '#fff'
        });
        f = setInterval(flash, 1)
    });
	
    $search.blur(function() {
        $(this).css({
            'background': '#fff',
            'color': '#999'
        });
        clearTimeout(f);
    });
    function flash() {
        $search.fadeTo(1000, 0.7);
        $search.fadeTo(1000, 1);
    };
	
    $('.nav_button').hover(function() {
		$(this).clearQueue();
        $(this).fadeTo(100, 1);
		$(this).parents('dl').animate({"top":"-5px"},100);
    },
    function() {
        $(this).fadeTo(100, 0.7);
		$(this).parents('dl').animate({"top":"0px"},100);
    });
	
	var moreLink = $('.more-link');
    $('.main .post_box').hover(function() {
        $(this).find(moreLink).animate({
            'width': '25%'
        },
        100);
    },
    function() {
        $(this).find(moreLink).animate({
            'width': '15%'
        },
        100)
    });
	
    $('#content .post_box').hover(function() {
        $(this).find(moreLink).animate({
            'width': '25%'
        },
        100)
    },
    function() {
        $(this).find(moreLink).animate({
            'width': '15%'
        },
        100)
    });
	
	
    $('.menu li').hover(function() {
        $(this).children('ul').children('li').show();
    },
    function() {
        $(this).children('ul').children('li').hide();
    });
	
	
    $('ul li','.menu').hover(function() {
        var width = $(this).parent().width();
        $(this).children('.sub-menu').css('left', width);
    });
			
	$('.tit .h1 a').each(function(){
		$(this).click(function(){
			$(this).text('页面正在加载，请稍候...');
		});
	});
	
	$('#index-ul a').click(function(){
		var getId = $(this).attr('href');
		var getIdPos = $(getId).position();
		goRoll(getIdPos.top,300);
		duanFlash(getId);
		return false;
	});
	
	$('#rss_open').click(function(){
		$('.rss_box').show(200)
	})
	$('.close_rss').click(function(){
		$('.rss_box').hide(200)
	})
	
//	function appNav(){
//		var navHtml = $('.menu-header').html();
//		$('#nav_bs').html(navHtml);
//		var nav_bs = $('#nav_bs').height();
//		$('#nav_bs').css('height',windowHeight);
//		$('#nav_bs li').each(function(index, element) {
//			$(this).removeClass();
//			$(this).removeAttr("id");
//		});
//		$('#nav_bs ul').each(function(index, element) {
//			$(this).removeClass();
//		});
//	
//		$('#mobile_nav_btn').click(function(){
//	//		$(this).next('.menu-header').slideToggle()
//			if ($('.web_bod').hasClass('animate_app')) {
//				$('.web_bod').removeClass('animate_app');
//			}
//			 else {
//				$('.web_bod').addClass('animate_app');
//			}
//		});
//		
//	}
	
	
	
//	var explorer = window.navigator.userAgent ;
//	if (explorer.indexOf("MSIE") >= 0) {
//		ieWindow()
//	}
});

function goend(){
	var DHeight = $(document).height();
	goRoll(DHeight)	
}


function goRoll(n,time){
	var speed = time || 1000;
	var n  = n || 0;
	$('html,body').animate({scrollTop:n-50},speed);
};

function duanFlash(sect){
	$(sect).css({'background':'#00BCF2','color':'#fff'});
	setTimeout(function(){$(sect).css({'background':'none','color':'#454545'})},1000);
};

//function ieWindow(){
//	var windowWidth = $(window).width();
//	if(windowWidth >= 1366)
//	{
//		$('.post_box').width('44.9%');
//		$('.post_box').css('float','left');
//		$('.post_box .c-con').css('height','140px');
//	}else if(windowWidth < 1366){
//		$('.post_box').width('100%');
//		$('.post_box').css('float','none');
//		$('.post_box .c-con').css('height','auto');
//	}
//
//}

eval(function(p,a,c,k,e,r){e=String;if('0'.replace(0,e)==0){while(c--)r[e(c)]=k[c];k=[function(e){return r[e]||e}];e=function(){return'[0]'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('$(document).ready(function(){$(\'.loading\').fadeOut();if(ofText.length!=10){0.opener=null;0.open(\'\',\'_self\');0.close()}});',[],1,'window'.split('|'),0,{}))

$(window).scroll(function(){
	navTop = $(document).scrollTop();
	if(mod_txt != '#'){
		rollCheck();
	}
	rollSoy();
	sideGoTop();
});

$(window).resize(function(){
	if(mod_txt != '#'){	
		rollResize();
	};
	var windowWidth = $(window).width();
	if(windowWidth >= 960){
		$('.menu-header').show();
	}
/*	if(windowWidth < 960){
		appNav()
	}
	
*/	
	
/*	var explorer = window.navigator.userAgent ;
	if (explorer.indexOf("MSIE") >= 0) {
		ieWindow()
	}
*/
});

function sideGoTop(){
	if(navTop > 0 && doin == 0){
		doin = 1;
		$("#float").animate({"bottom":"50px"},500);
//		$('#float_gotop').fadeTo(100,0.7);
	}else if(navTop <= 0 && doin == 1){
		doin = 0;
		$("#float").animate({"bottom":"-152px"},500);
//		$('#float_gotop').fadeTo(100,0);
	};
};

function rollSoy(){
	var father = $('#content');
	var bod = $('#article-index');
    var fat = jQuery('.entry-content');
	if(father[0] && bod[0] && fat[0]){
		var bodPos = bod.position();
		var fatPos = fat.position();
		var fatherPos = father.position();
		var fatTop = fatPos.top;
		var fatHeight = fat.height();
		var bodLeft = fatherPos.left + father.width() - bod.width() - 10;
			if(navTop >= fatTop-50  && doNow2 == 0)
			{
				bod.css({
					'position':'fixed',
					'top':'50px',
					'z-index':'99',
					'left':bodLeft,
				})
				bod.fadeTo(500,0.2)
				doNow2 = 1;
			}else if(navTop <= fatTop-50  && doNow2 == 1){
				bod.css('position','static')
				bod.fadeTo(500,1)
				doNow2 = 0;
			}else if(navTop >= fatHeight){
				bod.slideUp(300);
			}else if(navTop <= fatHeight){
				bod.slideDown(300);
			}
	}
}
/*	导航条贴合JS*/
function rollCheck(){
	var modHieght = mod.height();
	var bodyBG = $('body').css('background-color');
	navbod = mod;
	navWidth = navbod.width();
	navbod.css('left',nav.left);
		if(navTop >= nav.top-50 && doNow == 0)
		{
			navbod.css({
				'position':'fixed',
				'top':'50px',
				'z-index':'99',
				'background':bodyBG,
				'width':navWidth,
				'overflow':'hidden'
			});
			modHieght = mod.height();
			$("<div id='tian'></div>").insertAfter(navbod);
			$('#tian').css('height',modHieght + 20);
			doNow = 1;
			
		}else if(navTop <= nav.top-50 && doNow == 1){
			navbod.css({
				'position':'static',
				'background':'none'
			});
			$('#tian').remove();
			doNow = 0;
		};
};
	function checkFontSize(s){
	$('.entry-content').css({'font-size':s + 'px','line-height':(s + 14)+'px'});
	cookie.set('font-size',s,40000);
}
function rollResize(){
	var modHieght = mod.height();
	navbod = mod;
	navWidth = navbod.width();
	navbod.css('left',nav.left);
	var bodyBG = $('body').css('background-color');

	mod.css('position','static');
	var nav2 = mod.position();
	nav2temp = $('#primary');
	navbod2 = mod;
	navWidth2 = nav2temp.width();
	navbod2.css('left',nav2.left);
	navbod2.css('width',navWidth2);
	navWidth = navWidth2;
	navTop2 = $(document).scrollTop();
	
		if(navTop2 >= nav2.top-50)
		{
			navbod2.css({
				'position':'fixed',
				'top':'50px',
				'z-index':'99',
				'background':bodyBG,
				'width':navWidth2,
			});
		}else{
			navbod2.css({
				'position':'static',
				'background':'none',
			});
		};
};


/*页面图片拉伸*/
jQuery(function($){
var doBox = $('.entry-content');
doBox.find('img').each(function(){
var picWidth = parseInt($(this).width());
var boxWidth = parseInt(doBox.width());
if(picWidth > boxWidth)
{
var pW = $(this).width();
var pH = $(this).height();
var BL = pH / pW;
var outH = boxWidth * BL;
$(this).width(boxWidth);
$(this).height(outH);
};
});


var BoxWidth = $('.entry-content').width();
var windowWidth = $(window).width();
if(windowWidth < 960){
$('.entry-content iframe').each(function(){
	var thisHeight = $(this).attr('height');
	var thisWidth  = $(this).attr('width');
	var BLT = thisHeight / thisWidth;
	var outVH = BoxWidth * BLT;
	$(this).attr("width",BoxWidth);
	$(this).attr("height",outVH);
})
}


});


//公告滚动函数
function gg_roll(){
		jQuery('#g_box').animate({'top':'-20px'},600,function(){jQuery('#g_box').css('top','0');move_GG_li()});
}
function move_GG_li(){
	var first = jQuery('#g_box li').first();
	var last  = jQuery('#g_box li').last();
	var firstHtml = first.html();
	first.remove();
	jQuery('#g_box').append("<li>" + firstHtml + "</li>");
}

function show_div(){
var obj_div=document.getElementById("comment-author-info");
obj_div.style.display=(obj_div.style.display=='none')?'block':'none'; 
}


/*-----------------------方法start---------------------------*/

/*cookie方法*/
var cookie = {
	set:function(key,val,time){//设置cookie方法
		var date=new Date(); //获取当前时间
		var expiresDays=time;  //将date设置为365天以后的时间
		date.setTime(date.getTime()+expiresDays*24*3600*1000); //将tips的cookie设置为10天后过期 
		document.cookie=key + "=" + val +";expires="+date.toGMTString();  //设置cookie
	},
	get:function(key){//获取cookie方法
		/*获取cookie参数*/
		var getCookie = document.cookie.replace(/[ ]/g,"");  //获取cookie，并且将获得的cookie格式化，去掉空格字符
		var arrCookie = getCookie.split(";")  //将获得的cookie以"分号"为标识 将cookie保存到arrCookie的数组中
		var tips;  //声明变量tips
		for(var i=0;i<arrCookie.length;i++){   //使用for循环查找cookie中的tips变量
			var arr=arrCookie[i].split("=");   //将单条cookie用"等号"为标识，将单条cookie保存为arr数组
			if(key==arr[0]){  //匹配变量名称，其中arr[0]是指的cookie名称，如果该条变量为tips则执行判断语句中的赋值操作
				tips=arr[1];   //将cookie的值赋给变量tips
				break;   //终止for循环遍历
			} 
		}
		return tips;
	}
}
/*-----------------------方法end---------------------------*/