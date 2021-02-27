<?php decorate_with('layout_thewhohome') ?>

<?php slot('browseby_thewho') ?>
  <section id="browse_by_homepage">
    <p><b><?php echo __('Browse by') ?>:</b></p>
    <?php $browseMenu = QubitMenu::getById(QubitMenu::BROWSE_ID) ?>
    <?php if ($browseMenu->hasChildren()): ?>
      <?php foreach ($browseMenu->getChildren() as $item): ?>

        <?php $u = url_for($item->getPath(array('getUrl' => true, 'resolveAlias' => true))); ?>

        <p>
          <a href="<?php echo $u; ?>"><?php echo esc_specialchars($item->getLabel(array('cultureFallback' => true))) ?></a>
        </p>

        <?php 
        if (stripos($u, '/35')) { 
          echo get_component('term', 'treeView', array('resource' => QubitTaxonomy::getById(QubitTaxonomy::SUBJECT_ID)));
        } 
        ?>


      <?php endforeach; ?>
    <?php endif; ?>
  </section>
<?php end_slot() ?>

<?php slot('title') ?>
  <h1><?php echo render_title($resource->getTitle(array('cultureFallback' => true))) ?></h1>
<?php end_slot() ?>



<?php slot('sidebar') ?>
  <?php echo get_component('menu', 'staticPagesMenu') ?>
  <?php include_slot('browseby_thewho') ?>
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
