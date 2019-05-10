function isVisible( row, container ){

    var elementTop = $(row).offset().top,
        elementHeight = $(row).height(),
        containerTop = container.scrollTop(),
        containerHeight = container.height();

    return ((((elementTop - containerTop) + elementHeight) > 0) && ((elementTop - containerTop) < containerHeight));
}

$(window).on('scroll', function (e) {
    //eerste keer


    $('.scroll').each(function(){
        if(isVisible($(this), $(window))){

            // kijken maar 1 keer worden uitgevoerd
            if(!$(this).hasClass('visible')){
                console.log(this);
                // bekijk de data van animation welke animatie moet worden uitgevoerd!
                animationAttr = $(this).attr('data-animation');
                //animationAttr = $(this).data( "animation" );
                animationDelay = $(this).attr( "data-animation-delay" );
                //animationDelay = $(this).data( "animation-delay" );

                console.log(animationDelay);
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
