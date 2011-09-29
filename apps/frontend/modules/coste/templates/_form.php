<?php echo form_tag_for($form, '@coste') ?>
  <table id="coste_form">
    <?php echo $form ?>
    <div class="meta">
        <input type="submit" value="Guardar" />
            <?php if (!$form->getObject()->isNew()):
                echo link_to('Eliminar', 'costes/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => '¿Estás seguro de que desea eliminar este gasto?'));
            endif; ?>
    </div>
  </table>
</form>

