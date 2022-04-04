<?php

include "carro.php";

$novoCadastro = new Carro('CBA-412', '1999', true, '2022-03-18 15:00:00', 1500.75);
$novoCadastro->Cadastrar();

$dados = Carro::ListarTodos();
var_dump($dados);