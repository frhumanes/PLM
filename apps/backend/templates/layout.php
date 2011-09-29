<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <title>Interfaz de administrador de Price-Roch </title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php use_stylesheet('admin.css') ?>
    <?php use_javascript('jquery-1.4.2.min.js') ?>
    <?php use_javascript('jquery-ui-1.8.1.custom.min.js') ?>
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
  </head>
  <body>
    <div id="container">
      <div id="header">
         <h1>
           <a href="<?php echo url_for('homepage') ?>">
              <img src="http://www.symfony-project.org/images/logo.jpg"
alt="Price-Roch" />
           </a>
         </h1>
      </div>
      <div id="menu">
         <ul>
           <li>
              <?php echo link_to('Ofertas', 'pr_oferta') ?>
           </li>
           <li>
              <?php echo link_to('Proyectos', 'pr_proyecto') ?>
           </li>
           <li>
              <?php echo link_to('Facturas', 'pr_factura') ?>
           </li>
           <li>
              <?php echo link_to('Clientes', 'pr_cliente') ?>
           </li>
           <li>
              <?php echo link_to('Usuarios', 'pr_empleado') ?>
           </li>
           <li>
              <?php echo link_to('Recursos', 'pr_categoria') ?>
           </li>
         </ul>
        </div>
        <div id="content">
           <?php echo $sf_content ?>
        </div>
        <div id="footer">
           <img src="http://www.symfony-project.org/images/price-mini.png" />
           powered by <a href="http://www.symfony-project.org/">
           <img src="http://www.symfony-project.org/images/symfony.gif"
alt="symfony framework" /></a>
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

