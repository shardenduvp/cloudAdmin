$(document).ready(function() {
    $('.autoplay').slick({
        dots: false,
        infinite: true,
        speed: 2000,
        slidesToShow: 3,
        slidesToScroll: 1,
		autoplay: false,
        responsive: [{
            breakpoint: 1024,
            settings: {
				autoplay: false,
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: false
            }
        }, {
            breakpoint: 600,
            settings: {
				autoplay: true,
                slidesToShow: 3,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 480,
            settings: {
				autoplay: true,
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });


});
