<footer>
   <div>
     <p>This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License</a>. | Contact: <a href="mailto:roger.rutishauser@docuteam.ch">roger.rutishauser@docuteam.ch</a></p>
   </div>

  <?php if (QubitAcl::check('userInterface', 'translate')): ?>
    <?php echo get_component('sfTranslatePlugin', 'translate') ?>
  <?php endif; ?>

  <?php echo get_component_slot('footer') ?>

  <div id="print-date">
    <?php echo __('Printed: %d%', array('%d%' => date('Y-m-d'))) ?>
  </div>

</footer>



<?php $gaKey = sfConfig::get('app_google_analytics_api_key', '') ?>
<?php if (!empty($gaKey)): ?>
  <script>
    window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
    ga('create', '<?php echo $gaKey ?>', 'auto');
    <?php include_slot('google_analytics') ?>
    ga('send', 'pageview');
  </script>
  <script async src='https://www.google-analytics.com/analytics.js'></script>
<?php endif; ?>
