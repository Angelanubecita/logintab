
<?php

if(isset($_REQUEST['b'])){ ?>
<script type='text/javascript'>
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut",
}
toastr.error('Error de Login, por favor verifique sus crendenciales.');
</script>
<?php } 

if(isset($_REQUEST['sc'])){ ?>
	<script type='text/javascript'>
		toastr.success('Felicitaciones, la sesión fue cerrada con éxito.');
	</script>
<?php }


if(isset($_REQUEST['e'])){ ?>
	<script type='text/javascript'>
		toastr.error('Error, no existe el correo, por favor verifique.');
	</script>
<?php } 


if(isset($_REQUEST['errorC'])){ ?>
	<script type='text/javascript'>
		toastr.warning('Error, el correo ya existe, por favor verifique.');
	</script>
<?php }



if(isset($_REQUEST['fineS'])){ ?>
	<script type='text/javascript'>
		toastr.success('Felicitaciones, tu cuenta fue creada correctamente.');
		
	</script>
<?php }

?>

