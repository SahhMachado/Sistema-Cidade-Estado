<?php 
class Cidade{
    private $idC;
    private $nome;
    private $idE;

    public function __construct($nm,$iE){
        echo "Criando objeto...\n";
        
        $this->nome = $nm;
        $this->idE = $iE;
    }

    /*
    public function __toString(){
        $str = "Nome da cidade: ".$this->nome."\n ID do estado: ".$this->idE;
        return $str;
    }
    */

    public function insere(){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('INSERT INTO cidade (nome, idE) VALUES(:nome, :idE)');
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':idE', $this->idE, PDO::PARAM_STR);
        return $stmt->execute();
    }
}

/*
$cidade1 = new Cidade("Rio do Sul", 3);
$cidade2 = new Cidade("Lages", 3);
$cidade3 = new Cidade("Porto Alegre", 2);
$cidade4 = new Cidade("São Paulo", 4);
*/
?>