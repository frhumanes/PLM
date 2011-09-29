 <div id="notice" class="flash_notice ui-state-highlight ui-corner-all">
    La factura <?php echo $pr_factura->getCodigo() ?> ha cambiado a estado  <?php echo $pr_factura->getNombreEstado() ?> 
</div>
 <script type="text/javascript">
    $('#notice').show('blind',{},500).delay(3000).hide('highlight',{},500);
    setTimeout("window.location.reload()",4250);
</script>
