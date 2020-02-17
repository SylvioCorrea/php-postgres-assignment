<?php

class TipoProduto {
    public $id;
    public $descricao;
    public $percentualImposto;

    public function __construct($id, $descricao, $percentualImposto) {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->percentualImposto = $percentualImposto;
    }
}

class Produto {
    public $id;
    public $descricao;
    public $idTipoProduto;
    public $quantidade;
    public $valorUnitario;

    public function __construct($id, $descricao, $idTipoProduto, $quantidade, $valorUnitario) {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->idTipoProduto = $idTipoProduto;
        $this->quantidade = $quantidade;
        $this->valorUnitario = $valorUnitario;
    }
}

class Eletroeletronico extends Produto{
    public function valorVenda() {
        return $this->valorUnitario * 1.1;
    }
}

class Eletrodomestico extends Produto{
    public function valorVenda() {
        return $this->valorUnitario;
    }
}


?>