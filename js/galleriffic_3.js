jQuery(document).ready(function($){
    // We only want these styles applied when javascript is enabled
    $('div.navigation').css({
        'width': '300px',
        'float': 'left'
    });
    $('div.content').css('display', 'block');

    // Initially set opacity on thumbs and add
    // additional styling for hover effect on thumbs
    var onMouseOutOpacity = 0.67;
    $('#thumbs ul.thumbs li').opacityrollover({
        mouseOutOpacity: onMouseOutOpacity,
        mouseOverOpacity: 1.0,
        fadeSpeed: 'fast',
        exemptionSelector: '.selected'
    });

    // Enable toggling of the caption
    

    

    /**** Functions to support integration of galleriffic with the jquery.history plugin ****/

    // PageLoad function
    // This function is called when:
    // 1. after calling $.historyInit();
    // 2. after calling $.historyLoad();
    // 3. after pushing "Go Back" button of a browser
    function pageload(hash){
        // alert("pageload: " + hash);
        // hash doesn't contain the first # character.
        if (hash) {
            $.galleriffic.gotoImage(hash);
        }
        else {
            gallery.gotoIndex(0);
        }
    }

    // Initialize history plugin.
    // The callback is called at once by present location.hash.
    $.historyInit(pageload, "advanced.html");

    // set onlick event for buttons using the jQuery 1.3 live method
    $("a[rel='history']").live('click', function(){
        if (e.button != 0)
            return true;

        var hash = this.href;
        hash = hash.replace(/^.*#/, '');

        // moves to a new page.
        // pageload is called at once.
        // hash don't contain "#", "?"
        $.historyLoad(hash);

        return false;
    });

        var $el, leftPos, newWidth, $mainNav = $("#example-two");
        $mainNav.append("<li id='magic-line-two'></li>");
        var $magicLine = $("#magic-line-two");
        $magicLine.width($(".now").width())
		.height($mainNav.height()).css("left", $(".now a")
		.position().left)
		.data("origLeft", $(".now a")
		.position().left).data("origWidth", $magicLine.width())
		.data("origColor", $(".now a").attr("rel"));
        $("#example-two li").find("a").hover(function(){
            $el = $(this);
            leftPos = $el.position().left;
            newWidth = $el.parent().width();
            $magicLine.stop().animate({
                left: leftPos,
                width: newWidth,
                backgroundColor: $el.attr("rel")
            })
        }, function(){
            $magicLine.stop().animate({
                left: $magicLine.data("origLeft"),
                width: $magicLine.data("origWidth"),
                backgroundColor: $magicLine.data("origColor")
            });
        });
        // Initialize Advanced Galleriffic Gallery
    var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 15,
					preloadAhead:              10,
					enableTopPager:            true,
					enableBottomPager:         true,
					maxPagesToShow:            7,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              'Play Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Previous Photo',
					nextLinkText:              'Next Photo &rsaquo;',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             true,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						this.fadeTo('fast', 1.0);
					}
				});
        
});

 function getImage(path,argName){
 	$.getScript(path,function(){
			//console.info(json);
				alert(_s);
	});

 }