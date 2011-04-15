<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
		<title>Galleriffic | Insert an image into the gallery after initialization</title>
		<link rel="stylesheet" href="css/basic.css" type="text/css" />
		<link rel="stylesheet" href="css/galleriffic-4.css" type="text/css" />
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.history.js"></script>
		<script type='text/javascript' src='js/jquery.color-RGBa-patch.js'></script>
		<script type="text/javascript" src="js/jquery.galleriffic.js"></script>
		<script type="text/javascript" src="js/jquery.opacityrollover.js"></script>
		<!-- We only want the thunbnails to display when javascript is disabled -->
		<script type="text/javascript">
			document.write('<style>.noscript { display: none; }</style>');
		</script>
	</head>
	<body>
		<div id="page">

			<div id="container">
				<h1><a href="">JackJones杰克琼斯</a></h1>
			 <div class="nav-wrap">

        <ul class="group" id="example-two">
            <li><a rel="#fe4902" href="#">首页</a></li>
            <li><a rel="rgba(50,69,12,0.9)" href="#">当季主打</a></li>
            <li class="now"><a rel="rgba(220,133,5,0.9)" href="#">男装</a></li>
            <li><a rel="rgba(236,85,25,0.9)" href="#">女装</a></li>
            <li><a rel="rgba(190,40,5,0.9)" href="#">配件</a></li>
            <li><a rel="rgba(113,116,0,0.9)" href="#">限时特卖</a></li>
            <li><a rel="rgba(123,91,230,0.9)" href="#">如何购买</a></li>
            <li><a rel="rgba(255,255,255,0.4)" href="#">关于我们</a></li>
        </ul>

    </div>
				<h2>2011 JackJones杰克琼斯 给力男装 优惠特卖</h2>
				<!-- Start Advanced Gallery Html Containers -->
				<div id="gallery" class="content">
					<div id="controls" class="controls"></div>
					<div class="slideshow-container">

						<div id="loading" class="loader"></div>
						<div id="slideshow" class="slideshow"></div>
						<div id="caption" class="caption-container"></div>
					</div>
					<div id="captionToggle">
						<a href="#toggleCaption" class="off" title="Show Caption">Show Caption</a>
					</div>
				</div>
 <?php
 function getHiddenFolder($path){
 	$handle = opendir($path);
 		while (($file = readdir($handle)) !== false) {
 			if ($file != "." && $file != ".."){
 				if (is_dir($path . "/" . $file)) {
 					getHiddenFolder($path . "/" . $file);
 				}
 				if($file == "des.json"){
 					echo '<input type="hidden" name="json" value="'.$path."/".'" />';
 				}
 			}
 			
 		}
 }
?>
				<div id="thumbs" class="navigation">
					<ul class="thumbs noscript" id="_imgul" >
					</ul>
				</div>
				<div style="clear: both;"></div>
			</div>
		</div>
		<div id="footer">&copy; 2011 toby941</div>
	<div id="hidden_div" style="display:none;">
	<li id="hidden_li">
	<a title="Title #0" href="#" name="leaf" class="thumb">
	<img alt="Title #0" src="#" name="s"/>
	</a>
	<div class="caption">
	<div class="download">
	<a href="#">Download Original</a>
	</div>
	<div class="image-title"></div>
	<div class="image-desc"></div>
	</div>
	</li>
	</div>
<?PHP
getHiddenFolder('images/man');
?>


<script type="text/javascript">
$(document).ready(function(){
	$('input[name="json"]').each(function(){
		var jsonPath=$(this).val();
			$.getJSON(jsonPath+"des.json",function(data){
			var hiddenli=$('#hidden_li');
			for(var i=0;i<data.length;i++){
				var coloneli=hiddenli.clone();
				coloneli.find('a[name=leaf]').attr('href',jsonPath+'n/'+data[i].name);
				coloneli.find('img[name=s]').attr('src',jsonPath+'s/'+data[i].name);
				coloneli.find('.image-title').html(data[i].title);
				coloneli.find('.image-desc').html(data[i].des);
				$('#_imgul').append(coloneli);
			}
		});
	});
			$('#_imgul').show();
			$.getScript('./js/galleriffic.js');


});
</script>
	</body>
</html>