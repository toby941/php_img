<?php
require("include.php");
?>
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
						<a href="#toggleCaption" class="off" title="Show Caption">详细介绍</a>
					</div>
				</div>
				<div id="thumbs" class="navigation">
					<ul class="thumbs noscript" id="_imgul" >
					</ul>
				</div>
				<div style="clear: both;"></div>
			
	
		<div id="hidden_div" style="display:none;">
			<li id="hidden_li">
				<a title="Title #0"  name="leaf" class="thumb">
				<img alt="Title #0" src="" name="s"/>
				</a>
				<div class="caption">
					<div class="download">
					<a name="download" href="" target="_blank">Download Original</a>
					</div>
					<div class="image-title"></div>
					<div class="image-desc"></div>
				</div>
			</li>
		</div>
		<!-- -->
	</div>
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
				coloneli.find('a[name=download]').attr('href',jsonPath+data[i].name);
				coloneli.find('.image-title').html(data[i].title);
				coloneli.find('.image-desc').html(data[i].des);
				$('#_imgul').append(coloneli);
			}
		});
	});
			$('#_imgul').show();
			setTimeout(function(){$.getScript('./js/galleriffic.js')},500);


});
</script>
<?php
require("footer.php");
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
<input type="hidden" id="currentPageId" value="nav_session_hot"/>