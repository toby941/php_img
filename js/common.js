$(document).ready(function(){
    $("ul#topnav li").hover(function(){ //Hover over event on list item
        $(this).css({
            'background': '#1376c9 url(topnav_active.gif) repeat-x'
        }); //Add background color + image on hovered list item
        $(this).find("span").show(); //Show the subnav
    }, function(){ //on hover out...
        $(this).css({
            'background': 'none'
        }); //Ditch the background
        $(this).find("span").hide(); //Hide the subnav
    });
	
    
    loadImage();
});

function addNo(){
    var img = "<div id='no'><a href='/'>店小二努力备货中，点此浏览其他商品。</a></div>";
    $('#container').append(img);
}

function loadImage(){
    var jsonFile = $('input[name="json"]');
    if (jsonFile.size() > 0) {
        $('input[name="json"]').each(function(){
            var jsonPath = $(this).val();
            $.getJSON(jsonPath + "des.json", function(data){
                var hiddenli = $('#hidden_li');
                for (var i = 0; i < data.length; i++) {
                    var coloneli = hiddenli.clone();
                    coloneli.find('a[name=leaf]').attr('href', jsonPath + 'n/' + data[i].name);
                    coloneli.find('img[name=s]').attr('src', jsonPath + 's/' + data[i].name);
                    coloneli.find('a[name=download]').attr('href', jsonPath + data[i].name);
                    coloneli.find('.image-title').html(data[i].title);
                    coloneli.find('.image-desc').html(data[i].des);
                    $('#_imgul').append(coloneli);
                }
            });
        });
        $('#_imgul').show();
        setTimeout(function(){
            $.getScript('./js/galleriffic.js')
        }, 500);
    }
    else {
        if ($('#gallery').size() > 0) {
            addNo();
        }
    }
}
