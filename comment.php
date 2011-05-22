<?php
require ("include.php");
function get_gravatar($email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array ()) {
	$url = 'http://www.gravatar.com/avatar/';
	$url .= md5(strtolower(trim($email)));
	$url .= "?s=$s&d=$d&r=$r";
	if ($img) {
		$url = '<img src="' . $url . '"';
		foreach ($atts as $key => $val)
			$url .= ' ' . $key . '="' . $val . '"';
		$url .= ' />';
	}
	return $url;
}
?>
<div id="comments">
<h3 class="comments">
	关于穿什么的需求收集，第34楼送衣服一件</h3>
	<p>请大家随便说说关于自己的日常服装消费，包括喜爱类型，款式，品牌，颜色，用料，购买地方，适宜价格啦。算是做一个小调查，看看大家都需要些什么样的衣服。34楼送服装一件，若是MM送VM T恤一件，GG送JJ的短裤一条。</p>
<ol class="commentlist">
<?php
$con = get_con("localhost", "root", "root");
$result = mysql_query("SELECT * FROM COMMENT where comment_item_id=1 order by add_date");

while ($row = mysql_fetch_array($result)) {
	$homepage = htmlspecialchars($row['site']);
	if ($homepage) {
		$homepage = strpos($homepage, "http://") ? $homepage : "http://" . $homepage;
	}
	$name = htmlspecialchars($row['name']);
	$comment = htmlspecialchars($row['comment']);
	$userEmail = $row['email'];
?>
	<li class="comment" >
				<div class="comment-body" >
			<div class="comment-author fix vcard">
			<img width="48" height="48" class="avatar avatar-48 photo" src="<?PHP echo get_gravatar($userEmail); ?>" alt="<?php echo $userEmail; ?>">				
			<div class="comment-author-link">
			<div class="comment-meta commentmetadata">
				<?php echo $row['add_date'] ?>	
				</div>
			<cite class="fn">
			<?php
	if ($homepage) {
?>
			<a class="url" rel="external nofollow" href="<?php echo $homepage; ?>">
			<?php echo $name; ?>
			</a>
			<?php
	} else {
		echo $name;
	}
?>
			</cite> <span class="says">说：</span></div>
			</div>
			<p><?php echo $comment; ?></p>
			</div>
	</li>
<?php

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
						<input type="text" tabindex="1" size="28" value="" class="textarea" id="author" name="author" maxlength="20">（必须）
					</p>

					<p>
						<label class="fancy" for="email">电子邮件</label>
						<input type="text" class="textarea" tabindex="2" size="28" value="" id="email" name="email" maxlength="30">（必须）
					</p>

					<p>
						<label class="fancy" for="url">网址</label>
						<input type="text" class="textarea" tabindex="3" size="28" value="" id="url" name="url" maxlength="40">
					</p>
												
					<p>
						<label class="textarea  fancy" for="comment">您的评论</label>
						<textarea class="textarea" tabindex="4" rows="10" cols="60" id="comment" name="comment"></textarea>
					</p>					
							<p class="form-submit">
							<input type="hidden"  name="id" value="1"/>
							<input type="submit" value="提交评论" id="submit" name="submit" />
						</p>
						</form>
							</div>
</div>
<?php
require ("footer.php");
?>
<input type="hidden" id="currentPageId" value="nav_man"/>