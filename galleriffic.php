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
				<h1><a href="">Galleriffic</a></h1>
			 <div class="nav-wrap">

        <ul class="group" id="example-two">
            <li><a rel="#fe4902" href="#">Home</a></li>
            <li><a rel="rgba(50,69,12,0.9)" href="#">Buy Tickets</a></li>
            <li><a rel="rgba(113,116,0,0.9)" href="#">Group Sales</a></li>
            <li class="now"><a rel="rgba(220,133,5,0.9)" href="#">Reviews</a></li>
            <li><a rel="rgba(236,85,25,0.9)" href="#">The Show</a></li>
            <li><a rel="rgba(190,40,5,0.9)" href="#">Videos</a></li>
            <li><a rel="rgba(123,91,230,0.9)" href="#">Photos</a></li>
            <li><a rel="rgba(255,255,255,0.4)" href="#">Magic Shop</a></li>
        </ul>

    </div>
				<h2>Insert and remove images after initialization</h2>
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
 error_reporting(E_ALL^E_NOTICE^E_WARNING);
function emptyDir($directory) {
	$handle = opendir($directory);

	while (($file = readdir($handle)) !== false) {
		if ($file != "." && $file != ".." && $file != "s" && $file != "des.xml" && $file != "l" && $file != "des.json") {
			if (is_dir($directory . "/" . $file)) {
				emptyDir($directory . "/" . $file);
			} else {
				echo "<li>" .
				'<a class="thumb" name="leaf" href="./' . $directory . '/' . $file . '" title="Title #0">' .
				'<img src="./' . $directory . '/s/' . $file . '" alt="Title #0" />' .
				'</a><div class="caption"><div class="download">' .
				'<a href="./' . $directory . '/' . $file . '" >Download Original</a></div>' .
				'<div class="image-title">Title #0</div>' .
				'<div class="image-desc">Description</div>' .
				'</div></li>';
			}
			//			if ($file) {
			//				closedir($handle);
			//				return false;
			//			}
		}
	}
	closedir($handle);
	//return true;
}
function getItem($directory, $file, $title, $description) {
	$normalImg = $directory . '/' . $file;
	$smallImg = $directory . '/s/' . $file;
	$largeImg = $directory . '/l/' . $file;
}

define("ITEM_HTML", "<li><a title='#title' href='#n' name='leaf' class='thumb'><img alt='#title' src='#s'></a><div class='caption'><div class='download'><a href='#l'>Download Original</a></div><div class='image-title'>#title</div><div class='image-desc'>#des</div></div></li>");

function xml_to_json($source) {
	if (is_file($source)) { //传的是文件，还是xml的string的判断
		$xml_array = simplexml_load_file($source);
	} else {
		$xml_array = simplexml_load_string($source);
	}
	$json = json_encode($xml_array); //php5，以及以上，如果是更早版本，請下載JSON.php
	return $json;
}
function json_out($source) {
	foreach ($source as $key => $value) {
		$newData[$key] = urlencode($value);
		echo $value->name;
	}
	echo urldecode(json_encode($newData));

}
echo json_out(file('http://127.0.0.1:8080/photo/images/20110401/des.json'));
?>
				<div id="thumbs" class="navigation">
					<ul class="thumbs noscript" id="_imgul" >
						<?php
emptyDir("images");
?>
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


<script type="text/javascript" src="js/galleriffic.js"></script>
<!--
<script type="text/javascript" src="http://127.0.0.1:8080/photo/images/20110401/des.json"></script>
-->
	</body>
</html>