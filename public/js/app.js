function convertToSlug(Text) {
    return Text
        .toLowerCase()
        .replace(/[^\w ]+/g, '')
        .replace(/ +/g, '-')
        ;
}

$(function () {

    $('a[href*=#]:not([href=#])').click(function () {
        console.log(location.pathname);// /~shao/1.less_web/snippets/scrollings/smooth-scrolling/test.html
        console.log(location.hostname);// peihui.unetizen.net
        console.log($(this.hash));// hash is the hash(#) anchor part, e.g. #top
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });

    $('[data-toggle="tooltip"]').tooltip();
    $('.tag-control').click(function () {
        $target = $(this).parent('.tag-title').next('.tag-content');
        $target.toggle();
        $(this).children('.fa').toggleClass('fa-arrow-circle-right').toggleClass('fa-arrow-circle-up');
    });

    var lastScrollTop = 0;
    $(window).scroll(function (event) {
        var st = $(this).scrollTop();
        if (st <= 220) {
            $(".sc-header-blog").fadeIn("slow");
            return;
        }

        if (st > lastScrollTop) {
            $(".sc-header-blog").delay(100).fadeOut("slow");  //hide
        } else {
            $(".sc-header-blog").delay(100).fadeIn("slow");   //show
        }
        lastScrollTop = st;
    });

    $('.sc-btn-rocket').click(function () {
        $('html,body').animate({
            scrollTop: $('.main-body').offset().top
        }, 1000);
    });

    $("#sc-portfolio-demo").owlCarousel({
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true

        //3 items per screen
        //autoPlay: 3000, //Set AutoPlay to 3 seconds
        //items: 3,
        //itemsDesktop: [1199, 4],
        //itemsDesktopSmall: [979, 3],
        //stopOnHover: true
    });

    $('.sc-side-control').click(function () {
        if (window.matchMedia('(min-width: 992px)').matches) {
            if ($('.sc-side-dock').children('.side').length != 0) {
                console.log('add to .main-body');
                $('.side').insertAfter('.main-body');
            }

            if ($(this).hasClass('sc-side-displayed')) {//hiding....
                var me = $(this);

                $('.side').removeClass('fadeInUp fadeOutDown');

                $('.side').hide();
                $('.main-body').addClass('col-md-12').removeClass('col-md-9');


                me.removeClass('sc-side-displayed');
                me.children('i').removeClass('fa-arrow-up').removeClass('fa-arrow-down')
                    .removeClass('fa-arrow-right').addClass('fa-arrow-left');

            }
            else {
                $(this).addClass('sc-side-displayed');
                $(this).children('i').removeClass('fa-arrow-up').removeClass('fa-arrow-down')
                    .removeClass('fa-arrow-left').addClass('fa-arrow-right');

                $('.main-body').addClass('col-md-9').removeClass('col-md-12');
                $('.side').removeClass('fadeInUp fadeOutDown').show();
            }
            //if ($('.sc-side-dock').children('.side').length != 0) {
            //    console.log('add to .main-body');
            //    $('.side').insertAfter('.main-body');
            //}
            //
            //if ($(this).hasClass('sc-side-displayed')) {//hiding....
            //    var me = $(this);
            //
            //    $('.side').removeClass('fadeInRight fadeInUp fadeOutDown').addClass('fadeOutRight');
            //    setTimeout(function () {
            //        $('.side').hide();
            //        $('.main-body').addClass('col-md-12').removeClass('col-md-9');
            //
            //
            //        me.removeClass('sc-side-displayed');
            //        me.children('i').toggleClass('fa-arrow-right').toggleClass('fa-arrow-left');
            //    }, 400);
            //}
            //else {
            //
            //    $(this).addClass('sc-side-displayed');
            //    $(this).children('i').toggleClass('fa-arrow-left').toggleClass('fa-arrow-right');
            //
            //    $('.main-body').addClass('col-md-9').removeClass('col-md-12');
            //    $('.side').removeClass('fadeOutRight fadeInUp fadeOutDown').addClass('fadeInRight').show();
            //}
        }
        else {//for tablet and mobile, show or hide the div in an absolute position
            if ($(this).hasClass('sc-side-displayed')) {
                $(this).removeClass('sc-side-displayed');

                $('.side').removeClass('fadeInUp').addClass('fadeOutDown');
                setTimeout(function () {
                    $('.side').hide().insertAfter('.main-body');
                }, 400);
                //NOTE: a timer must be present to view the hiding effect!!
                $(this).children('i').removeClass('fa-arrow-left').removeClass('fa-arrow-right')
                    .removeClass('fa-arrow-up').toggleClass('fa-arrow-down');
            }
            else {
                $(this).addClass('sc-side-displayed');
                $('.side').removeClass('fadeOutDown').addClass('fadeInUp').show().appendTo('.sc-side-dock');
                $(this).children('i').removeClass('fa-arrow-left').removeClass('fa-arrow-right')
                    .removeClass('fa-arrow-down').addClass('fa-arrow-up');
            }

        }


    });

    $('.sc-social-control').click(function () {
        $('.sc-article-share-panel').toggleClass('shrinked');
        $(this).children('i').toggleClass(' fa-share-alt').toggleClass('fa-close');
    });

    $('.sc-article .sc-article-body>h1').append(function (index, html) {
        //console.log(html);
        //console.log(' <a href="#' + convertToSlug(html) + '">#</a>');
        return ' <a name="' + convertToSlug(html) + '">#</a>';
    });

    $('.ctr-close').click(function () {
        //console.log('closing...');
        //console.log($(this).parents('.float-error'));
        $(this).parents('.float-error').html('');
    });

    $('.admin-fullscreen-ctrl').click(function () {
        $target = $('#wrapper>.navbar-static-top');
        if ($target.is(':visible')) {//hide
            $target.hide();
            $('#page-wrapper').css('margin-left', 0);
        }
        else {
            $target.show();
            $('#page-wrapper').css('margin-left', 200);
        }
    });


    //var owl = $("#sc-portfolio-demo").data('owlCarousel');
    //owl.next()   // Go to next slide
    //owl.prev()   // Go to previous slide
    //add your own handlers on each side??

    hljs.initHighlightingOnLoad();
    emojify.setConfig({
        tag_type: 'span',           // Only run emojify.js on this element
        mod: 'sprite',
        img_dir: '/images/sprites',  // Directory for emoji images
        ignored_tags: {                // Ignore the following tags
            'SCRIPT': 1,
            'TEXTAREA': 1,
            'A': 1,
            'PRE': 1,
            'CODE': 1
        }
    });
    emojify.run();

});