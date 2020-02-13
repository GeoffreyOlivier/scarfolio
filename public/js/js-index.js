

$(document).ready(function () {
   var $container = $('.alime-portfolio');

    $container.imagesLoaded(function () {
        $container.isotope({
            itemSelector: 'figure',
            filter: '.game',
            resizable: false,
            animationEngine: 'jquery'
        });
    });
});