<?php 
require("conn.php");

$prod = $_POST['prod'];

if(empty($prod)){
	echo "Erro";
	header("Location: ../index.php?err");
}else{

	$deleta = $pdo->prepare("DELETE FROM cad_produtos WHERE id = :deleta");
	$deleta->execute(array(
		':deleta' => $prod
	));


	echo "<script>setTimeout(function(){ window.location.href = 'tabela.php?deletado';},500);</script>";


}


?>