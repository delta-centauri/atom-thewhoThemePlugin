<?php decorate_with('layout_thewhohome') ?>

<?php slot('browseby_thewho') ?>
  <section id="browse_by_homepage">
    <b><?php echo __('Browse by') ?>:&nbsp;&nbsp;</b>
    <?php $browseMenu = QubitMenu::getById(QubitMenu::BROWSE_ID) ?>
    <?php if ($browseMenu->hasChildren()): ?>
      <?php 
      $counter = 1; 
      $totalcounts = count($browseMenu->getChildren());
      ?>
      <?php foreach ($browseMenu->getChildren() as $item): ?>
        <a href="<?php echo url_for($item->getPath(array('getUrl' => true, 'resolveAlias' => true))) ?>"><?php echo esc_specialchars($item->getLabel(array('cultureFallback' => true))) ?></a><?php if($counter < $totalcounts) { echo '&nbsp;|&nbsp;'; } ?>
        <?php $counter++; ?>
      <?php endforeach; ?>
    <?php endif; ?>
  </section>
<?php end_slot() ?>

<?php slot('title') ?>
  <h1><?php echo render_title($resource->getTitle(array('cultureFallback' => true))) ?></h1>
<?php end_slot() ?>



<?php slot('sidebar') ?>

  <?php include_slot('browseby_thewho') ?>

  <section>
    <?php echo get_component('term', 'treeView', array('resource' => QubitTaxonomy::getById(QubitTaxonomy::SUBJECT_ID))) ?>
  </section>

<?php end_slot() ?>






<div class="page">
  <?php echo render_value_html($sf_data->getRaw('content')) ?>
</div>

<?php if (QubitAcl::check($resource, 'update')) { ?>
  <?php slot('after-content') ?>
    <section class="actions">
      <ul>
        <li><?php echo link_to(__('Edit'), array($resource, 'module' => 'staticpage', 'action' => 'edit'), array('title' => __('Edit this page'), 'class' => 'c-btn')) ?></li>
      </ul>
    </section>
  <?php end_slot() ?>
<?php } ?>
