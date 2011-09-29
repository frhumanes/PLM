<?php use_stylesheet('facturas.css') ?>
<?php slot('title', sprintf('Price-Roch >>>> Facturas %s ', $estado->getName())) ?>
<div class="estado">
  <h1>Facturas en estado <?php echo $estado ?></h1>
</div>
  <?php include_partial('factura/table', array('pr_facturas'=>$estado->getFacturas(), 'objeto'=>$estado)) ?>
  <?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for('facturas', $estado) ?>?page=1">
      <img src="http://www.symfony-project.org/images/first.png"
alt="First page" title="First page" />
    </a>
    <a href="<?php echo url_for('facturas', $estado) ?>?page=<?php echo
$pager->getPreviousPage() ?>">
      <img src="http://www.symfony-project.org/images/previous.png"
alt="Previous page" title="Previous page" />
    </a>
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
         <?php echo $page ?>
      <?php else: ?>
         <a href="<?php echo url_for('facturas', $estado) ?>?page=<?php
echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
     <a href="<?php echo url_for('facturas', $estado) ?>?page=<?php echo
$pager->getNextPage() ?>">
         <img src="http://www.symfony-project.org/images/next.png" alt="Next
page" title="Next page" />
     </a>
     <a href="<?php echo url_for('facturas', $estado) ?>?page=<?php echo
$pager->getLastPage() ?>">
         <img src="http://www.symfony-project.org/images/last.png" alt="Last
page" title="Last page" />
     </a>
  </div>
<?php endif; ?>
<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> facturas en este estado
  <?php if ($pager->haveToPaginate()): ?>
     - página <strong><?php echo $pager->getPage() ?>/<?php echo
$pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>

  

<div style="padding: 20px 0">
    <a href="<?php echo url_for('factura/index') ?>">Volver a la lista</a>
</div>
