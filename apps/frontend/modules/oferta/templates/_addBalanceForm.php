<?php $nhitos  = 0 ?>
<div id="balance_form">
    <table class="balance">
    <tr>
      <th>Base licitación:</th>
      <td><?php echo $form['base_licitacion'] ?></td>
    </tr>
    <tr>
      <th>Descuento:</th>
      <td><?php echo $form['descuento'] ?>%</td>
    </tr>
     <tr>
      <th>Fianza provisional:</th>
      <td><?php echo $form['fianza_provisional'] ?></td>
    </tr>
    <tr>
      <th>Importe de la oferta:</th>
      <td><input readonly="true" type="text" value="<?php echo $form->getObject()->getImporteOferta() ?>" id="pr_oferta_importe_licitacion"></td>
    </tr>
    <tr>
      <th>Costes asociados:</th>
      <td><input readonly="true" type="text" value="<?php echo $form->getObject()->getCosteFinal() ?>" id="pr_oferta_coste_total"></td>
    </tr>
    <tr>
      <th>Margen:</th>
      <td><input readonly="true" type="text" value="<?php echo $form->getObject()->getMargen() ?>" id="pr_oferta_margen"></td>
    </tr>
    <tr>
      <th>Rentabilidad:</th>
      <td><input readonly="true" type="text" value="<?php echo $form->getObject()->getRentabilidad() ?>" id="pr_oferta_rentabilidad">%</td>
    </tr>
    <tr><?php echo $form['estado'] ?></tr>
    <tr>
    <th><?php echo $form['tipo_facturacion']->RenderLabel() ?></th>
    <td  class="radio"><?php echo $form['tipo_facturacion'] ?></td>
    <script type="text/javascript">
        $(function() {
            $(".radio_list").buttonset();
        });
	</script>

    </tr>
    </table>
    

    <div class="facturacion">
        <ol id="hitos_container" >
            <?php foreach($form['pr_hitos'] as $key=>$field): ?>
            <?php echo include_partial('oferta/addHitosForm', array('field' => $field, 'num' => ++$nhitos)) ?>
          <?php endforeach; ?>
        <ol>
        <button id="add_hito" type="button"><?php echo "Añadir hito" ?></button>
    </div>

   
</div>



<script type="text/javascript">
    $("#pr_oferta_importe_licitacion").change(calcularTotal);
    $("#pr_oferta_base_licitacion").change(calcularTotal);
    $("#pr_oferta_descuento").change(calcularTotal);
    $("#pr_oferta_estado").hide();
    $("input[name*='[tipo_facturacion]']").change(function(){
        if ($("input[name*='[tipo_facturacion]']:checked").val() == "Certificación mensual")
        {
            $("#hitos_container").hide();
            $("#add_hito").hide();
        }
        else{
            $("#hitos_container").show();
            $("#add_hito").show();
        }
    }).change();

    var hitos = <?php echo $nhitos ?>;
    function addHito(num)
    {
      var r = jQuery.ajax({
        type: 'GET',
        url: '<?php echo url_for('oferta/addHitosForm')?>'+'<?php echo ($form->getObject()->isNew()?'':'?id='.$form->getObject()->getId()).($form->getObject()->isNew()?'?num=':'&num=')?>'+num,
        async: false
      }).responseText;
      return r;
    };
    function delHito(num)
    {
    document.getElementById('hitos_container').removeChild(document.getElementById('hito_'+num));
    hitos = hitos - 1;
    };
    $(document).ready(function()
    {
      $('button#add_hito').click(function() {
      $("#hitos_container").append(addHito(hitos));
        hitos = hitos + 1;
      });
    });

</script>
