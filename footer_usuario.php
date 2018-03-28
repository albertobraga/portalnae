		<link rel="stylesheet" href="Layout/css/style.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="css/bootstrap-datetimepicker.min">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/docs.min.js"></script>
		<script src="js/steps.js"></script>
		<script src="js/ie10-viewport-bug-workaround.js"></script>
		<script src="js/jquery.formatCurrency-1.4.0.js"></script>
		<script src="js/bootstrap-datetimepicker.min"></script>
		<script src="js/Locales/bootstrap-datetimepicker.pt-BR"></script>
		
		
		
		<script type="text/javascript">
			$(document).ready(function()
					{
				 $("#dataNascimento").datepicker({dateFormat: 'yy-mm-dd'});
						$('#totalRenda').toNumber().formatCurrency();
						$( "#totalRenda" ).blur(function() {
							$('#totalRenda').toNumber().formatCurrency();
				});
			});
		</script>
		
		
		
		
	</body>
</html>