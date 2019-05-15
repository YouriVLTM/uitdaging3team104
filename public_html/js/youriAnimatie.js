//global functions
//Functie
function isVisible( row, container ){
    elementTop = $(row).offset().top;
    elementHeight = $(row).height();
    containerTop = container.scrollTop();
    containerHeight = container.height();
    return ((((elementTop - containerTop) + elementHeight) > 0) && ((elementTop - containerTop) < containerHeight));
}
function Animate(window){
    $('.scroll').each(function(){
        //console.log($(this));
        if(isVisible($(this), $(window))){

            // kijken maar 1 keer worden uitgevoerd
            if(!$(this).hasClass('visible')){
                // bekijk de data van animation welke animatie moet worden uitgevoerd!
                animationAttr = $(this).attr('data-animation');
                animationDelay = $(this).attr( "data-animation-delay" );
                $(this).css('animation-delay',animationDelay);
                // De class implementeren
                $(this).toggleClass(animationAttr);
                // deze klasse visible maken
                // $(this).removeClass('notvisible');
                $(this).addClass('visible');
            }


        };
    });
}
$(window).ready(function () {
    Animate(window);
})

$(window).on('scroll', function (e) {
    Animate(window);
});