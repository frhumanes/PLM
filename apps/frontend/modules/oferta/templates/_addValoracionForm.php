          
     <h4>Sobre la Oferta</h4>
     <table>
     
     <?php echo $field['tiempo_elaboracion']->renderError() ?>
     <?php echo $field['tiempo_elaboracion']->renderRow() ?>
     
     <?php echo $field['nuevo']->renderError() ?>
     <?php echo $field['nuevo']->renderRow() ?>
     
     <?php echo $field['claridad']->renderError() ?>
     <?php echo $field['claridad']->renderRow() ?>
     
     <?php echo $field['experiencia']->renderError() ?>
     <?php echo $field['experiencia']->renderRow() ?>
     
     <?php echo $field['aportacion']->renderError() ?>
     <?php echo $field['aportacion']->renderRow() ?>
     
     <?php echo $field['invitados']->renderError() ?>
     <?php echo $field['invitados']->renderRow() ?>
     
     <?php echo $field['condicionada']->renderError() ?>
     <?php echo $field['condicionada']->renderRow() ?>
     </table>
     
     <h4>Sobre nuestra Empresa</h4>
     <table>
     
       <tr>
            <th><?php echo $field['posicion_nuestra']->renderLabel() ?><div id="posicion">¿Por qué?<?php echo $field['porque_posicion'] ?></div></th>
            <td><?php echo $field['posicion_nuestra'] ?></td>
        </tr>
     
        <tr>
            <th><?php echo $field['posicion_competencia']->renderLabel() ?><div id="competencia">¿Por qué?<?php echo $field['porque_competencia'] ?></div></th>
            <td><?php echo $field['posicion_competencia'] ?></td>
        </tr>

     
     <?php echo $field['competidor']->renderError() ?>
     <?php echo $field['competidor']->renderRow() ?>
     
     <?php echo $field['ventaja']->renderError() ?>
     <?php echo $field['ventaja']->renderRow() ?>

        <tr>
            <th><?php echo $field['exito']->renderLabel() ?><div id="exito">¿Por qúe?<?php echo $field['porque_exito'] ?></div></th>
            <td><?php echo $field['exito'] ?></td>
        </tr>

     </table>
     
     <h4>Sobre el cliente</h4>
     
     <table>
        <?php echo $field['previamente']->renderError() ?>
        <?php echo $field['previamente']->renderRow() ?>
        <tr>
            <th><?php echo $field['enchufe']->renderLabel() ?><div id="contacto">¿Quién?<?php echo $field['contacto'] ?></div></th>
            <td><?php echo $field['enchufe'] ?></td>
        </tr>
        
        <?php echo $field['imagen']->renderError() ?>
        <?php echo $field['imagen']->renderRow() ?>

     </table>
     <script>
     $(function (){
         $("input[name*='[enchufe]']").change(function (){
             if($("input[name*='[enchufe]']:checked").val()=='1'){
                 $('#contacto').show();
             }else{
                 $('#contacto').hide();
             }
          }).change();
         
         $("input[name*='[posicion_nuestra]']").change(function (){
             if($("input[name*='[posicion_nuestra]']:checked").val()=='0'){
                 $('#posicion').show();
             }else{
                 $('#posicion').hide();
             }
          }).change();
          
         $("input[name*='[posicion_competencia]']").change(function (){
             if($("input[name*='[posicion_competencia]']:checked").val()=='1'){
                 $('#competencia').show();
             }else{
                 $('#competencia').hide();
             }
          }).change();
          
          $("input[name*='[exito]']").change(function (){
             if($("input[name*='[exito]']:checked").val()=='1'){
                 $('#exito').show();
             }else{
                 $('#exito').hide();
             }
          }).change();
      });
         

     
     </script>
