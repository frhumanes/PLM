 <div id="error" class="flash_error ui-state-error ui-corner-all">
    La factura <?php echo $pr_factura->getCodigo() ?> no ha cambiado de estado 
</div>
 <script type="text/javascript">
    $('#error').show('blind',{},500).delay(3000).hide('highlight',{},500);
    setTimeout("window.location.reload()",4250);
</script>
