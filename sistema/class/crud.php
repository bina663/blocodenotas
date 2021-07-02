<?
    class Crud{
        private $conexao;
        private $tabela;
        public function __construct(Conexao $conexao, Tabela $tabela){
            $this->conexao = $conexao->conectar();
            $this->tabela = $tabela;
        }
        public function create(){
            $query = 'INSERT INTO notas(nota) Values(:nota)';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":nota", $this->tabela->__get("notas"));
            $stmt->execute();
        }
        public function read(){
            $query = 'SELECT * FROM notas';
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function update(){
            $query = 'UPDATE notas SET nota = :nota WHERE id = :id';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nota', $this->tabela->__get("nota"));
            $stmt->bindValue(':id', $this->tabela->__get("id"));
            $stmt->execute();
        }
        public function del(){
            $query = 'DELETE FROM notas WHERE id = :id';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id', $this->tabela->__get("id"));
            $stmt->execute();
        }
    }
?>