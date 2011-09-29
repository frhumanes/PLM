<?php use_helper('Text') ?>
<?php slot(
   'title',
   sprintf('Price-Roch >>>> Oferta %s (%s)', $pr_oferta->getCodigo(),
    $pr_oferta->getNombreCliente()))
?>
<div id="oferta">
    <h1><?php echo $pr_oferta->getCodigo() ?> :: <?php echo $pr_oferta->getNombreEstado() ?>
    <?php if($pr_oferta->getNombreEstado() == 'Adjudicada' && ($pr_proyecto = $pr_oferta->getProyecto())): ?>
        >>>>
        <a href="<?php echo url_for('proyecto/show?id='.$pr_proyecto->getId()); ?>">
            <?php echo $pr_proyecto->getCodigo() ?>
        </a>
    <?php endif; ?>
    </h1>
    <h2><?php echo $pr_oferta->getNombreCliente() ?></h2>
    <h3>
    <?php echo $pr_oferta->getTitulo(); ?>
    <small> - (<?php echo $pr_oferta->getExpediente() ?>)</small>
    </h3>
    <?php if($pr_oferta->haExpirado()): ?>
    <h4 class="aviso">
        Ha expirado el plazo de presentación (<?php echo $pr_oferta->getDateTimeObject('fecha_presentacion')->format('d/m/Y') ?>) de esta oferta. <a href="<?php echo url_for('cambiar_estado',$pr_oferta->setEstado(7)) ?>">Descartar oferta</a>
    </h4>
    <?php elseif($pr_oferta->getEstado() <= 4): ?>
    <h4>
        Fecha límite presentación: <?php echo $pr_oferta->getDateTimeObject('fecha_presentacion')->format('d/m/Y') ?>
    </h4>
   
    <?php endif; ?>
            

    
    <script type="text/javascript">
	$(function() {
		$("#tabs").tabs();
	});
	</script>
    <br />
<div id="tabs">
	<ul id="tabs-bar">
		<li><a href="#tabs-detalles">Detalles</a></li>
        <li><a href="#tabs-valoracion">Valoración</a></li>
		<li><a href="#tabs-costes">Costes</a></li>
		<li><a href="#tabs-balance">Datos económicos</a></li>
        <li><a href="#tabs-acciones">Acciones</a></li>
        <div style="float: right" id="toolbar">
        <?php if($pr_oferta->getEstado() == '1'): ?>
            <a style="float: right"  href="#"  onClick="return confirmacion('<?php echo url_for('cambiar_estado',$pr_oferta->setEstado(2)) ?>');"><?php echo image_tag('mail.png', array('style'=>"border: medium none ; vertical-align: middle;")) ?></a>
            <a style="float: right"  href="<?php echo url_for('oferta/edit?id='.$pr_oferta->getId()) ?>"><?php echo image_tag('edit.png', array('style'=>"border: medium none ; vertical-align: middle;")) ?></a>
            <?php $pr_oferta->setEstado(1) ?>
        <?php endif; ?>

        <?php if($pr_oferta->getEstado() == '2' and $empleado->puedeValidar()): ?>
            <a style="float: right"  href="#"  onClick="return confirmacion('<?php echo url_for('cambiar_estado',$pr_oferta->setEstado(3)) ?>');"><?php echo image_tag('ok.png', array('style'=>"border: medium none ; vertical-align: middle;")) ?></a>
            <?php $pr_oferta->setEstado(2) ?>
        <?php endif; ?>
        <?php if($pr_oferta->getEstado() > '1'): ?>
            <a style="float: right"  href="#"  onClick="window.print(); return false;"><?php echo image_tag('print.png', array('style'=>"border: medium none ; vertical-align: middle;")) ?></a>
        <?php endif; ?>
        <a style="float: right"  href="<?php echo url_for('oferta/index') ?>"><?php echo image_tag('volver.png', array('style'=>"border: medium none ; vertical-align: middle;padding: 0 5px;")) ?></a>
        </div>
	</ul>

    <div id="tabs-detalles">
        <h4>Detalles</h4>
        <table class="detalles">
        <tr>
            <th>Responsable:</th> <td><?php echo $pr_oferta->getResponsable() ?></td>
        </tr>
        <tr>
            <th>Tipo de trabajo:</th> <td><?php echo $pr_oferta->getTipoTrabajo() ?></td>
        </tr>
        <tr>
            <th>Tipo de oferta:</th><td> <?php echo $pr_oferta->getNombreTipo() ?></td>
        </tr>
        <tr>
            <th>Duración de los trabajos:</th><td> <?php echo $pr_oferta->getDuracion() ?> días</td>
        </tr>
        </table>
        <br />
        <h4>Descripción de la oferta</h4>
        <div class="description">
            <?php echo simple_format_text($pr_oferta->getDescripcionOferta()) ?>
        </div>
        <h4>Descripción del pliego</h4>
        <div class="description">
            <?php echo simple_format_text($pr_oferta->getDescripcionPliego()) ?>
        </div>

    </div>
    
    <div id="tabs-valoracion">
        <h4>Sobre la oferta</h4>
        <table class="encuesta">     
        <tr>
            <th>Tiempo estimado para elaborar la oferta:</th> <td><?php echo (string)$pr_oferta->getTiempoElaboracion(); echo ' '.($pr_oferta->getTiempoElaboracion() > 1)?'horas':'hora'; ?></td>
        </tr>
        <tr>
            <th>Tipo de proyecto a realizar:</th> <td><?php echo $pr_oferta->getNuevo()?'Es una ampliación de un pryecto existente':'Es un proyecto nuevo'; ?></td>
        </tr>
        <tr>
            <th>¿Tenemos claro las necesidades de la oferta?</th><td> <?php echo $pr_oferta->getClaridad()?'Sí':'No'; ?></td>
        </tr>
        <tr>
            <th>¿Tenemos experiencia con este tipo de proyecto?</th><td> <?php echo $pr_oferta->getExperiencia()?'Sí':'No'; ?></td>
        </tr>
        <tr>
            <th>¿Podemos aportar valor y experiencia a la oferta?</th><td> <?php echo $pr_oferta->getAportacion()?'Sí':'No'; ?></td>
        </tr>
        <tr>
            <th>¿Hemos sido invitados a la oferta?</th><td> <?php echo $pr_oferta->getInvitados()?'Sí':'No'; ?></td>
        </tr>
        <tr>
            <th>¿Hay elementos condicionantes a tener en cuenta?</th><td> <?php echo $pr_oferta->getCondicionada()?'Sí':'No'; ?></td>
        </tr>
        </table>
        <br />
        <h4>Sobre nuestra Empresa</h4>
        <table class="encuesta">
        
        <tr>
            <th>¿Estamos bien posicionados con el cliente?</th><td> <?php echo $pr_oferta->getPosicionNuestra()?'Sí':'No, '.$pr_oferta->getPorquePosicion(); ?></td>
        </tr>
        <tr>
            <th>¿Está bien posicionada la competencia?</th><td> <?php echo $pr_oferta->getPosicionCompetencia()?'Sí, '.$pr_oferta->getPorqueCompetencia():'No'; ?></td>
        </tr>
        <tr>
            <th>¿Qué empresa es la mejor posicionada?</th><td> <?php echo $pr_oferta->getCompetidor(); ?></td>
        </tr>
        <tr>
            <th>¿Cuál es nuestra posición de ventaja competitiva?<br /><small>(valorada entre 1 y 5)</small></th><td> <?php echo $pr_oferta->getVentaja(); ?></td>
        </tr>
        <tr>
            <th>¿Tenemos posibilidades reales de éxito?</th><td> <?php echo $pr_oferta->getExito()?'Sí, '.$pr_oferta->getPorqueExito():'No'; ?></td>
        </tr>
        </table>
        <br />
        <h4>Sobre el Cliente</h4>
        <table class="encuesta">
        <tr>
            <th>¿Hemos desarrollado otros proyectos con el cliente?</th><td> <?php echo $pr_oferta->getPreviamente()?'Sí':'No, '; ?></td>
        </tr>
        <tr>
            <th>¿Tenemos el contacto técnico del cliente para esta oferta?</th><td> <?php echo $pr_oferta->getEnchufe()?'Sí, '.$pr_oferta->getContacto():'No'; ?></td>
        </tr>
        <tr>
            <th>¿Cuál es nuestra imagen frente al cliente?<br /><small>(valorada entre 1 y 5)</small></th><td> <?php echo $pr_oferta->getImagen(); ?></td>
        </tr>
        </table>
    </div>
    <div id="tabs-costes">
        <h4>Gastos previstos</h4>
         <table class="costes">
         <thead class="encabezado">
            <tr>
              <th>Tipo:</th>
              <th>Concepto:</th>
              <th>Porcentaje:</th>
              <th>Importe:</th>
            </tr>
        </thead>
        <tbody>
         <tr class="odd">
           <td class="estado">Financiación</td>
           <td class="titulo">Interes asociado a la finaciación de los costes</td>
           <td class="fecha"><?php echo $pr_oferta->getFinanciacion().'%' ?></td>
           <td class="importe"><?php echo number_format($pr_oferta->getCosteFinanciacion(), 2, ',', '.'); ?>€</td>
            </tr>
          <tr class="even">
           <td class="estado">Estructura</td>
           <td class="titulo">Porcentaje respecto al importe de la oferta</td>
           <td class="fecha"><?php echo $pr_oferta->getEstructura().'%' ?></td>
           <td class="importe"><?php echo number_format($pr_oferta->getCosteEstructura(), 2, ',', '.'); ?>€</td>
           </tr>
            <?php foreach($pr_oferta->getCostes() as $i=>$coste):?>
            <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
                   <td class="estado"><?php echo $coste->getNombreTipo() ?></td>
                   <td class="titulo"><?php echo $coste->getConcepto() ?></td>
                   <td class="fecha"><?php echo (($coste->getNombreTipo()=='Personal')?$coste->getDedicacion().'%':'N/A') ?></td>
                   <td class="importe"><?php echo number_format($coste->getImporte(), 2, ',', '.')?>€</td>
            </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot class="pie">
            <tr>
              <th></th>
              <th></th>
              <th>Gastos totales:</th>
              <th class="total_gastos"><?php echo number_format($pr_oferta->getCosteFinal(), 2, ',', '.') ?>&#8364;</th>
            </tr>
        </tfoot>
        </table>
    </div>

    <div id="tabs-balance">
        <h4>Balance económico</h4>
        <table class="balance">
            <?php if($pr_oferta->getTipoOferta() != 'Privada'): ?>
            <tr>
            <th>Base licitación:</th>
              <td><?php echo number_format($pr_oferta->getBaseLicitacion(), 2, ',', '.') ?>€</td>
            </tr>
            <tr>
            <th>Descuento aplicado:</th>
            <td><?php echo $pr_oferta->getDescuento() ?>%</td>
            </tr>
            <tr>
            <th>Fianza Provisional:</th>
            <td><?php echo $pr_oferta->getFianzaProvisional() ?>€</td>
            </tr>
            <?php endif; ?>
            <tr>
            <th>Importe de la oferta:</th>
            <td><?php echo number_format($pr_oferta->getImporteOferta(), 2, ',', '.') ?>€</td>
              
            </tr>
            <tr>
            <th>Margen de beneficio:</th>
              <td><?php echo number_format($pr_oferta->getMargen(), 2, ',', '.') ?>€</td>
            </tr>
            <tr>
              <th>Rentabilidad:</th>
              <td><?php echo number_format($pr_oferta->getRentabilidad(), 2, ',', '.') ?>%</td>
            </tr>
        </table>
        <h4>Planificación</h4>
        <table class="facturacion">
        <tr>
            <th>Modelo de facturación:</th> <td><?php echo $pr_oferta->getTipoFacturacion() ?></td>
        </tr>
        <?php if($pr_oferta->getTipoFacturacion() == 'Certificación mensual'){ ?>
            <?php $periodo = ($pr_oferta->getDuracion()<30)?$pr_oferta->getDuracion():30 ?>
            <tr>
                <th>Importe estimado por periodo de facturación :</th><td> <?php echo number_format($pr_oferta->getImporteOferta()*$periodo/$pr_oferta->getDuracion(), 2, ',', '.'); ?>€</td>
            </tr>
            </tr>
                <th>Gastos estimados por periodo de facturación:</th><td> <?php echo number_format($pr_oferta->getCosteFinal()*$periodo/$pr_oferta->getDuracion(), 2, ',', '.'); ?>€</td>
            </tr>
        <?php }else{
           
        }
       
        $grafica = $pr_oferta->getGrafica();
        ?>
         </table>
        <div id="grafica" style="width:720px;height:480px;"></div>
        <script id="source" language="javascript" type="text/javascript">
         $(function () {
            var css_id = "#grafica";
            var data = [
                {label: 'Promedio', lines: { show: true}, data: [<?php foreach($grafica['Promedio'] as $pos=>$label): ?>
                    [<?php echo $pos ?>,'<?php echo $label ?>'],
                <?php endforeach; ?>
                ]},
                {label: 'Ingresos', lines: { show: true, fill: true, steps: true }, data:[<?php foreach($grafica['Ingresos'] as $pos=>$label): ?>
                    [<?php echo $pos ?>,'<?php echo $label ?>'],
                <?php endforeach; ?>
                ],  xaxis: 2},
                {label: 'Gastos',lines: { show: true, fill: true, steps: true }, data: [<?php foreach($grafica['Gastos'] as $pos=>$label): ?>
                    [<?php echo $pos ?>,'<?php echo $label ?>'],
                <?php endforeach; ?>
                ]},
                {label: 'Margen', lines: { show: true}, data: [<?php foreach($grafica['Margen'] as $pos=>$label): ?>
                    [<?php echo $pos ?>,'<?php echo $label ?>'],
                <?php endforeach; ?>
                ]},
            ];
            var options ={
                points: { show: true },
                xaxis: {ticks: [<?php foreach($grafica['ticks1'] as $pos=>$label): ?>
                    [<?php echo $pos ?>,'<?php echo $label ?>'],
                <?php endforeach; ?>
                ]},
                x2axis: {ticks: [
                <?php foreach($grafica['ticks2'] as $pos=>$label): ?>
                    [<?php echo $pos ?>,'<?php echo $label ?>'],
                <?php endforeach; ?>
                ]},
            };
            $.plot($(css_id), data, options);
        });
        </script>
   </div>
    
    <div id="tabs-acciones">
    <h4>Acciones disponibles</h4>
    <p></p>
    <div id="dialog-confirm" title="¿Cambiar estado de la oferta?">
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Se va a proceder a cambiar el estado de la oferta actual y avisar del cambio a las personas interesadas. ¿Está seguro?</p>
    </div>
    <script type="text/javascript">
    $("#dialog-confirm").hide();
	function confirmacion(href) {
        $("#dialog-confirm").show();
		$("#dialog-confirm").dialog({
			resizable: false,
			height:220,
			modal: true,
			buttons: {
				'Aceptar': function() {
					$(this).dialog('close');
                    window.location = href;
				},
				'Cancelar': function() {
					$(this).dialog('close');
                    return false;
				}
			}
		});
	};
	</script>
    



    <ul>
        <?php if(!$pr_oferta->haExpirado()): ?>
            <?php if($pr_oferta->getEstado() < '3'): ?>
                <li><a href="<?php echo url_for('oferta/edit?id='.$pr_oferta->getId()) ?>">Editar esta oferta</a></li>
            <?php endif; ?>
            <a href="#" onclick="window.print(); return false;">Imprimir oferta</a>
            <?php if($pr_oferta->getEstado() == '1' || $pr_oferta->getEstado() == '8'): ?>
                <li><a href="#"  onClick="return confirmacion('<?php echo url_for('cambiar_estado',$pr_oferta->setEstado(2)) ?>');">Valorar oferta</a></li>
                <?php $pr_oferta->setEstado(1) ?>
            <?php endif; ?>
            <?php if($pr_oferta->getEstado() == '2' and $empleado->puedeValidar()): ?>
                <li><a href="#"  onClick="return confirmacion('<?php echo url_for('cambiar_estado',$pr_oferta->setEstado(3)) ?>');">Aprobar oferta</a></li>
                <?php $pr_oferta->setEstado(2) ?>
            <?php endif; ?>
            <?php if($pr_oferta->getEstado() == '3'): ?>
                <li><a href="#"  onClick="return confirmacion('<?php echo url_for('cambiar_estado',$pr_oferta->setEstado(4)) ?>');">Presentar oferta</a></li>
                <?php $pr_oferta->setEstado(3) ?>
            <?php endif; ?>
            <?php if($pr_oferta->getEstado() == '4'): ?>
                <li><a href="#"  onClick="return confirmacion('<?php echo url_for('cambiar_estado',$pr_oferta->setEstado(5)) ?>');">Crear nuevo proyecto para esta oferta</a></li>
                <li><a href="#"  onClick="return confirmacion('<?php echo url_for('cambiar_estado',$pr_oferta->setEstado(7)) ?>');">Almacenar oferta no adjudicada</a></li>
                <?php $pr_oferta->setEstado(4) ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php if($pr_oferta->getEstado() != '5'): ?>
        <li><a href="#"  onClick="return confirmacion('<?php echo url_for('cambiar_estado',$pr_oferta->setEstado(7)) ?>');">Descartar oferta</a></li>
        <li><?php echo link_to('Eliminar esta oferta', 'oferta/delete?id='.$pr_oferta->getId(), array('method' => 'delete', 'confirm' => '¿Estás seguro de que desea eliminar esta oferta?')) ?></li>
        <?php endif; ?>
        <li><a href="<?php echo url_for('oferta/index') ?>">Volver a la lista</a></li>
    </ul>
    </div>

</div>

<hr />

  <div class="meta">
    <small>Creado el <?php echo $pr_oferta->getDateTimeObject('fecha_creacion')->format('d/m/Y H:m') ?> por <?php echo $pr_oferta->getResponsable() ?></small>
  </div>
  &nbsp;
  <div class="meta">
    <small>Última actualización: <?php echo $pr_oferta->getDateTimeObject('fecha_actualizacion')->format('d/m/Y H:m') ?></small>
  </div>

  
</div>
