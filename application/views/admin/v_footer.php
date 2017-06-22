<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?echo site_url();?>js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?echo site_url();?>assets/js/ie10-viewport-bug-workaround.js"></script>
    <?
    if (isset($table2)) {
    	?>
    	<!-- DATA TABLE SCRIPTS -->
        <script src="<?echo site_url();?>assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="<?echo site_url();?>assets/DT_bootstrap.js"></script>
    	<?
    }
    ?>
  </body>
</html>