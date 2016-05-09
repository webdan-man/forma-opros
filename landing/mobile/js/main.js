window.downloadFile=function(sUrl){if(window.downloadFile.isChrome||window.downloadFile.isSafari){var link=document.createElement('a');link.href=sUrl;if(link.download!==undefined){var fileName=sUrl.substring(sUrl.lastIndexOf('/')+1,sUrl.length);link.download=fileName;}if(document.createEvent){var e=document.createEvent('MouseEvents');e.initEvent('click',true,true);link.dispatchEvent(e);return true;}}var query='?download';window.open(sUrl+query,'_self');};window.downloadFile.isChrome=navigator.userAgent.toLowerCase().indexOf('chrome')>-1;window.downloadFile.isSafari=navigator.userAgent.toLowerCase().indexOf('safari')>-1;
$(document).ready(function() {
var steps_array = [
		[0], //массив в котором будет собиратся данніе о пути
		[1], // в каждом из внутренних масивов 1 - номер шага 2 - номер ответа в первом вопросе 3 - вариант ответа в пердыдущем фрейме
		[2],
		[3],
		[4],
		[5],
		[6],
		[7],
		[8],
	];

function go_step(step,reverse){ //функция перехода между шагами

	var query = "[data-step="+step+"]"; //"хвост селектора для отображения фрейма шага"

	console.log(steps_array[step]);

	if (steps_array[step][1] && step>1 && step<6) {
		query+="[data-otvet="+steps_array[step][1]+"]";
	}	
	if (steps_array[step][2]) {
		query+="[data-var="+steps_array[step][2]+"]";
	}

	if (reverse == 1) {//реверсивное движение
		$('.sec.active').removeClass('active');
	}else{
		$('.sec.active').removeClass('active').addClass('disactive');
	}
	$('.sec'+query).removeClass('disactive').addClass('active');

	if(step == 0 || step == 1 ){steps_array = [[0],[1],[2],[3],[4],[5],[6],[7],[8],];}//сброс массивов вариантов овтета 

	$('#opros-wrap').attr('data-step',step);//идентификаторы
	$('#step-data').html(step);
}

function go_fact(fact,reverse){ //функция перехода между фактами

	var query = "[data-fact="+fact+"]"; //"хвост селектора для отображения фрейма шага"

	if (reverse == 1) {//реверсивное движение
		$('.fact.active').removeClass('active');
	}else{
		$('.fact.active').removeClass('active').addClass('disactive');
	}
	$('.fact'+query).removeClass('disactive').addClass('active');

}

function go_etap(etap,reverse){ //функция перехода между фактами

	var query = "[data-etap="+etap+"]"; //"хвост селектора для отображения фрейма шага"

	if (reverse == 1) {//реверсивное движение
		$('.etap.active').removeClass('active');
	}else{
		$('.etap.active').removeClass('active').addClass('disactive');
	}
	$('.etap'+query).removeClass('disactive').addClass('active');
	
	$('.etaps[data-etaps="1"]').attr('data-etap',etap);//идентификаторы

}
function go_start(start,reverse){ //функция перехода между фактами

	var query = "[data-start="+start+"]"; //"хвост селектора для отображения фрейма шага"

	if (reverse == 1) {//реверсивное движение
		$('.start.active').removeClass('active');
	}else{
		$('.start.active').removeClass('active').addClass('disactive');
	}
	$('.start'+query).removeClass('disactive').addClass('active');

}

$('.btn_gr a:not(.site-link)').click(function(e){
	e.preventDefault();

	if ($(this).hasClass('otvet')) {
		for (var i = steps_array.length - 1; i > 0; i--) {
			steps_array[i][1] = parseInt($(this).data('otvet'));
		}
	}
	if ($(this).hasClass('var')) {
			steps_array[parseInt($(this).data('nextstep'))][2] = parseInt($(this).data('var'));
	}

	if ($(this).hasClass('fact-btn')) {
		go_fact(parseInt($(this).data('nextfact')));
	}else if($(this).hasClass('show-etap')){
			$('.etaps[data-etaps="0"]').removeClass('active').addClass('disactive');
			$('.etaps[data-etaps="1"]').addClass('active');
		}else if($(this).hasClass('fins-btn')){
				$(this).closest('.fins').removeClass('active').addClass('disactive');
				$('.fins[data-fins="'+$(this).data('fins')+'"]').addClass('active');
			}else if($(this).hasClass('next-etap')){
					go_etap(parseInt($(this).data('nextetap')));
				}else if($(this).hasClass('download')){
						window.downloadFile('ajax/Предложение от Gulfstream.pdf');
					}else if($(this).hasClass('next-start')){
							go_start(parseInt($(this).data('nextstart')));
						}else {
								var next_step = parseInt($(this).data('nextstep'));
								var cur_step = next_step-1;
								if (cur_step < 5) {
									$('input.step-inp[data-step="'+cur_step+'"]').val($(this).text());
								}
								go_step(parseInt($(this).data('nextstep')));
							}
});

$('.back').click(function(e){
	e.preventDefault();

	if ($(this).hasClass('back-fact')) {
		go_fact(parseInt($(this).data('prevfact')),1);
	}else if($(this).hasClass('hide-etap')){
			$('.etaps[data-etaps="1"]').removeClass('active');
			$('.etaps[data-etaps="0"]').removeClass('disactive').addClass('active');
		}else if($(this).hasClass('back-fins')){
				$('.fins.active').removeClass('active');
				$('.fins.disactive').removeClass('disactive');
				$('.fins[data-fins="0"]').removeClass('disactive').addClass('active');
			}else if($(this).hasClass('close-ok')){
		        	$('.fins[data-fins="2"]').addClass('active');
		            $('.okgo').removeClass('active');
				}else if($(this).hasClass('back-etap')){
						go_etap(parseInt($(this).data('prevetap')),1);
					}else if($(this).hasClass('prev-start')){
							go_start(parseInt($(this).data('prevstart')),1);
						}else {
							go_step(parseInt($(this).data('prevstep')),1);
						}
});
function getURLParameter(name) {return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null;} 
function run_geo(geo_url){
    $.ajax({type: 'GET',url: geo_url,dataType: 'xml',
        success: function(xml) {$(xml).find('ip').each(function(){
        var city = $(this).find('city').text();
        var region = $(this).find('region').text();
        if(city!=region){var ipg = city+', '+region;}else{var ipg = city;}
        $('<input type="hidden" />').attr({name: 'location', class: 'location', value:ipg}).appendTo("form");
    });}});
}
$.get("http://ipinfo.io", function(response) {geo_url='http://ipgeobase.ru:7020/geo?ip='+response.ip; run_geo(geo_url);}, "jsonp");
utm=[];$.each(["utm_source","utm_medium","utm_campaign","utm_term",'source_type','source','position_type','position','added','creative','matchtype'],function(i,v){$('<input type="hidden" />').attr({name: v, class: v, value: function(){if(getURLParameter(v) == undefined)return '-'; else return getURLParameter(v)}}).appendTo("form")});
$('<input type="hidden" />').attr({name: 'url', value: document.location.href}).appendTo("form");
$('<input type="hidden" />').attr({name: 'title', value: document.title}).appendTo("form");


$('input[name="name"]').blur(function() {if($(this).val().length < 3) {$(this).addClass('error-input');}});
$('input[name="name"]').focus(function() {$(this).removeClass('error-input');});

$('input[name="phone"]').mask('+7 (999) 999-99-99');
$('input[name="phone"]').blur(function() {if($(this).val().length != 18) {$(this).addClass('error-input');}});
$('input[name="phone"]').focus(function() {$(this).removeClass('error-input');});

$('.line').swipe({
	swipe:function(event,direction){
		if(direction==='left'){
			console.log('left');
			$('.etap.active a.back-etap').trigger('click');
		}
		if(direction==='right'){
			console.log('right');
			$('.etap.active a.next-etap').trigger('click');
		}
	},
	excludedElements:[]
});


$('form').submit(function(e){
    e.preventDefault();
    $(this).find('input[type="text"]').trigger('blur');
    if(!$(this).find('input[type="text"]').hasClass('error-input')){
        var type=$(this).attr('method');
        var url=$(this).attr('action');
        var data=$(this).serialize();
        $.ajax({type: type, url: url, data: data,
        success : function(){
        	$('.fins[data-fins="2"]').removeClass('active');
            $('.okgo').addClass('active');
        }
    }); 
    }
});

});