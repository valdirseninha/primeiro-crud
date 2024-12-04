<?php 
require("conn.php");

$nome_produto = $_POST['prod_nome'];
$quantidade = $_POST['qnt_prod'];
$valor = $_POST['val_prod'];
$categoria = $_POST['categ_prod'];


if(empty($nome_produto) || empty($quantidade) || empty($valor) || empty($categoria)){
	echo "Você precisa preencher todos os campos";
	die;
}else {

	$cad_produto = $pdo->prepare("INSERT INTO cad_produtos (nome_produto, qtde_produto, categoria_produto, valor_produto) VALUES (:nome_produto, :qtde_produto, :categoria_produto, :valor_produto)");
	$cad_produto->execute(array(
		':nome_produto' => $nome_produto,
		':qtde_produto' => $quantidade,
		':categoria_produto' => $categoria,
		':valor_produto' => $valor
	));

	echo "<script>Swal.fire(
  	'Bom trabalho!',
  	'Produto cadastrado com sucesso!',
  	'success'
)</script>";

}

?>