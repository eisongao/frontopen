<?php 

/**

 * 自建页面模板--用户中心

 */

if(!defined('EMLOG_ROOT')) {exit('error!');}


?>

<section class="container">

	<div class="container-user">

		<?php if( ISLOGIN ){ ?>

		<div class="userside">

			<div class="usertitle">

				<img data-src="<?php echo cache_gravatar($email); ?>" class="avatar avatar-100">

				<h2><?php echo $nickname; ?></h2>

			</div>

			<div class="usermenus">	

				<ul class="usermenu">

					<li class="usermenu-comments"><a href="#comments">我的评论</a></li>

					<li class="usermenu-info"><a href="#info">修改资料</a></li>

					<li class="usermenu-password"><a href="#password">修改密码</a></li>

					<li class="usermenu-signout"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>

				</ul>

			</div>

		</div>

		<div class="content" id="contentframe">

			<div class="user-main"></div>

			<div class="user-tips"></div>

		</div>

		<?php } ?>

	</div>

</section>

<script id="temp-commentitem" type="text/x-jsrender">

	<li>

		<time>{{>time}}</time>

		<p class="note">{{>content}}</p>

		<p class="text-muted">文章：<a target="_blank" href="{{>post_link}}">{{>post_title}}</a></p>

	</li>

</script>

<script id="temp-info" type="text/x-jsrender">

	<form>

	  	<ul class="user-meta">

	  		<li><label>用户名</label>

				<input type="input" class="form-control" disabled value="{{>logname}}">

	  		</li>

	  		<li><label>邮箱</label>

				<input type="email" class="form-control" disabled value="{{>email}}">

	  		</li>

	  		<li><label>昵称</label>

				<input type="input" class="form-control" name="nickname" value="{{>nickname}}">

	  		</li>

	  		<li><label>描述</label>

				<textarea class="form-control" name="description" rows="8">{{>description}}</textarea>

	  		</li>

	  		<li>

				<input type="button" evt="info.submit" class="btn btn-primary" name="submit" value="确认修改资料">

				<input type="hidden" name="action" value="info.edit">

	  		</li>

	  	</ul>

	</form>

</script>



<script id="temp-password" type="text/x-jsrender">

	<form>

	  	<ul class="user-meta">

	  		<li><label>原密码</label>

				<input type="password" class="form-control" name="passwordold">

	  		</li>

	  		<li><label>新密码</label>

				<input type="password" class="form-control" name="password">

	  		</li>

	  		<li><label>重复新密码</label>

				<input type="password" class="form-control" name="password2">

	  		</li>

	  		<li>

				<input type="button" evt="password.submit" class="btn btn-primary" name="submit" value="确认修改密码">

				<input type="hidden" name="action" value="password.edit">

	  		</li>

	  	</ul>

	</form>

</script>



<?php include View::getView('footer');?>