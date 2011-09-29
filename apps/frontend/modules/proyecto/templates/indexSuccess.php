<h1>Proyectos de Price-Roch</h1>

<?php include_partial('proyecto/list', array('pr_proyectos' => $pager->getResults())) ?>
 <?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for('proyecto') ?>?page=1">
      <img src="http://www.symfony-project.org/images/first.png"
alt="First page" title="First page" />
    </a>
    <a href="<?php echo url_for('proyecto') ?>?page=<?php echo
$pager->getPreviousPage() ?>">
      <img src="http://www.symfony-project.org/images/previous.png"
alt="Previous page" title="Previous page" />
    </a>
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
         <?php echo $page ?>
      <?php else: ?>
         <a href="<?php echo url_for('proyecto') ?>?page=<?php
echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
     <a href="<?php echo url_for('proyecto') ?>?page=<?php echo
$pager->getNextPage() ?>">
         <img src="http://www.symfony-project.org/images/next.png" alt="Next
page" title="Next page" />
     </a>
     <a href="<?php echo url_for('proyecto') ?>?page=<?php echo
$pager->getLastPage() ?>">
         <img src="http://www.symfony-project.org/images/last.png" alt="Last
page" title="Last page" />
     </a>
  </div>
<?php endif; ?>
<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> proyectos
  <?php if ($pager->haveToPaginate()): ?>
     - página <strong><?php echo $pager->getPage() ?>/<?php echo
$pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>
