<h1>Listado de Facturas</h1>
<script type="text/javascript">
	$(function() {
		$("#estados").accordion({
			event: "mouseover"
		});
        $("#clientes").accordion({
			event: "mouseover"
		});
         $("#meses").accordion({
			event: "mouseover"
		});

		$("#tabs").tabs();

	});
	</script>
<br />

<div id="tabs">
    <ul>
        <li><a href="#estados">Por Estado</a></li>
        <li><a href="#clientes">Por Clientes</a></li>
        <li><a href="#meses">Por Meses</a></li>
    </ul>
    <div id="estados">
    <?php foreach ($estado_facturas as $estado):?>
      <?php $count = $estado->countFacturas() ?>
          <?php if (($count > 0)): ?>
          <h3><?php echo link_to($estado->getName().' ('.$count.')', 'facturas', $estado) ?></h3>
          <div class="estado">
          <?php include_partial('factura/list', array('estado'=>$estado, 'pr_facturas'=>$estado->getFacturas(sfConfig::get('app_max_facturas_on_homepage')))) ?>
            <?php if (($count -
                   sfConfig::get('app_max_facturas_on_homepage')) > 0): ?>
              <div class="more">
                <?php echo link_to('ver todas', 'facturas', $estado) ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
    <?php endforeach; ?>
    </div>

    <div id="clientes">
    <?php foreach ($cliente_facturas as $cliente):?>
      <?php $count = $cliente->countFacturas() ?>
          <?php if (($count > 0)): ?>
          <h3><?php echo link_to($cliente->getName().' ('.$count.')', 'clientes', $cliente) ?></h3>
          <div class="cliente">
          <?php include_partial('factura/list', array('estado'=>$cliente, 'pr_facturas'=>$cliente->getFacturas(sfConfig::get('app_max_facturas_on_homepage')))) ?>
            <?php if (($count -
                   sfConfig::get('app_max_facturas_on_homepage')) > 0): ?>
              <div class="more">
                <?php echo link_to('ver todas', 'clientes', $cliente) ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
    <?php endforeach; ?>
    </div>
    
    
    <div id="meses">
    <?php foreach ($meses_facturas as $mes):?>
      <?php $count = $mes->countFacturas() ?>
      <?php if (($count > 0)): ?>
      <h3><?php echo link_to($mes->getMonth().'-'.$mes->getYear().' ('.$count.')', 'meses', $mes) ?></h3>
      <div class="mes">
      <?php include_partial('factura/list', array('estado'=>$mes, 'pr_facturas'=>$mes->getFacturas(sfConfig::get('app_max_facturas_on_homepage')))) ?>
        <?php if (($count -
               sfConfig::get('app_max_facturas_on_homepage')) > 0): ?>
               <div class="more">
                <?php echo link_to('ver todas', 'meses', $mes) ?>
              </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <?php endforeach; ?>
    </div>
</div>
