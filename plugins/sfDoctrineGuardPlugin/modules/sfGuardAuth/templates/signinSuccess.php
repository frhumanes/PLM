<?php use_helper('I18N') ?>

<form id="dialog-signin" title="Acceso al sistema" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <table class="login">
    <?php echo $form ?>
  </table>

  <!--<input type="submit" value="<?php echo __('Acceder') ?>" /><a href="<?php echo url_for('@sf_guard_password') ?>"><?php echo __('¿Olvidó su contraseña?') ?></a>-->
</form>
