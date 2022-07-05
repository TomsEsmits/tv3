'use strict';

const swiper = new Swiper('.post-slider__swiper', {
    // Optional parameters
    direction: 'horizontal',
    slidesPerView: 2,
    spaceBetween: 9,
    loop: true,
    draggable: true,
  
    // Navigation arrows
    navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev'
    },
  
    // And if we need scrollbar
    scrollbar: {
      	el: '.swiper-scrollbar',
    },

    breakpoints: {
		768: {
			slidesPerView: 3
		},
		992: {
			slidesPerView: 5
		}
    }
});