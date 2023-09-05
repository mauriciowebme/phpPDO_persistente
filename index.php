<?php
require_once "conexao.php"; 
$conn = Conexao::getInstance();
$sql = "
    SELECT *
    FROM tabela;
    ";
$result = $conn -> query($sql);
$rows = $result-> fetchAll();
$Versão = "";
foreach ($rows as $fetch) {
    $Versão .= $fetch[1];
}
echo $versao;
?>