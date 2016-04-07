$(document).ready(function() {
	var steps_array = [ //массив в котором будет собиратся данніе о пути
		[1], // в каждом из внутренних масивов 1 - номер шага 2 - номер ответа в первом вопросе 3 - вариант ответа в пердыдущем фрейме
		[2],
		[3],
		[4],
		[5],
		[6],
		[7],
		[8],
	];

function go_step(step){ //функция перехода между шагами

	var query = "[data-step="+step+"]"; //"хвост селектора для отображения фрейма шага"

	console.log(steps_array[step-1]);

	if (steps_array[step-1][1] && step>1 && step<5) {
		query+="[data-otvet="+steps_array[step-1][1]+"]";
	}	
	if (steps_array[step-1][2]) {
		query+="[data-var="+steps_array[step-1][2]+"]";
	}

	$('.sec').removeClass('active');
	$('.sec'+query).addClass('active');
}

$('.btn_gr a').click(function(e){
	e.preventDefault();

	if ($(this).hasClass('otvet')) {
		for (var i = steps_array.length - 1; i > 0; i--) {
			steps_array[i][1] = parseInt($(this).data('otvet'));
		}
	}
	if ($(this).hasClass('var')) {
			steps_array[parseInt($(this).data('nextstep'))-1][2] = parseInt($(this).data('var'));
	}

	go_step(parseInt($(this).data('nextstep')));

});

$('.back').click(function(e){
	e.preventDefault();
	go_step(parseInt($(this).data('prevstep')));
});


});