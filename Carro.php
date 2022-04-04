<?php

include "Conexao.php";

class Carro {
        private int $id;
        private string $placa;
        private int $ano;
        private bool $ipvaPago;
        private string $ipvaData;
        private float $ipvaValor;
        
        public function __construct(string $placa, int $ano, bool $ipvaPago, string $ipvaData, float $ipvaValor) {
            $this->placa = $placa;
            $this->ano = $ano;
            $this->ipvaPago = $ipvaPago;
            $this->ipvaData = $ipvaData;
            $this->ipvaValor = $ipvaValor;
        }
        
        public function Cadastrar() {
            $conexao = new Conexao();
            $sql = "insert into 
            carro (placa, ano, ipva_pago, ipva_data, ipva_valor)
            values (:placa, :ano, :ipva_pago, :ipva_data, :ipva_valor)";
            $pdo = $conexao->Conectar();
            $preparo = $pdo->prepare($sql);
            $preparo->bindParam(':placa', $this->placa);
            $preparo->bindParam(':ano', $this->ano);
            $preparo->bindParam(':ipva_pago', $this->ipvaPago);
            $preparo->bindParam(':ipva_data', $this->ipvaData);
            $preparo->bindParam(':ipva_valor', $this->ipvaValor);
            $preparo->execute();
        }

        public static function ListarTodos() {
            $conexao = new Conexao();
            $sql = "select * from carro;";
            $dados = $conexao->Consultar($sql);
            return $dados;
        }
}

