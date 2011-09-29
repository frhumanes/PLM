<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php echo form_tag_for($form, '@factura') ?>
<?php if($form->hasGlobalErrors() || $form->hasErrors()): ?>
    <?php $sf_user->setFlash('error', sprintf('Validación incorrecta. Revise los campos en busca de errores.')); ?>
<?php endif; ?>
<script type="text/javascript">
    $(function() {
        $("#tabs").tabs();
    });
</script>
    
<br />

<div id="tabs">
    <ul>
        <li><a href="#factura_form">Detalles</a></li>
        <a style="float: right" onclick="$('form').submit();" href="#"><?php echo image_tag('save.png', array('style'=>"border: medium none ; vertical-align: middle; padding: 0 5px; ")) ?></a>
        <?php if (!$form->getObject()->isNew()): ?>
            <?php echo link_to(image_tag('trash.png', array('style'=>"float: right; border: medium none ; vertical-align: middle; padding: 0 5px;")), 'factura/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => '¿Estás seguro de que desea eliminar esta oferta?')) ?>
            <a style="float: right"  href="<?php echo url_for('factura/show?id='.$form->getObject()->getId()) ?>"><?php echo image_tag('volver.png', array('style'=>"border: medium none ; vertical-align: middle; padding: 0px 5px;")) ?></a>
        <?php else: ?>
            <a style="float: right"  href="<?php echo url_for('factura/index') ?>"><?php echo image_tag('volver.png', array('style'=>"border: medium none ; vertical-align: middle;")) ?></a>
        <?php endif; ?>
    </ul>
  <div id="factura_form">
    <form action="<?php echo url_for('factura/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
      <?php echo $form->renderHiddenFields(false) ?>
      <table>
        <tbody>
          <tr>
          <th>Concepto</th>
          <td><?php echo $form['name']->renderError(); echo $form['name']?></td>
          </tr>
          <tr>
          <th>Código factura</th>
          <td><?php echo $form['codigo']->renderError(); echo $form['codigo']?></td>
          </tr>
          <tr>
          <th>Importe</th>
          <td><?php echo $form['importe']->renderError(); echo $form['importe']?></td>
          </tr>
          <?php echo $form['estado']->renderRow() ?>
          <?php echo $form['fichero']->renderRow() ?>
        </tbody>
      </table>
       <?php echo $form['proyecto_id'] ?>
          <script type="text/javascript">
            $('#pr_factura_proyecto_id').hide();
        </script>
    </form>
</div>
