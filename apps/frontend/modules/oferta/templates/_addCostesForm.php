<?php  $q = Doctrine_Query::create()->from('PRCategoria t');?>
<?php  $categorias = $q->execute();?>
<tr class="<?php echo fmod($num, 2) ? 'even' : 'odd' ?>" id="coste_<?php echo $num ?>">
  <td class="num"><?php echo $field->renderLabel($num) ?>
  <td class="tipo">
     <?php echo $field['tipo_gasto']->renderError() ?>
     <?php echo $field['tipo_gasto'] ?>
  </td>
   <td class="concepto">
     <?php echo $field['concepto']->renderError() ?>
     <?php echo $field['concepto'] ?>
     <select class="categorias" id="categorias_coste_<?php echo $num ?>" >
     <?php foreach($categorias as $categoria): ?>
          <option value="<?php echo $categoria->getCosteAnual() ?>"<?php echo ($categoria->getCosteAnual()==$field['coste_anual']->getValue())?'selected="selected"':'' ?>><?php echo $categoria->getName() ?></option> 
     <?php endforeach; ?>
    </select>
  </td>
  <td class="importe">
     <?php echo $field['importe']->renderError() ?>
     <?php echo $field['importe'] ?>
     <?php echo $field['coste_anual'] ?>
  </td>
   <td class="dedicacion">
     <?php echo $field['dedicacion']->renderError() ?>
     <?php echo $field['dedicacion'] ?>
     
  </td>
  <?php echo $field['id'] ?>
  <script type="text/javascript">

    function configure<?php echo $num ?>(){
        $("#pr_oferta_pr_costes_pr_coste<?php echo $num ?>_coste_anual").hide();
        if($("#pr_oferta_pr_costes_pr_coste<?php echo $num ?>_tipo_gasto option:selected").text()!= 'Personal'){
            $("#pr_oferta_pr_costes_pr_coste<?php echo $num ?>_dedicacion").hide();
            $("#pr_oferta_pr_costes_pr_coste<?php echo $num ?>_concepto").show();
            $("#categorias_coste_<?php echo $num ?>").hide();
        }
        else{
            $("#pr_oferta_pr_costes_pr_coste<?php echo $num ?>_dedicacion").show();
            $("#pr_oferta_pr_costes_pr_coste<?php echo $num ?>_concepto").hide();
            $("#categorias_coste_<?php echo $num ?>").show();
            costeRecurso<?php echo $num ?>();
        };
    }

    function costeRecurso<?php echo $num ?>() {
        if($("#pr_oferta_pr_costes_pr_coste<?php echo $num ?>_tipo_gasto option:selected").text() == 'Personal'){
            var coste_anual = parseInt($("#categorias_coste_<?php echo $num ?>").val());
            var dedicacion =  parseInt($("#pr_oferta_pr_costes_pr_coste<?php echo $num ?>_dedicacion").val())/100;
            var duracion_horas= parseInt($("#pr_oferta_duracion").val())*(5/7)*8;
            var importe = (coste_anual*duracion_horas*dedicacion)/1700.0;
             $("#pr_oferta_pr_costes_pr_coste<?php echo $num ?>_coste_anual").val(coste_anual);
             $("#pr_oferta_pr_costes_pr_coste<?php echo $num ?>_importe").val(importe);
             $("#pr_oferta_pr_costes_pr_coste<?php echo $num ?>_concepto").val($("#categorias_coste_<?php echo $num ?> option:selected").text());
             calcularTotal();
        }
    }

    
    $("#pr_oferta_pr_costes_pr_coste<?php echo $num ?>_tipo_gasto").change(function () {
        configure<?php echo $num ?>();
         $("#pr_oferta_pr_costes_pr_coste<?php echo $num ?>_dedicacion").val('100');
         $("#pr_oferta_pr_costes_pr_coste<?php echo $num ?>_importe").val('0');
         $("#pr_oferta_pr_costes_pr_coste<?php echo $num ?>_concepto").val('');
        calcularTotal();
        });
        
    $("#categorias_coste_<?php echo $num ?>").change(costeRecurso<?php echo $num ?>).change();
    $("#pr_oferta_pr_costes_pr_coste<?php echo $num ?>_dedicacion").change(costeRecurso<?php echo $num ?>);
     
    
    
    $("#pr_oferta_pr_costes_pr_coste<?php echo $num ?>_importe").change(calcularTotal);
    
    configure<?php echo $num ?>();
    calcularTotal();
  </script>

	<?php if ($sf_request->isXmlHttpRequest()): ?>
	<td>
		<a href="#" onclick="delCoste(<?php echo $num ?>);calcularTotal();return false;"><?php echo image_tag('delete.png', array('style'=>"border: medium none ; vertical-align: middle;")) ?></a>
	</td>
	<?php endif; ?>
</tr>
