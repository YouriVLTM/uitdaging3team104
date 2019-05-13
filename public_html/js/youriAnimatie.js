
//Functie
function isVisible( row, container ){
    elementTop = $(row).offset().top;
    elementHeight = $(row).height();
    containerTop = container.scrollTop();
    containerHeight = container.height();
    return ((((elementTop - containerTop) + elementHeight) > 0) && ((elementTop - containerTop) < containerHeight));
}

$(window).on('scroll', function (e) {
    $('.scroll').each(function(){
        console.log($(this));
        if(isVisible($(this), $(window))){

            // kijken maar 1 keer worden uitgevoerd
            if(!$(this).hasClass('visible')){
                // bekijk de data van animation welke animatie moet worden uitgevoerd!
                animationAttr = $(this).attr('data-animation');
                //animationAttr = $(this).data( "animation" );
                animationDelay = $(this).attr( "data-animation-delay" );
                //animationDelay = $(this).data( "animation-delay" );

                $(this).css('animation-delay',animationDelay);
                // die class implementeren
                $(this).toggleClass(animationAttr);
                // deze klasse visible maken
                // $(this).removeClass('notvisible');
                $(this).addClass('visible');
            }


        };
    });


});