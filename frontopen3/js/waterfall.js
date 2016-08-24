// FOR EMPOTO - UU
/*
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1;};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p;}('$(2(){5 a=$(\'#4\');5 b=$(\'#4 .8\');5 c=$(\'#9 3 + a\').7(\'6\');a.k(2(){$(q).i({y:\'.8\',w:\'B\'})});$(m).u(\'t\',2(){h($(n).C()+$(m).g()>$(n).g()-1){h(c!=x){$.z({A:c,v:\'r\',p:\'s\',D:2(d){$f=$(d).j(\'#4 .8\');c=$(d).j(\'#9 3 + a\').7(\'6\');$(\'#4\').L($f);5 e=$f.P({o:0});e.k(2(){e.N({o:1},F);a.i(\'E\',e,I)});$(\'#9 3 + a\').7(\'6\',c)}})}G{$("#l 3").H("J M");$("#l").O("K")}}})});',52,52,'||function|span|content|var|href|attr|box|pageurl||||||result|height|if|isotope|find|imagesLoaded|loading|window|document|opacity|dataType|this|GET|html|scroll|bind|type|layoutMode|undefined|itemSelector|ajax|url|masonry|scrollTop|success|appended|600|else|text|true|NO|fast|append|MORE|animate|show|css'.split('|'),0,{}))

*/
$(function() {
	var a = $('#content');
	var b = $('#content .box');
	var c = $('#pageurl span + a').attr('href');
	a.imagesLoaded(function() {
		$(this).isotope({
			itemSelector: '.box',
			layoutMode: 'masonry'
		})
	});
	$(window).bind('scroll',
	function() {
		if ($(document).scrollTop() + $(window).height() > $(document).height() - 1) {
			if (c != undefined) {
				$.ajax({
					url: c,
					type: 'GET',
					dataType: 'html',
					success: function(d) {
						$result = $(d).find('#content .box');
						c = $(d).find('#pageurl span + a').attr('href');
						$('#content').append($result);
						var e = $result.css({
							opacity: 0
						});
						e.imagesLoaded(function() {
							e.animate({
								opacity: 1
							},
							600);
							a.isotope('appended', e, true)
						});
						$('#pageurl span + a').attr('href', c)
					}
				})
			} else {
				$("#loading span").text("^_^ 已经为你加载完毕！");
				$("#loading").show("fast")
			}
		}
	})
});




/*


$(document).ready(function(){

	$(".btn-slide").click(function(){
		$("#comment-place").slideToggle("slow");
		$(this).toggleClass("active"); return false;
	});
	
	 
});

function showdiv(targetid,objN){
   
      var target=document.getElementById(targetid);
      var clicktext=document.getElementById(objN)

            if (target.style.display=="block"){
                target.style.display="none";
                clicktext.innerText="更换";
   

            } else {
                target.style.display="block";
                clicktext.innerText='关闭';
            }
   
}*/


~
function($) {
	var $w = $(window),
	$d = $(document),
	$lay = $('<div id=ph_lay/>'),
	$zoom = $('<div id=ph_zoom/>'),
	$both = $lay.add($zoom),
	PHZOOM = function(e, x, y, z) {
		this.opt = x;
		this.idx = y;
		this.all = z;
		this.len = z.length;
		this.end = this.len > y + 1;
		this.img = $('img:first', e);
		this.lnk = e.addClass('phzoom').unbind('click').bind(this.imgFn()).append(this.hov = $('<span class=ph_hover/>').hide())[0];
		this.cap = $('<div/>', {
			css: {
				color: x.capColor
			},
			id: 'ph_cap',
			html: $([$('<span/>', {
				id: 'ph_txt',
				text: this.img[0].title || this.lnk.title || 'No Title'
			})[0], $('<span/>', {
				id: 'ph_idx',
				text: y + 1 + ' / ' + this.len
			})[0]])
		}).add(this.nav = $('<div/>', {
			id: 'ph_nav',
			css: {
				color: x.navColor
			},
			html: (y ? '<span id=ph_prev>' + x.prevText + '</span>': '') + (this.end ? '<span id=ph_next>' + x.nextText + '</span>': '')
		}));
		$both.click($.proxy(this, 'imgQuit'));
		window.XMLHttpRequest || e.height(this.img.height())
	};
	PHZOOM.prototype = {
		imgFn: function() {
			var that = this,
			s = function() {
				return that.hov.not('.loading').stop(0, 1)
			};
			return {
				mouseover: function() {
					s().fadeIn()
				},
				mouseout: function() {
					s().fadeOut()
				},
				click: function() {
					that.imgLoad();
					return false
				}
			}
		},
		imgPos: function(oriW, oriH) {
			var A = this.img,
			L = $w.scrollLeft(),
			T = $w.scrollTop(),
			pos = [oriW, oriH, A.width(), A.height(), A.offset().left, A.offset().top, $w.width(), $w.height()];
			this.opt.limitWidth && pos[0] > pos[6] && (pos[1] = pos[6] * pos[1] / pos[0], pos[0] = pos[6]);
			return pos.concat((pos[6] - pos[0]) / 2 + L, (pos[7] - pos[1]) / 2 + T, (pos[6] - pos[2]) / 2 + L, (pos[7] - pos[3]) / 2 + T)
		},
		imgLoad: function() {
			$lay.fadeTo(this.opt.layDur, this.opt.layOpacity);
			var that = this,
			B = new Image;
			this.hov.addClass('loading');
			B.className = 'zoomed';
			B.onload = function() {
				B.onload = null;
				that.hov.hasClass('loading') && ($zoom.height($d.height()).append(B).show(), that.imgAnim(B), that.preLoad())
			};
			B.src = this.lnk.href
		},
		imgAnim: function(B) {
			var that = this,
			$B = $(B),
			pos = this.imgPos(B.width || +$B.attr('width'), B.height || +$B.attr('height')),
			oFlow = pos[6] < pos[0],
			E = this.evtMon(pos[6], pos[6] - pos[0], !oFlow, $B);
			$B.after(this.cap.hide()).css({
				left: pos[4],
				top: pos[5],
				width: pos[2],
				height: pos[3]
			}).animate({
				left: pos[10],
				top: pos[11]
			},
			this.opt.animDurA,
			function() {
				$B.animate({
					left: pos[8],
					top: pos[9],
					width: pos[0],
					height: pos[1]
				},
				that.opt.animDurB,
				function() {
					that.hov.removeClass('loading');
					that.cap.css({
						top: pos[1] + pos[9],
						left: oFlow ? 0: pos[8],
						width: oFlow ? pos[6] : pos[0]
					}).fadeTo(300, .7);
					that.nav.bind(E).css('top', pos[1] / 3 + pos[9]);
					that.keyBind()
				}).bind(E)
			})
		},
		imgQuit: function(isQuit) {
			this.hov.hide().hasClass('loading') ? this.hov.removeClass('loading') : $d.unbind('.phzoom');
			$zoom.hide().empty();
			isQuit && $lay.fadeOut();
			return false
		},
		imgChange: function(num) {
			this.imgQuit();
			$('.ph_hover', $(this.all[this.idx + num]).click()).show();
			return false
		},
		preLoad: function(x, y) {
			this.idx && (x = new Image, x.src = this.all[this.idx - 1].href, delete x);
			this.end && (y = new Image, y.src = this.all[this.idx + 1].href, delete y)
		},
		keyBind: function() {
			var that = this;
			$d.bind('keydown.phzoom',
			function(e) {
				e = e.which;
				return e == 27 ? that.imgQuit(1) : e == 39 && that.end ? that.imgChange(1) : e ^ 37 || !that.idx || that.imgChange( - 1)
			})
		},
		evtMon: function(a, b, c, $B) {
			var that = this,
			nav = $('span', this.nav).hide();
			return {
				click: function(e) {
					e = e.pageX > a / 2;
					return that.len < 2 || (that.idx ? that.end ? that.imgChange(e || -1) : e || that.imgChange( - 1) : !e || that.imgChange(1))
				},
				mouseout: function() {
					nav.hide()
				},
				mousemove: function(e, i) {
					e = e.pageX,
					i = e > a / 2;
					that.idx ? (nav.eq(i).show(), nav.eq(1 - i).hide()) : nav[i ? 'show': 'hide']();
					c || (e = e < a / 3 ? 0: e > a * 2 / 3 ? b: b / 2) == $B.position().left || $B.not(':animated').animate({
						left: e
					},
					200)
				}
			}
		}
	};
	$.phzoom = function(Z, x, z) {
		x = $.extend({
			layOpacity: .7,
			layDur: 300,
			animDurA: 300,
			animDurB: 300,
			navColor: '#3fa7cb',
			capColor: '#3fa7cb',
			prevText: 'Prev',
			nextText: 'Next',
			limitWidth: false,
			returnOrigin: true
		},
		x),
		(z = Z.has('img'))[0] && ($('#ph_lay')[0] || $('body').append($both), z.each(function(y, t) {
			$.data(t, 'phzoom', new PHZOOM($(t), x, y, z))
		}));
		return x.returnOrigin ? Z: z
	};
	$.fn.phzoom = function(x) {
		return $.phzoom(this, x)
	}
} (jQuery);
