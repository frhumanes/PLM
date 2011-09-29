<ul id="proyectos objetos">
   <?php foreach ($pr_proyectos as $pr_proyecto): ?>
    <li class="objeto">
        <div class="encabezado">
            <a href="<?php echo url_for('proyecto/show?id='.$pr_proyecto->getId()) ?>"><div class="codigo"><?php echo $pr_proyecto->getCodigo() ?></div> - <div class="titulo"><?php echo $pr_proyecto->getName() ?></div> </a>
        </div>
        <div class="cuerpo"></div>
        <div class="pie">
            <div class="cliente"><?php echo $pr_proyecto->getNombreCliente() ?> (<?php echo $pr_proyecto->getPedido() ?>)</div>
            <div class="responsable"> - <?php echo $pr_proyecto->getResponsable() ?></div>
        </div>
    </li>
    <?php endforeach; ?>
</ul>


