<?php
require ("include.php");
function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

?>


<div id="comments">
<h3 class="comments">
	10 条评论 到 “Bitcoin P2P 货币：有史以来最危险的项目”</h3>
<ol class="commentlist">
<?php

$con = mysql_connect("localhost", "root", "root");
if (!$con) {
	die('Could not connect: ' . mysql_error());
} else {
	mysql_query("SET NAMES 'utf8'");
	mysql_select_db("mysql", $con);
	$result = mysql_query("SELECT * FROM COMMENT order by add_date");

	while ($row = mysql_fetch_array($result)) {
		$homepage=$row['site'];
?>
	<li class="comment" >
				<div class="comment-body" >
			<div class="comment-author fix vcard">
			<img width="48" height="48" class="avatar avatar-48 photo" src="<?PHP echo get_gravatar($row['email']) ?>" alt="<?php echo $row['email'] ?>">				
			<div class="comment-author-link">
			<cite class="fn">
			<?php if($homepage){
				$homepage=strpos($homepage,"http://")?$homepage:"http://".$homepage;
			?>
			<a class="url" rel="external nofollow" href="<?php echo $homepage ?>">
			<?php echo $row['name'] ?>
			</a>
			<?php
			}else{
			echo $row['name'];
			}
			?>
			</cite> <span class="says">说：</span>				</div>
				<div class="comment-meta commentmetadata">
				<?php echo $row['add_date'] ?>	
				</div>
			</div>
			<p><?php echo $row['comment'] ?></p>
			</div>
	</li>
<?php		
	}
}
mysql_close($con);
?>
</ol>
	<div id="respond">
				<h3 id="reply-title">回复
				</h3>
				<form id="commentform" method="post" action="/comments-post.php">
																			<span></span>							
					<p>
						<label class="fancy" for="author">姓名</label>
						<input type="text" tabindex="1" size="28" value="" class="textarea" id="author" name="author">（必须）
					</p>

					<p>
						<label class="fancy" for="email">电子邮件</label>
						<input type="text" class="textarea" tabindex="2" size="28" value="" id="email" name="email">（必须）
					</p>

					<p>
						<label class="fancy" for="url">网址</label>
						<input type="text" class="textarea" tabindex="3" size="28" value="" id="url" name="url">
					</p>
												
					<p>
						<label class="textarea  fancy" for="comment">您的评论</label>
						<textarea class="textarea" tabindex="4" rows="10" cols="60" id="comment" name="comment"></textarea>
					</p>					
							<p class="form-submit">
							<input type="submit" value="提交评论" id="submit" name="submit">
							<input type="hidden" id="comment_post_ID" value="24387" name="comment_post_ID">
<input type="hidden" value="0" id="comment_parent" name="comment_parent">
						</p>
						</form>
							</div>

<?php


require ("footer.php");
?>