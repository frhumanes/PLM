<?php use_stylesheet('facturas.css') ?>
<?php slot('title', sprintf('Price-Roch >>>> Facturas de %s ', $cliente->getName())) ?>
<div class="estado">
  <h1>Facturas asociadas a <?php echo $cliente ?></h1>
</div>
  <?php include_partial('factura/table', array('pr_facturas'=>$cliente->getFacturas(), 'objeto'=>$cliente)) ?>
  <?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for('clientes', $cliente) ?>?page=1">
      <img src="http://localhost/images/first.png"
alt="First page" title="First page" />
    </a>
    <a href="<?php echo url_for('clientes', $cliente) ?>?page=<?php echo
$pager->getPreviousPage() ?>">
      <img src="http://localhost/images/previous.png"
alt="Previous page" title="Previous page" />
    </a>
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
         <?php echo $page ?>
      <?php else: ?>
         <a href="<?php echo url_for('clientes', $cliente) ?>?page=<?php
echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
     <a href="<?php echo url_for('clientes', $cliente) ?>?page=<?php echo
$pager->getNextPage() ?>">
         <img src="http://localhost/images/next.png" alt="Next
page" title="Next page" />
     </a>
     <a href="<?php echo url_for('clientes', $cliente) ?>?page=<?php echo
$pager->getLastPage() ?>">
         <img src="http://localhost/images/last.png" alt="Last
page" title="Last page" />
     </a>
  </div>
<?php endif; ?>
<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> facturas de este cliente
  <?php if ($pager->haveToPaginate()): ?>
     - página <strong><?php echo $pager->getPage() ?>/<?php echo
$pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>

  

<div style="padding: 20px 0">
    <a href="<?php echo url_for('factura/index') ?>">Volver a la lista</a>
</div>