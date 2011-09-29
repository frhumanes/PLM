<?php if(isset($pr_cliente)): ?>
    <option value="<?php echo $pr_cliente->getId() ?>" selected="selected"><?php echo $pr_cliente->getName() ?></option>
<?php else: ?>
    &nbsp;
<?php endif; ?>
