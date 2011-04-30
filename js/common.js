$(document).ready(function(){
    var currentPageId = $('#currentPageId').val();
    if (currentPageId && currentPageId.length > 0) {
        $('#' + currentPageId).attr('class', 'now');
    }
    else {
        $('#nav_home').attr('class', 'now');
    }
    var $el, leftPos, newWidth, $mainNav = $("#nav");
    $mainNav.append("<li id='magic-line-two'></li>");
    var $magicLine = $("#magic-line-two");
    $magicLine.width($(".now").width()).height($mainNav.height()).css("left", $(".now a").position().left).data("origLeft", $(".now a").position().left).data("origWidth", $magicLine.width()).data("origColor", $(".now a").attr("rel"));
    $("#nav li").find("a").hover(function(){
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
	loadImage();
});

function addNo(){
	var img="<div id='no'><a href='/'>店小二努力备货中，点此浏览其他商品。</a></div>";
	$('#container').append(img);
}

function loadImage(){
	var jsonFile=$('input[name="json"]');
	if(jsonFile.size()>0){
	$('input[name="json"]').each(function(){
		var jsonPath=$(this).val();
			$.getJSON(jsonPath+"des.json",function(data){
			var hiddenli=$('#hidden_li');
			for(var i=0;i<data.length;i++){
				var coloneli=hiddenli.clone();
				coloneli.find('a[name=leaf]').attr('href',jsonPath+'n/'+data[i].name);
				coloneli.find('img[name=s]').attr('src',jsonPath+'s/'+data[i].name);
				coloneli.find('a[name=download]').attr('href',jsonPath+data[i].name);
				coloneli.find('.image-title').html(data[i].title);
				coloneli.find('.image-desc').html(data[i].des);
				$('#_imgul').append(coloneli);
			}
		});
	});
	$('#_imgul').show();
	setTimeout(function(){$.getScript('./js/galleriffic.js')},500);
	}else{
		if($('#gallery').size()>0){
		addNo();
		}
	}
}
