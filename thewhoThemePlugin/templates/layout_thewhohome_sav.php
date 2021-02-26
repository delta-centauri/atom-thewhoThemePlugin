<!DOCTYPE html>
<?php $maintenance_mode = 1; ?>
<html lang="<?php echo $sf_user->getCulture() ?>" dir="<?php echo sfCultureInfo::getInstance($sf_user->getCulture())->direction ?>">
  <head>
    <?php echo get_component('default', 'tagManager', array('code' => 'script')) ?>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="<?php echo public_path('favicon.ico') ?>"/>
    <?php include_stylesheets() ?>
    <?php include_component_slot('css') ?>
    <?php if ($sf_context->getConfiguration()->isDebug()): ?>
      <script type="text/javascript" charset="utf-8">
        less = { env: 'development', optimize: 0, relativeUrls: true };
      </script>
    <?php endif; ?>
    <?php include_javascripts() ?>
  </head>



<body class="yui-skin-sam <?php echo $sf_context->getModuleName() ?> <?php echo $sf_context->getActionName() ?>">

    <?php echo get_component('default', 'tagManager', array('code' => 'noscript')) ?>

    <?php echo get_partial('header') ?>

    <?php include_slot('pre') ?>

    <div id="wrapper" class="container" role="main">

      <?php echo get_component('default', 'alerts') ?>
<?php if ($maintenance_mode) { ?>
<div>maintenance mode. some parts of the website might currently not be working</div>
<?php } ?>
      <?php include_slot('browseby_thewho') ?>
	  
      <?php include_slot('title') ?>

      <?php include_slot('before-content') ?>

      <?php if (!include_slot('content')): ?>
        
          <?php echo $sf_content ?>
        
      <?php endif; ?>

      <?php include_slot('after-content') ?>

    </div>

    <?php include_slot('post') ?>

    <?php echo get_partial('footer') ?>

  </body>
</html>
