<table>
   <tbody>
      <?php echo $field->renderHiddenFields(false) ?>
     
     <?php echo $field['titulo']->renderError() ?>
     <?php echo $field['titulo']->renderRow() ?>

     <?php echo $field['creador_id']->renderError() ?>
     <?php echo $field['creador_id']->renderRow() ?>

    <tr>
        <th><?php echo $field['cliente_id']->renderLabel() ?></th>
        <td><?php echo $field['cliente_id'] ?><a href="#" id="create-user"><?php echo image_tag('more.png', array('style'=>"border: medium none ; vertical-align: middle;padding: 0 5px;")) ?></a></td>
    </tr>
    
    
     <?php echo $field['expediente']->renderError() ?>
     <?php echo $field['expediente']->renderRow() ?>

     <?php echo $field['tipo_oferta']->renderError() ?>
     <?php echo $field['tipo_oferta']->renderRow() ?>

     <?php echo $field['tipo_trabajo']->renderError() ?>
     <?php echo $field['tipo_trabajo']->renderRow() ?>

     <?php echo $field['duracion']->renderError() ?>
     <?php echo $field['duracion']->renderRow() ?>
     
     <?php echo $field['fecha_presentacion']->renderError() ?>
     <?php echo $field['fecha_presentacion']->renderRow() ?>
     
     <?php echo $field['fecha_creacion']; ?>
    
     <?php echo $field['descripcion_oferta']->renderError() ?>
     <?php echo $field['descripcion_oferta']->renderRow() ?>
     
     <?php echo $field['descripcion_pliego']->renderError() ?>
     <?php echo $field['descripcion_pliego']->renderRow() ?>
   </tbody>
</table>
<style type="text/css">
		#dialog-form label, #dialog-form input { display:block; }
		#dialog-form input.text { margin-bottom:12px; width:95%; padding: .4em; }
		#dialog-form fieldset { padding:0; border:0; margin-top:15px; }
		#dialog-form h1 { font-size: 1.2em; margin: .3em 0; }
		.ui-dialog .ui-state-error { padding: .3em; }
		.validateTips { border: 1px solid transparent; padding: 0.3em; }
		
</style>

<script type="text/javascript">   
    $(function() {
        $("#pr_oferta_fecha_presentacion").datepicker({ dateFormat: 'dd-mm-yy' });
        $('#pr_oferta_fecha_creacion').hide();
        
        function createCliente(nombre, direccion)
        {
          var r = jQuery.ajax({
            type: 'GET',
            url: '<?php echo url_for('oferta')?>/add/'+nombre+'/'+direccion,
            async: false
          }).responseText;
          return r;
        };
        
        // a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
        $("#dialog").dialog("destroy");
        
        var name = $("#name"),
            direccion = $("#direccion"),
            allFields = $([]).add(name).add(direccion)
            tips = $(".validateTips");

        function updateTips(t) {
            tips
                .text(t)
                .addClass('ui-state-highlight');
            setTimeout(function() {
                tips.removeClass('ui-state-highlight', 1500);
            }, 500);
        }
        
        function checkLength(o,n,min,max) {
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass('ui-state-error');
				updateTips("La longitud " + n + " debe ser entre "+min+" y "+max+".");
				return false;
			} else {
				return true;
			}
		}

        $("#dialog-form").dialog({
            autoOpen: false,
            height: 300,
            width: 350,
            modal: true,
            buttons: {
                'Crear': function() {
                    var bValid = true;
                    allFields.removeClass('ui-state-error');

                    bValid = bValid && checkLength(name,"name",3,255);
                    bValid = bValid && checkLength(direccion,"direccion",6,255);

                    if (bValid) {
                        $("#pr_oferta_cliente_id").append(createCliente(name.val(), direccion.val()));
                        $(this).dialog('close');
                    }
                },
                'Cancelar': function() {
                    $(this).dialog('close');
                }
            },
            close: function() {
                allFields.val('').removeClass('ui-state-error');
            }
        });
        
        
        
        $('#create-user')
            .button()
            .click(function() {
                $('#dialog-form').dialog('open');
            });

	});
	</script>
<div id="dialog-form" title="Crear nuevo cliente">
	<p class="validateTips">Todos los campos son requeridos.</p>
	<form>
	<fieldset>
		<label for="name">Nombre</label>
		<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
		<label for="direccion">Dirección</label>
		<input type="text" name="direccion" id="direccion" value="" class="text ui-widget-content ui-corner-all" />
	</fieldset>
	</form>
</div>
