<?php echo $html->doctype('xhtml-strict') ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php echo $html->charset(); ?>
	
	<title><?php echo $title_for_layout; ?></title>
	
	<meta name="description" content="" />
	
    <link rel="shortcut icon" href="<?php echo $this->webroot; ?>favicon.ico" type="image/x-icon" />
	
	<?php 
        echo
        // Load your CSS files here
        $html->css(array(
            '/wildflower/css/wf.main',
        )),
        // TinyMCE 
        // @TODO load only on pages with editor?
        $javascript->link('/wildflower/js/tiny_mce/tiny_mce');
    ?>
     
    <!--[if lte IE 7]>
    <?php
        // CSS file for Microsoft Internet Explorer 7 and lower
        echo $html->css('/wildflower/css/wf.ie7');
    ?>
    <![endif]-->
    
    <!-- JQuery Light MVC -->
    <script type="text/javascript" src="<?php echo $html->url('/' . Configure::read('Wildflower.prefix') . '/assets/jlm'); ?>"></script>
    <script type="text/javascript">
    //<![CDATA[
        $.jlm.config({
            base: '<?php echo $this->base ?>',
            controller: '<?php echo $this->params['controller'] ?>',
            action: '<?php echo $this->params['action'] ?>', 
            prefix: '<?php echo Configure::read('Wildflower.prefix') ?>',
            custom: {
                wildflowerUploads: '<?php echo Configure::read('Wildflower.uploadsDirectoryName'); ?>'
            }
        });
        
        tinyMCE.init($.jlm.components.tinyMce.getConfig());

        $(function() {
           $.jlm.dispatch(); 
        });
    //]]>
    </script>
    
</head>
<body>
 
<div id="header">
    <h1 id="site_title"><?php echo hsc($siteName); ?></h1>
    <?php echo $html->link('Site index', '/', array('title' => __('Visit ', true)  . FULL_BASE_URL, 'id' => 'site_index')); ?>
    
    <div id="login_info">
        <?php echo $htmla->link(__('Logout', true), array('controller' => 'users', 'action' => 'logout'), array('id' => 'logout')); ?>
    </div>

    <?php 
        echo $navigation->create(array(
            __('Dashboard', true) => '/' . Configure::read('Wildflower.prefix'),
            __('Pages', true) => array('controller' => 'pages'),
            __('Modules', true) => array('controller' => 'sidebars'),
            __('Posts', true) => array('controller' => 'posts'),
            __('Categories', true) => array('controller' => 'categories'),
            __('Comments', true) => array('controller' => 'comments'),
            __('Messages', true) => array('controller' => 'messages'),
            __('Files', true) => array('controller' => 'assets'),
            
            __('Users', true) => array('controller' => 'users'),
            __('Site Settings', true) => array('controller' => 'settings'),
            
        ), array('id' => 'nav'));
    ?>
</div>

<div id="wrap">
    <div id="content">
        <div id="co_bottom_shadow">
        <div id="co_right_shadow">
        <div id="co_right_bottom_corner">
        <div id="content_pad">
            <?php echo $content_for_layout; ?>
        </div>
        </div>
        </div>
        </div>
    </div>
    
    <?php if (isset($sidebar_for_layout)): ?>
    <div id="sidebar">
        <ul>
            <?php echo $sidebar_for_layout; ?>
        </ul>
    </div>
    <?php endif; ?>
        
    <div class="cleaner"></div>
</div>

</body>
</html>
