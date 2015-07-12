jQuery(document).ready(function ($) {
    'use strict';

    /* sections */
    $("h2.toggle").click(function (e) {
        if ($(this).hasClass('closed')) {
            $(this).removeClass('closed');
            $(this).addClass('opened');
            $(this).next().slideDown('fast', function () {
                //e.preventDefault();
                goToByScroll($(this).parent().attr("id"));
            });

            if ($(this).parent().attr('id') == 'resume') {
                set_skill_percent()
            }
        }
        else {
            $(this).removeClass('opened');
            $(this).addClass('closed');
            $(this).next('.item-cont').slideUp(800);
        }
        $('li.active').click();
    });

    /* settings */
    $('#settings-icon').click(function () {
        if ($('#settings').hasClass('active')) {
            $('#settings').animate({"left": "-210px"}, "slow").removeClass('active');
        } else {
            $('#settings').animate({"left": "0"}, "slow").addClass('active');
        }
    });

    /* profile */
    $("#profile .col500").animate({'margin-left': "0%"}, 600);
    $("#profile .col260").animate({'margin-right': "0%"}, 600);

    //page scroll up
    $("#up").click(function () {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

    //set #up position for pc screens
    position_up();

    $(window).resize(function () {
        position_up();
    });

    $('a[data-rel]').each(function () {
        $(this).attr('rel', $(this).attr('data-rel')).removeAttr('data-rel');
    });

    $('audio[data-width]').each(function () {
        $(this).attr('width', $(this).attr('data-width')).removeAttr('data-width');
    });
    $('audio[data-type]').each(function () {
        $(this).attr('type', $(this).attr('data-type')).removeAttr('data-type');
    });

});

/* set skill percent
 =========================================== */
function set_skill_percent() {
    $('.skill-percent-line').each(function () {
        var width = $(this).data("width");
        $(this).animate({width: width + '%'}, 1000);
    });
}

/* scroll to section by id
 =========================================== */
function goToByScroll(id) {
    id = id.replace("link", "");
    $('html,body').animate({scrollTop: $("#" + id).offset().top}, 'slow');
}

/* set #up position
 =========================================== */
function position_up() {
    if ($(window).width() < 1024) {
        $('#up').css({right: '20px', bottom: '20px'});
    } else {
        $('#up').removeAttr('style');
    }
}