<?php
 abstract class Crud{
 protected $tabela;
 public abstract function inserir();
 public abstract function atualizar($campo, $id);

 public function listar(){
    $sqlSelect = "SELECT * from {$this->tabela}";
    return Conexao::query($sqlSelect);
 }
 }