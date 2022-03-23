<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    // Se foi enviado via GET para acao entra aqui
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $idE= isset($_GET['idE']) ? $_GET['idE'] : 0;
        excluir($idE);
    }

    // Se foi enviado via POST para acao entra aqui
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $idE= isset($_POST['idE']) ? $_POST['idE'] : "";
        if ($idE== 0){

        require_once "classes/estado_class.php";

            $estado1 = new Estado($_POST['nome'], $_POST['sigla']);

            if ($resultado = $estado1->insere()) {
                header("location:readEstado.php");
            }else{
                echo "Não deu certo...";
            }
    }
}

    /*
    // Métodos para cada operação
    function inserir($idE){
        $dados = dadosForm();

        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('INSERT INTO estado (nome, sigla) VALUES(:nome, :sigla)');
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $nome = $_POST['nome'];

        $stmt->bindParam(':sigla', $sigla, PDO::PARAM_STR);
        $sigla = $_POST['sigla'];
        $stmt->execute();
        header("location:readEstado.php");
    }

    function editar($idE){
        $dados = dadosForm();

        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE estado SET nome = :nome, sigla = :sigla
        WHERE idE= :idE');

        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':sigla', $sigla, PDO::PARAM_STR);
        $stmt->bindParam(':idE', $idE, PDO::PARAM_INT);

        $nome = $dados['nome'];
        $sigla = $dados['sigla'];
        $idE= $dados['idE'];
        $stmt->execute();
        header("location:readEstado.php");
    }

    function excluir($idE){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE from estado WHERE idE= :idE');
        $stmt->bindParam(':idE', $idE, PDO::PARAM_INT);
        $idE = $idE;
        $stmt->execute();
        header("location:readEstado.php");
    }

    // Busca um item pelo código no BD
    function buscarDados($idE){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM estado WHERE idE= $idE");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['idE'] = $linha['idE'];
            $dados['nome'] = $linha['nome'];
            $dados['sigla'] = $linha['sigla'];
        }
        return $dados;
    }

    // Busca as informações digitadas no form
    function dadosForm(){
        $dados = array();
        $dados['idE'] = $_POST['idE'];
        $dados['nome'] = $_POST['nome'];
        $dados['sigla'] = $_POST['sigla'];
        return $dados;
    }
    */
?>
