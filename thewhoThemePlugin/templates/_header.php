<?php echo get_component('default', 'updateCheck') ?>

<?php echo get_component('default', 'privacyMessage') ?>

<?php if ($sf_user->isAdministrator() && (string)QubitSetting::getByName('siteBaseUrl') === ''): ?>
  <div class="site-warning">
    <?php echo link_to(__('Please configure your site base URL'), 'settings/siteInformation', array('rel' => 'home', 'title' => __('Home'))) ?>
  </div>
<?php endif; ?>

<header id="top-bar">
<?php
$ArrLogos = ["whologo_1.gif","whologo_2.gif","whologo_3.gif"];
$nr = mt_rand(1,3);
?>

<a id="logo" rel="home" href="/" title="">Swiss<img alt="Swiss The Who Archive" src="<?php echo '/plugins/thewhoThemePlugin/images/'.$ArrLogos[$nr-1]; ?>">Archive</a>

  <nav>

    <?php echo get_component('menu', 'userMenu') ?>

    <?php echo get_component('menu', 'quickLinksMenu') ?>

    <?php if (sfConfig::get('app_toggleLanguageMenu')): ?>
      <?php echo get_component('menu', 'changeLanguageMenu') ?>
    <?php endif; ?>

    <?php echo get_component('menu', 'clipboardMenu') ?>

    <?php echo get_component('menu', 'mainMenu', array('sf_cache_key' => $sf_user->getCulture().$sf_user->getUserID())) ?>

  </nav>

  <div id="search-bar">

    <?php echo get_component('menu', 'browseMenu', array('sf_cache_key' => $sf_user->getCulture().$sf_user->getUserID())) ?>

    <?php echo get_component('search', 'box') ?>

  </div>

  <?php echo get_component_slot('header') ?>

</header>

<?php if (sfConfig::get('app_toggleDescription')): ?>
  <div id="site-slogan">
    <div class="container">
      <div class="row">
        <div class="span12">
          <span><?php echo esc_specialchars(sfConfig::get('app_siteDescription')) ?></span>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
