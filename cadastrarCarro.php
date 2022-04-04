<?php

$dados = $_POST;
var_dump($dados);

include "Carro.php";

extract($_POST);

$chkIpvaPago = isset($_POST['chkIpvaPago']);

$novoCadastro = new Carro($POST['txtPlaca'], $POST['txtAno'], $chkIpvaPago, $POST['txtDataIPVA'], $POST['txtValorIPVA']);

$novoCadastro->Cadastrar();