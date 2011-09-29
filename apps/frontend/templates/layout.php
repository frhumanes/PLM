<!-- apps/frontend/templates/layout.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <title><?php include_slot('title', 'Price-Roch >>>> PLM') ?></title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php echo include_http_metas() ?>
    <?php use_stylesheet('cupertino/jquery-ui-1.8.1.custom.css') ?>
    <?php include_stylesheets() ?>
    <?php use_javascript('jquery-1.4.2.min.js') ?>
    <?php use_javascript('jquery-ui-1.8.1.custom.min.js') ?>
    <?php use_javascript('flot/jquery.flot.js') ?>
    <?php use_javascript('flot/jquery.flot.min.stack.js') ?>
    <?php include_javascripts() ?>
    <?php use_helper('Text') ?>
  </head>
  <body>
    <div id="container">
      <div id="header">
        <div class="content">
          <h1><a href="<?php echo url_for('homepage') ?>">
            <img title="Pincha aquí para ir al inicio" src="images/logo.png" alt="Price Roch Logo" />
          </a></h1>
          <h2><a id="salir" class="boton" href="<?php echo url_for('sf_guard_signout') ?>">
            Cerrar sesión
          </a></h2>
          <div id="sub_header">
            <ul>
                <li><a class="boton" href="<?php echo url_for('homepage') ?>">Mi panel</a></li>
                <li><a class="boton" href="<?php echo url_for('oferta') ?>">Ofertas</a></li>
                <li><a class="boton" href="<?php echo url_for('proyecto') ?>">Proyectos</a></li>
                <li><a class="boton" href="<?php echo url_for('factura') ?>">Facturas</a></li>
              </ul>
            <div class="search">
              
              <form action="<?php echo url_for('buscar') ?>" method="get">
                <input type="text" name="query"
                  id="search_keywords" />
                <input type="submit" value="search" />
                <div class="help">
                  Introduzca alguna palabra clave (código, cliente, título, estado, responsable,...)
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
 
      <div id="content">

        <?php if ($sf_user->hasFlash('notice')): ?>
          <div id="notice" class="flash_notice ui-state-highlight ui-corner-all">
            <?php echo $sf_user->getFlash('notice') ?>
          </div>
        <script type="text/javascript">
            $('#notice').show('blind',{},500).delay(3000).hide('highlight',{},500);
        </script>
        <?php endif ?>
 
        <?php if ($sf_user->hasFlash('error')): ?>
          <div id="error" class="flash_error ui-state-error ui-corner-all">
            <?php echo $sf_user->getFlash('error') ?>
          </div>
          <script type="text/javascript">
          $('#error').show('blind',{},500).delay(5000).hide('highlight',{},500);
          </script>
        <?php endif ?>
 
        <div class="content">
          <?php echo $sf_content ?>
        </div>
      </div>
 
      <div id="footer">
        <div class="content">
          <span class="symfony">
            <a href="http://www.price-roch.com/"><img src="/images/price-mini.png" /></a>
            powered by <a href="http://www.symfony-project.org/">
            <img src="/images/symfony.gif" alt="symfony framework" />
            </a>
          </span>
        </div>
      </div>
    </div>
    <script type="text/javascript">
	$(function() {
        $(".boton").button();

		$("#dialog-signin").dialog({
            width: 400,
            modal: true,
			buttons: {
				'Acceder': function() {
                    $(this).submit();
					$(this).dialog('close');
				}
			}
		});

	});
	</script>

  </body>
</html>
