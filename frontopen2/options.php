<?php

/*@support tpl_options*/
!defined('EMLOG_ROOT') && exit('access deined!');
$options = array(
	    'opentime' => array(
		'type' => 'text',
		'name' => '博客开始建站时间',
		'default' => '2011-01-01',
	),
	 'logoz' => array(
	    'type' => 'radio',
		'name' => 'LOGO样式',
		'values' => array(
			'yes' => '图片',
			'no' => '文字',
		),
		'default' => 'yes',
	),
	    'logo' => array(
        'type' => 'image',
        'name' => '头部LOGO',
        'values' => array(
            TEMPLATE_URL . 'images/logo.gif',
        ),
		'description' => '设置站点头部LOGO,439X80最佳。',
    ),
        'picmod' => array(
	    'type' => 'radio',
		'name' => '博客模式',
		'values' => array(
			'1' => '列表',
			'2' => '图片',
			'3' => 'CMS',

		),
		'default' => '1',
	),
		'speed' => array(
		'type' => 'text',
		'name' => 'loading条加载速度',
		'description' => '必须是整数，单位为毫秒。 （1秒=1000毫秒）',
		'default' => '350',
	 ),
	  'page_width' => array(
		'type' => 'text',
		'name' => '页面宽度限制',
		'description' => '设置页面宽度后，PC页面会按照您设定宽度展现页面。强烈建议禁用自动摘要后配合此功能调整页面。（请填入整数，并且宽度设置小于960会出错！）',
		'default' => '',
	 ),
	 	'dis_num' => array(
		'type' => 'text',
		'name' => '自动摘要字符数',
		'description' => '请根据需要输入整数以控制首页摘要的字符数量',
		'default' => '490',
	),
	 'sortKeywords' => array(
		'type' => 'text',
		'name' => '分类关键词设置',
		'description' => '多个关键词之间用半角逗号隔开',
		'depend' => 'sort',
		'default' => '设置关键词，请不要留空',
	),
	    'menu' => array(
	    'type' => 'radio',
		'name' => '导航菜单跟随屏幕滚动',
		'values' => array(
			'yes' => '启用',
			'no' => '禁用',
		),
		'default' => 'yes',
	),
	    'focus_img' => array(
	    'type' => 'radio',
		'name' => '首页幻灯片',
		'values' => array(
			'yes' => '显示',
			'no' => '隐藏',
		),
		'default' => 'no',
	),
        'tools' => array(
	    'type' => 'radio',
		'name' => '顶部工具条',
		'values' => array(
			'yes' => '显示',
			'no' => '隐藏',
		),
		'default' => 'no',
	),
	'dtg' => array(
		'type' => 'checkbox',
		'name' => '右边订阅/投稿/公告',
		'values' => array(
			'dingyue' => '订阅',
			'tougao' => '投稿',
			'gonggao' => '公告',
				),
		'default' => array(
			'dingyue',
		),
	),
		
		'qqding' => array(
		'type' => 'text',
		'name' => 'QQ订阅key:',
		'description' => '可以让用户通过自己的邮箱订阅站点的更新内容，需要至腾讯list邮箱中注册key',
		'default' => '6cc1b4027b8f00ba69667a56983cfc5f7ecccad225dbe800',
	),
	
	'stool' => array(
		'type' => 'checkbox',
		'name' => '左边大事记/关于/联系站长/其他',
		'values' => array(
			'dashiji' => '大事记',
			'about' => '关于',
			'contact' => '联系站长',
			'other' => '其他',
				),
		'default' => array(
			'dashiji',
		),
	),
		'dashiji' => array(
		'type' => 'text',
		'name' => '大事记',
		'description' => '在页面管理新建一个大事记页面，地址填写到这里',
		'default' => 'http://127.0.0.1/dashiji.html',
	),
		'about' => array(
		'type' => 'text',
		'name' => '关于',
		'description' => '在页面管理新建一个大事记页面，地址填写到这里',
		'default' => 'http://127.0.0.1/about.html',
	),
	    'contact' => array(
		'type' => 'text',
		'name' => '联系站长',
		'description' => '在页面管理新建一个大事记页面，地址填写到这里',
		'default' => 'http://127.0.0.1/contact.html',
	),
		'other' => array(
		'type' => 'text',
		'name' => '其他',
		'description' => '在页面管理新建一个大事记页面，地址填写到这里',
		'default' => 'http://127.0.0.1/other.html',
	),
		'listgongg' => array(
		'type' => 'radio',
		'name' => '首页列表上面的公告',
		'values' => array(
			'yes' => '显示',
			'no' => '隐藏'
		),
		'default' => 'no',
	),
		'ggnum' => array(
		'type' => 'text',
		'name' => '允许顶置数目',
		'description' => '友情提示，最好不要太多哦',
		'default' => '2',
	),
		'listimg' => array(
		'type' => 'radio',
		'name' => '是否列表缩略图',
		'values' => array(
			'yes' => '是',
			'no' => '否'
		),
		'default' => 'no',
	),
	    'dengru' => array(
		'type' => 'radio',
		'name' => '是否显示登录功能',
		'values' => array(
			'yes' => '显示',
			'no' => '隐藏'
		),
		'default' => 'no',
	),
	   'reg' => array(
	    'type' => 'radio',
		'name' => '注册地址',
		'description' => '需要注册插件支持',
		'values' => array(
			'yes' => '显示',
			'no' => '隐藏',
		),
		'default' => 'no',
	),
	'links' => array(
		'type' => 'checkbox',
		'name' => '友链显示位置',
		'values' => array(
			'index' => '首页',
			'list' => '各个列表页',
			'page' => '自建页面',
		),
		'default' => array(
			'index',
		),
	),
		'guanggao' => array(
		'type' => 'text',
		'name' => '页面右侧广告位',
		'description' => '建议是矩形广告',
		'multi' => true,
		'default' => '<li id="text-2" class="widget-container widget_text"><div class="textwidget"><div class="d3_btn"> <a class="down_theme" href="http://flyercn.com"><p>Frontopen Theme 2 主题下载</p> </a></div><div class="cls"></div></div></li>',
	),
	 'guanggaos' => array(
		'type' => 'text',
		'name' => '页面相关阅读上方广告位',
		'description' => '建议为横幅广告',
		'multi' => true,
		'default' => '',
	),
		'mobile_ad' => array(
		'type' => 'text',
		'name' => '页面相关阅读上方广告位',
		'description' => '建议为移动版广告',
		'multi' => true,
		'default' => '',
	),
	    'bdshare' => array(
		'type' => 'radio',
		'name' => '内页分享条',
		'values' => array(
			'yes' => '显示',
			'no' => '隐藏'
		),
		'default' => 'no',
	),
		'ganxq' => array(
	    'type' => 'radio',
		'name' => '您可能还会对这些文章感兴趣！',
		'values' => array(
			'yes' => '相关日记',
			'no' => '随机热门日记',
		),
		'default' => 'no',
	),
	'jzeng' => array(
	    'type' => 'radio',
		'name' => '文章内容显示捐赠',
		'values' => array(
			'yes' => '显示',
			'no' => '隐藏',
		),
		'default' => 'no',
	),
	   'j_zeng' => array(
		'type' => 'text',
		'name' => '收款地址',
		'description' => '如果没有收款地址请点击这里开通http://help.alipay.com/lab/help_detail.htm?help_id=440229',
		'default' => '',
	 ),
	 	'timer' => array(
	    'type' => 'radio',
		'name' => '页面加载耗时',
		'values' => array(
			'yes' => '显示',
			'no' => '隐藏',
		),
		'default' => 'no',
	),
		'banquan' => array(
	    'type' => 'radio',
		'name' => '主题版权信息链接开关',
		'description' => '如果您确实出于SEO需要，减少权重流失。可以点此关掉主题右下角版权信息的超链接，只显示版权文字信息。(此超链接只会在首页显示，内页只显示版权文字)',
		'values' => array(
			'yes' => '启用',
			'no' => '禁用',
		),
		'default' => 'yes',
	),
	);