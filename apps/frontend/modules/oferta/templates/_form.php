<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php echo form_tag_for($form, '@oferta') ?>

<?php if($form->hasGlobalErrors() || $form->hasErrors()): ?>
    <?php $sf_user->setFlash('error', sprintf('Validación incorrecta. Revise los campos en busca de errores.')); ?>
<?php endif; ?>
<?php $counter = 0; ?>


<script type="text/javascript">
    $(function() {
        $("#tabs").tabs(<?php echo ($form->getObject()->isNew())?'{ disabled: [1, 2, 3] }':'' ?>);
    });
</script>
    
<br />

<div id="tabs">
    <ul>
        <li><a href="#oferta_form">Detalles</a></li>
        <li><a href="#oferta_form2">Valoración</a></li>
        <li><a href="#coste_form">Costes</a></li>
        <li><a href="#balance_form">Datos económicos</a></li>
        <a style="float: right" onclick="$('form').submit();" href="#"><?php echo image_tag('save.png', array('style'=>"border: medium none ; vertical-align: middle; padding: 0 5px; ")) ?></a>
        <?php if (!$form->getObject()->isNew()): ?>
            <?php echo link_to(image_tag('trash.png', array('style'=>"float: right; border: medium none ; vertical-align: middle; padding: 0 5px;")), 'oferta/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => '¿Estás seguro de que desea eliminar esta oferta?')) ?>
            <a style="float: right"  href="<?php echo url_for('oferta/show?id='.$form->getObject()->getId()) ?>"><?php echo image_tag('volver.png', array('style'=>"border: medium none ; vertical-align: middle; padding: 0px 5px;")) ?></a>
        <?php else: ?>
            <a style="float: right"  href="<?php echo url_for('oferta/index') ?>"><?php echo image_tag('volver.png', array('style'=>"border: medium none ; vertical-align: middle;")) ?></a>
        <?php endif; ?>
    </ul>
  <div id="oferta_form">
      <?php echo include_partial('oferta/addOfertaForm', array('field' => $form)) ?>
  </div>
  <?php if (!$form->getObject()->isNew()): ?>
  
    <div id="oferta_form2">
      <?php echo include_partial('oferta/addValoracionForm', array('field' => $form)) ?>
    </div>
  <script type="text/javascript">
    function calcularTotal() {
      $('#pr_oferta_pr_costes_pr_coste_total').val('0');
      $("input[name*='[importe]']").each(function (){
          var coste_recursos = parseFloat($('#pr_oferta_pr_costes_pr_coste_total').val()) + parseFloat($(this).val());
          $('#pr_oferta_pr_costes_pr_coste_total').val(coste_recursos);
        });
      var coste_recursos = parseFloat($('#pr_oferta_pr_costes_pr_coste_total').val());
      var base_licitacion = parseFloat($('#pr_oferta_base_licitacion').val());
      var descuento = parseFloat($('#pr_oferta_descuento').val());
      if(base_licitacion > 1){
        var importe_licitacion = base_licitacion*(1-descuento/100);
      }else{
        var importe_licitacion = parseFloat($('#pr_oferta_importe_licitacion').val());
      }
     
      var estructura = parseFloat($("#pr_oferta_estructura").val())*importe_licitacion/100;
      var financiacion = (coste_recursos+estructura)*parseFloat($("#pr_oferta_financiacion").val())/100;
      var coste_total = (coste_recursos+estructura+financiacion);
      var margen = importe_licitacion - coste_total;
      var rentabilidad = (margen/importe_licitacion)*100;
      $('#pr_oferta_pr_costes_pr_coste_total').val(coste_total);
      $('#pr_oferta_coste_total').val(coste_total);
      $('#pr_oferta_rentabilidad').val(rentabilidad);
      $('#pr_oferta_coste_financiacion').val(financiacion);
      $('#pr_oferta_coste_estructura').val(estructura);
      $('#pr_oferta_margen').val(margen);
      $('#pr_oferta_importe_licitacion').val(importe_licitacion);
    }
  </script>
  
  <?php echo include_partial('oferta/addBalanceForm', array('form' => $form)) ?>
  
  <table id="coste_form" class="costes">
  <thead class="encabezado">
  <tr >
    <th></th>
    <th>Tipo</th>
    <th>Concepto</th>
    <th>Importe</th>
    <th>%</th>
  </tr>
  </thead>
   <tfoot class="pie">
     <tr>
        <td></td>
        <td><button id="add_coste" type="button"><?php echo "Añadir coste" ?></button></td>
        <td>Total Gastos (EUR)</td>
        <td class="importe"><input readonly="true" type="text" value="0" id="pr_oferta_pr_costes_pr_coste_total"></td>
        <td></td>
     <tr>
   </tfoot>     
  <tbody id="costes_container">
      <tr class="even">
        <td class="num">0</td>
        <td class="tipo" colspan='2'><?php echo $form['estructura']->renderLabel() ?></td>
        <td class="importe"><input readonly="true" type="text" value="<?php echo $form->getObject()->getCosteEstructura() ?>" id="pr_oferta_coste_estructura"></td>
        <td class="dedicacion">
        <?php echo $form['estructura']->renderError() ?>
        <?php echo $form['estructura'] ?>
        </td>
     </tr>
     <tr class="odd">
        <td class="num">0</td>
        <td class="tipo" colspan='2'><?php echo $form['financiacion']->renderLabel() ?></td>
        <td class="importe"><input readonly="true" type="text" value="<?php echo $form->getObject()->getCosteFinanciacion() ?>" id="pr_oferta_coste_financiacion"></td>
        <td class="dedicacion">
        <?php echo $form['financiacion']->renderError() ?>
        <?php echo $form['financiacion'] ?>
        </td>
<script>
    $('#pr_oferta_financiacion').change(calcularTotal);
    $('#pr_oferta_estructura').change(calcularTotal);
</script>
     </tr>
     <tr>
      <?php foreach($form['pr_costes'] as $key=>$field): ?>
        <?php echo include_partial('oferta/addCostesForm', array('field' => $field, 'num' => ++$counter)) ?>
      <?php endforeach; ?>
   </tbody>
  
  </table>
  
   
   
</form>
</div>
<script type="text/javascript">
var cnt = <?php echo $counter ?>;
function addCoste(num)
{
  var r = jQuery.ajax({
    type: 'GET',
    url: '<?php echo url_for('oferta/addCostesForm')?>'+'<?php echo ($form->getObject()->isNew()?'':'?id='.$form->getObject()->getId()).($form->getObject()->isNew()?'?num=':'&num=')?>'+num,
    async: false
  }).responseText;
  return r;
};
function delCoste(num)
{
document.getElementById('costes_container').removeChild(document.getElementById('coste_'+num));
cnt = cnt - 1;
};
$(document).ready(function()
{
  $('button#add_coste').click(function() {
  $("#costes_container").append(addCoste(cnt));
    cnt = cnt + 1;
  });
});
</script>

<?php endif; ?>
