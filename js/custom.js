jQuery(document).ready(function($) {
    $('.banner-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.thumbnail-slider'
    });

    $('.thumbnail-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.banner-slider',
        dots: false,
        arrows: false,
        centerMode: true,
        focusOnSelect: true,

        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 3,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 380,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
    });
});
