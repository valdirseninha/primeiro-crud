<?php 
require("conn.php");

$tabela = $pdo->prepare("SELECT * FROM cad_produtos ORDER BY nome_produto ASC");
$tabela->execute();
$restabela = $tabela->rowCount();
$rowtabela = $tabela->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Cadastro de produtos</title>
</head>
<body>


<div class="container">
	<br>
	<h1 align="center">Tabela de Produtos</h1>
	<br>
  <?php if($restabela > 0) { ?>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">ID do produto</th>
      <th scope="col">Nome do produto</th>
      <th scope="col">Quantidade do produto</th>
      <th scope="col">Valor do produto</th>
      <th scope="col">Categoria do produto</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $num = 1;
    foreach ($rowtabela as $linha) {
    
    ?>
    <tr>
      <th><?= $linha['id'] ?></th>
      <td><?= $linha['nome_produto'] ?></td>
      <td><?= $linha['qtde_produto'] ?></td>
      <td><?= $linha['valor_produto'] ?></td>
      <td><?= $linha['categoria_produto'] ?></td>
      <td>
        <a href="edit_tabela.php?produto=<?= $linha['id'] ?>" class="material-icons text-warning">edit</a>
        <a id="<?= $linha['id']  ?>" class="material-icons text-danger deletar">delete</a>

      </td>
    </tr>
    <?php 
    $num++;
    } 
    ?>
  </tbody>
</table>
<?php }else {?>
    <div class="alert alert-primary" role="alert">Nenhum produto cadastrado :(</div>
<?php } ?>
</div>
    <div class="form-group">
    <div class="container">
      <a href="index.php" class="btn btn-primary float-left">CADASTRAR PRODUTO</a>
    </div>
    <div id="linkResultado"></div>
    </div>




<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>
  
  $(document).on('click', '.deletar', function(){
    
    var prod = $(this).attr('id');
      
    Swal.fire({
      title: 'Você deseja deletar o produto?',
      text: 'Você não poderá recuperar após a exclusão',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor:'#d33',
      confirmButtonText: 'Sim, deletar!'
    }).then((result) => {
      if(result.isConfirmed){
        jQuery.ajax({
        type: "POST",
        url: "delet_prod.php",
        data: {prod:prod},
        success: function(data)
        {
          $("#linkResultado").html(data);
        }
      });
        
        Swal.fire(
          'Deletado',
          'Atualizando...',
          'success'
          )
      }

    });

      
  });

</script>
</body>
</html>