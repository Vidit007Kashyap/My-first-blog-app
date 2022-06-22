/**
 * Call the dataTables jQuery plugin
 *  */


/**
 *  Init Swiper
 */

const categorySwiper = new Swiper('.categories-slider', {
    loop: true,
    slidesPerView: 3,
    spaceBetween: 30,
    allowTouchMove: false,
    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },
});