<?php
    class Conexao{
        private $host = 'localhost';
        private $dbname = 'blocodenotas';
        private $user = 'root';
        private $senha = '';

        public function conectar(){
            try{
                $conexao = new PDO("mysql:host=$this->host;dbname=$this->dbname","$this->user","$this->senha");
                return $conexao;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }
?>