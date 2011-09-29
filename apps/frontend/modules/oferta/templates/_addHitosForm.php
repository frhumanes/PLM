<li id="hito_<?php echo $num ?>">
 Hito <?php echo $num ?>: <?php echo $field['porcentaje'] ?>% del importe a los <?php echo $field['momento'] ?> días
	<?php if ($sf_request->isXmlHttpRequest()): ?>
		<a href="#" onclick="delHito(<?php echo $num ?>);return false;"><?php echo image_tag('delete.png', array('style'=>"border: medium none ; vertical-align: middle;")) ?></a>
	<?php endif; ?>
    <?php echo $field['id'] ?>
</li>
<script>
    $("#pr_oferta_pr_hitos_pr_hito<?php echo $num ?>_num").val(<?php echo $num ?>)
</script>


