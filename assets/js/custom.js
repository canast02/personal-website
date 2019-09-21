jQuery(document).ready(function ($) {
    let windowWidth = $(window).width();
    $(window).resize(function () {
        // Check window width has actually changed and it's not just iOS triggering a resize event on scroll
        if ($(window).width() !== windowWidth) {
            windowWidth = $(window).width();
            sizing(windowWidth);
        }
    });
    sizing(windowWidth);
    internal_link();

    // Render email address.
    $('.email-address').html(spiderjam('canastas', 'usc.edu'));

    // Render publications.
    renderPublications($('#publications-box'));
});

function spiderjam(mym, myd) {
    return "<a href=mailto:" + mym + "&#64;" + myd + ">" + mym + "&#64;" + myd + "</a>";
}

function renderPublications(elem) {
    $.ajax({
        url: 'publications/renderer.php'
    })
    .done(function (data) {
        elem.html(data);
    })
    .fail(function (err) {
        elem.html('<span style="color: red;">Unable to load publications.</span>')
    });
}

// Take action if the request on URI has internal link '#'.
function internal_link() {
    const urlArray = window.location.href.split('#');
    if (urlArray.length === 2 && urlArray[1] !== "") {
        switch (urlArray[1]) {
            case "intro":
                $('#tab-intro-content').show();
                break;
            // case "news":
            //     $('#tab-news-content').show();
            //     break;
            case "publications":
                $('#tab-publications-content').show();
                break;
            case "experience":
                $('#tab-experience-content').show();
                break;
            case "awards":
                $('#tab-awards-content').show();
                break;
            case "contact":
                $('#tab-contact-content').show();
                break;
            default:
                break;
        }
    }
}

function sizing(windowWidth) {
    if (windowWidth <= 480) { // ipad:768, Nexus10:800, 480
        $('.noshow').show();
        $('.expandshow').show();
        $('.allshow').hide(); //
        $('.collapseshow').hide();
    } else {
        $('.allshow').show();
        $('.noshow').hide();
        $('.expandshow').hide();
        $('.collapseshow').hide();
    }
}

function expandAll() {
    $('.allshow').show();
    $('.collapseshow').show();
    $('.noshow').hide();
    $('.expandshow').hide();
}

function collapseAll() {
    $('.allshow').hide();
    $('.noshow').show();
    $('.expandshow').show();
    $('.collapseshow').hide();
}

function reset_menus() {
    sizing($(window).width());
}

// Navigation
$(document).on('click', function (e) {
   $('#bs-example-navbar-collapse').collapse('hide');
});

$(document).on('scroll', function (e) {
    $('#bs-example-navbar-collapse').collapse('hide');
});

