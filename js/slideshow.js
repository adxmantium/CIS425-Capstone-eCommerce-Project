//slideshow functions

sliderInt = 1;
sliderNext = 2;

$(document).ready(function(){
	$("#img1").fadeIn(300);
	startSlider();
});

function startSlider(){
	count = $(".slides>img").size();

	loop = setInterval(function(){

		if(sliderNext > count){
			sliderNext = 1;
			sliderInt = 1;
		}

		$(".slides > img").fadeOut(300);
		$(".slides > img#"+sliderNext).fadeIn(300);
		sliderInt = sliderNext;
		sliderNext = sliderNext + 1;

	}, 2000);
}

function prev(){
	newSlide = sliderInt - 1;
	showSlide(newSlide);
}

function next(){
	newSlide = sliderInt + 1;
	showSlide(newSlide);
}

function stopLoop(){
	window.clearInterval(loop);
}

function showSlide(id){
	stopLoop();
	if(id > count){
		id = 1;
	}else if(id < 1){
		id = count;
	}

	$(".slides > img").fadeOut(300);
	$(".slides > img#"+ id).fadeIn(300);
	sliderInt = id;
	sliderNext = id + 1;

	startSlider();
}

/*$(".slides > img").hover(function(){
	stopLoop();
}, function(){
	startSlider();
});*/