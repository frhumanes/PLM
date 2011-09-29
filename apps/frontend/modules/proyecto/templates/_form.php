<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('proyecto/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

<script type="text/javascript">
    $(function() {
        $("#tabs").tabs();
    });
    $(function() {
        $(".radio_list").buttonset();
    });
</script>
<div id="tabs">
    <ul>

        <li><a href="#proyecto_form">Detalles</a></li>
        <a style="float: right" onclick="$('form').submit();" href="#"><?php echo image_tag('save.png', array('style'=>"border: medium none ; vertical-align: middle; padding: 0 5px; ")) ?></a>
        <?php if (!$form->getObject()->isNew()): ?>
            <?php echo link_to(image_tag('trash.png', array('style'=>"float: right; border: medium none ; vertical-align: middle; padding: 0 5px;")), 'proyecto/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => '¿Estás seguro de que desea eliminar esta proyecto?')) ?>
            <a style="float: right"  href="<?php echo url_for('proyecto/show?id='.$form->getObject()->getId()) ?>"><?php echo image_tag('volver.png', array('style'=>"border: medium none ; vertical-align: middle; padding: 0px 5px;")) ?></a>
        <?php else: ?>
            <a style="float: right"  href="<?php echo url_for('proyecto/index') ?>"><?php echo image_tag('volver.png', array('style'=>"border: medium none ; vertical-align: middle;")) ?></a>
        <?php endif; ?>
    </ul>
  <table id="proyecto_form" class="proyecto">
    <tfoot>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
  <script>
    $('#pr_proyecto_oferta_id').hide();
  </script>
  </div>
</form>
