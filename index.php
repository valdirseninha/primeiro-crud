<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Cadastro de produtos</title>
</head>
<body>


<div class="container">
	<br>
	<h1 align="center">Cadastro de Produtos</h1>
	<br>
	<form action="" method="POST" id="formulario">
		<div class="form-group">
		<div class="col-md-6 offset-md-3">
			<label>Nome do produto</label>
			<input type="text" name="prod_nome" class="form-control">
		</div>
		</div>
		
		<div class="form-group">
		<div class="col-md-6 offset-md-3">
			<label>Quantidade do produto</label>
			<input type="text" name="qnt_prod" class="form-control">
		</div>
		</div>
		
		<div class="form-group">
		<div class="col-md-6 offset-md-3">
			<label>Valor do produto</label>
			<input type="text" name="val_prod" class="form-control">
		</div>
		</div>
		
		<div class="form-group">
		<div class="col-md-6 offset-md-3">
			<label>Categoria do produto</label>
			<input type="text" name="categ_prod" class="form-control">
		</div>
		</div>
		<br>
		<div class="form-group">
		<div class="col-md-6 offset-md-3">
			<input type="submit" value="CADASTRAR" class="btn btn-success">
			<a href="tabela.php" class="btn btn-primary float-right">VISUALIZAR PRODUTOS</a>
		</div>
		</div>
	</form>	
	<div id="linkResultado"></div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
		jQuery('#formulario').submit(function () {
			event.preventDefault();
			var dados = jQuery(this).serialize();

			jQuery.ajax({
				type: "POST",
				url: "cad_prod.php",
				data: dados,
				success: function (data)
				{
					$("#linkResultado").html(data);
				}
			});

			return false;
		});

	</script>
</body>
</html>