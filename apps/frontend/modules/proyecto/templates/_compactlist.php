<div id="proyectos">
    <table class="proyectos">
      <thead class="encabezado">
        <tr>
          <th>Código</th>
          <th>Título</th>
          <th>Pedido</th>
          <th>Cliente</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($pr_proyectos as $i=>$proyecto): ?>
        <tr class="<?php echo (fmod($i, 2) == 1)?'even':'odd'; ?>">
          <td class="codigo"><a href="<?php echo url_for('proyecto/show?id='.$proyecto->getId()) ?>"><?php echo $proyecto->getCodigo() ?></a></td>
          <td class="titulo"><a href="<?php echo url_for('oferta/show?id='.$proyecto->getOfertaId()) ?>"><?php echo $proyecto->getName() ?></a></td>
          <td class="importe"><?php echo $proyecto->getPedido() ?></td>
          <td class="fecha"><?php echo $proyecto->getNombreCliente() ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</div>
