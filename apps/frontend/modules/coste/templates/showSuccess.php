    <h4>Costes</h4>
    <table class="ofertas">
          <thead>
             <tr class="encabezado">
               <th>Tipo de gasto</th>
               <th>Concepto</th>
               <th>Porcentaje dedicación</th>
               <th>Importe</th>
             </tr>
          </thead>
          <tbody>
        <?php foreach ($pr_costes as $i=> $coste): ?>
            <tr><?php echo $coste->getNombreTipo() ?></tr>
            <tr><?php echo $coste->getConcepto() ?></tr>
            <tr><?php echo $coste->getDedicacion() ?></tr>
            <tr><?php echo $coste->getImporte() ?></tr>
        <?php endforeach ?>
          </tbody>
        </table>
