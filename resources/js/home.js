document.addEventListener('DOMContentLoaded', function () {
    var carouselElement = document.querySelector('#homeCarousel');

    if (carouselElement && typeof bootstrap !== 'undefined') {
        new bootstrap.Carousel(carouselElement, {
            ride: 'carousel'
        });
    }
});
