<?
 class Tabela{
    private $id;
    private $notas;
    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
        return $this;
    }
 }
?>