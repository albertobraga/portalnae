	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min">
	<script src="js/bootstrap-datetimepicker.min"></script>
	<script src="js/Locales/bootstrap-datetimepicker.pt-BR"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/docs.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="js/ie10-viewport-bug-workaround.js"></script>
	<script src="js/jquery.formatCurrency-1.4.0.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
				{
					$('#totalRenda').toNumber().formatCurrency();
					$( "#totalRenda" ).blur(function() {
						$('#totalRenda').toNumber().formatCurrency();
						});
					 $("#InicialFase").datepicker({dateFormat: 'yy-mm-dd'});
					 $("#finalFase").datepicker({dateFormat: 'yy-mm-dd'});
				});
		
	</script>

	<script src="js/jquery.maskedinput.js"></script>
	<script type="text/javascript">		
			$(document).ready(function()
					{
				$("#respCpf").mask("999.999.999-99");
						$( "#respCpf" ).blur(function() {
							$("#respCpf").mask("999.999.999-99");
							});

						$("#cpf").mask("999.999.999-99");
						$( "#cpf" ).blur(function() {
							$("#cpf").mask("999.999.999-99");
							});
					});
	</script>
    
</body>
