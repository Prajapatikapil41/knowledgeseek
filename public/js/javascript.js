// scrolled classes

$("document").ready(function () {
	$(window).scroll(function () {
		$("nav").toggleClass("scrolled", $(this).scrollTop() > 15);
		$(".navbar-container").toggleClass("scrolled", $(this).scrollTop() > 15);
		$(".nav-link").toggleClass("scrolled", $(this).scrollTop() > 15);
		$(".navbar-brand").toggleClass("scrolled", $(this).scrollTop() > 15);
		$("i").toggleClass("scrolled", $(this).scrollTop() > 15);
		$(".dropdown-item").toggleClass("scrolled", $(this).scrollTop() > 15);
		$(".dropdown-item").toggleClass("scrolled", $(this).scrollTop() > 15);
		$(".dropdown-menu").toggleClass("scrolled", $(this).scrollTop() > 15);
	});

	if (window.matchMedia("(max-width: 786px;)").matches) {
		$(".right-about h3").hide();
	}
});

//   owl carasoule

$("document").ready(function () {
	$(".owl-carousel").owlCarousel({
		items: 1,
		loop: false,
		dots: false,
		margin: 50,
		autoplay: true,
		autoplayTimeout: 4000,
		autoplayHoverPause: true,
		nav: true,
		responsive: {
			0: {
				items: 1,
			},
			400: {
				items: 1,
			},
			769: {
				items: 2,
			},
			1025: {
				items: 3,
			},
		},
	});

	$(".play").on("click", function () {
		owl.trigger("play.owl.autoplay", [2000]);
	});
	$(".stop").on("click", function () {
		owl.trigger("stop.owl.autoplay");
	});
});
