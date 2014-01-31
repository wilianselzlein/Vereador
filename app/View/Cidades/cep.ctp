<?php
Configure::write('debug', 0);
$dados['cep'] = (string) $cep['Cidade']['cep'];
echo json_encode($dados); 
//echo $dados['cep'];
?>