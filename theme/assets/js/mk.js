$(function () {
  $(".slide-one-item").owlCarousel({
    center: false,
    items: 1,
    loop: true,
    stagePadding: 0,
    margin: 0,
    autoplay: true,
    pauseOnHover: false,
    animateOut: "fadeOut",
    nav: true,
    navText: [
      '<span class="icon-keyboard_arrow_left">',
      '<span class="icon-keyboard_arrow_right">',
    ],
  });
}, jQuery);
