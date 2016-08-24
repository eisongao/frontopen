<?php 
/**
 * 微语部分
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="container"><div id="content" role="main" style="width:96%"><div class="mbx"><i class="icon-home icon-large" style="font-size:14px;"></i>&nbsp;<a href="<?php echo BLOG_URL; ?>" class="gray">首页</a>&nbsp;&gt; 微语&nbsp;</div>
<div class=" post type-post">
<div class="comment-list clearfix">
    <?php 
    foreach($tws as $val):
    $author = $user_cache[$val['author']]['name'];
    $avatar = empty($user_cache[$val['author']]['avatar']) ? 
                BLOG_URL . 'admin/views/images/avatar.jpg' : 
                BLOG_URL . $user_cache[$val['author']]['avatar'];
    $tid = (int)$val['id'];
    $img = empty($val['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank"><img style="border: 1px solid #EFEFEF;" src="'.BLOG_URL.$val['img'].'"/></a><br/>';
    ?> 
   <div class="comment clearfix" id="comment-9">
		<div class="avatar">
			<img alt='' src='<?php echo $avatar; ?>' class='avatar avatar-40 photo avatar-default' height='40' width='40' />
            </div>	
            <div class="comment-info">
                <div class="comment-usrinfo"><?php echo $author; ?> <span class="says">说：</span></div>
				<div class="comment-content"><?php echo $img?><?php echo $val['t'];?></div>
				<div class="comment-time"><?php echo $val['date']; ?>
                <div id="comment-reply"><a href="javascript:loadr('<?php echo DYNAMIC_BLOGURL; ?>?action=getr&tid=<?php echo $tid;?>','<?php echo $tid;?>');">回复</a></div></div>
    <ul id="r_<?php echo $tid;?>" class="r"></ul>
     <?php if ($istreply == 'y'):?>
    <div class="addcomment">
    <div class="huifu" id="rp_<?php echo $tid;?>">
    <div class="comt">
			<div class="comt-box">
	<textarea  placeholder="其实，你的评论很给力！" class="input-block-level comt-area rtext" name="comment" id="rtext_<?php echo $tid; ?>" cols="100%" rows="3" tabindex="1"></textarea>
    </div></div>
   <div class="comt-comterinfo" id="comment-author-info" style="display:<?php if(ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER){echo 'none';}?>">
						<ul>
        <li class="form-inline"><label class="hide" for="author">昵称</label><input type="text" id="rname_<?php echo $tid; ?>" value="" class="ipt"/><span class="text-muted">昵称</span></li>
        <span style="display:<?php if($reply_code == 'n'){echo 'none';}?>">验证码：<input type="text" id="rcode_<?php echo $tid; ?>" value="" /><?php echo $rcode; ?></span>
        </ul>      
        </div>
         <button class="button" type="button" onclick="reply('<?php echo DYNAMIC_BLOGURL; ?>index.php?action=reply',<?php echo $tid;?>);" value="回复" /> 回复</button>
        <div class="msg"><span id="rmsg_<?php echo $tid; ?>" style="color:#FF0000"></span></div>
    </div>
    </div>
    <?php endif;?>
	</div>
    </div>
    <?php endforeach;?>
<div class="page_num"><?php echo $pageurl;?></div>
</div>		</div>
		</div>

</div>
<?php
 include View::getView('side');
 include View::getView('footer');
?>