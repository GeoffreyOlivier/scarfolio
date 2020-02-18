

$(document).ready(function () {
   var $container = $('.alime-portfolio');

    $container.imagesLoaded(function () {
        $container.isotope({
            itemSelector: 'figure',
            filter: '.level',
            resizable: false,
            animationEngine: 'jquery'
        });
    });
});