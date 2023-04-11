<?php
 abstract class Crud{
 protected $tabela;
 public abstract function inserir();
 public abstract function atualizar($campo, $id);

 public function listar(){
    $sqlSelect = "SELECT * from {$this->tabela}";
    return Conexao::query($sqlSelect);
 }

 public function buscar($campo, $id){
   $selectSql = "SELECT * FROM {$this->tabela} WHERE $campo = {$id}";
   $dados = Conexao::query($selectSql);
   return $dados -> fetch_object();
 }

 public function deletar($campo, $id){
   $deleteSql = "DELETE FROM {$this->tabela} WHERE $campo = {$id}";
   return Conexao::query($deleteSql);
 }



 }