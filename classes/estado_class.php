<?php 
class Estado{
    private $idE;
    private $nome;
    private $sigla;

    public function __construct($nm,$sig){
        echo "Criando objeto...\n";
      
        $this->nome = $nm;
        $this->sigla = $sig;
    }

    /*
    public function __toString(){
        $str = "Nome da cidade: ".$this->nome."\n ID do estado: ".$this->sigla;
        return $str;
    }
    */

    public function insere(){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('INSERT INTO estado (nome, sigla) VALUES(:nome, :sigla)');
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':sigla', $this->sigla, PDO::PARAM_STR);
        return $stmt->execute();
    }

}
    /*
    public function mostrarNome(){
            return $this->nome;
    }
}

$estado1 = new Estado("Paraná", "PR");
$estado2 = new Estado("Rio Grande do Sul", "RS");
$estado3 = new Estado("Santa Catarina", "SC");
$estado4 = new Estado("São Paulo", "SP");

echo $estado1;
echo "\n \n";
echo $estado2;
echo "\n \n";
echo $estado3;
echo "\n \n";
echo $estado4;
*/
?>