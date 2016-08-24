window.onerror=function(){return true;};
function loading(l,t){
	var long = l || '100%';
	var time = t || 1000;
	jQuery('.loading').clearQueue();
	jQuery('.loading').animate({'width':long},time);
};
$(document).ready(function(){
	$('.loading').fadeOut();	
});