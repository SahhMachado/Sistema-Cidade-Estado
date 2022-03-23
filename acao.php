<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    // Se foi enviado via GET para acao entra aqui
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $idC= isset($_GET['idC']) ? $_GET['idC'] : 0;
        excluir($idC);
    }

    // Se foi enviado via POST para acao entra aqui
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $idC= isset($_POST['idC']) ? $_POST['idC'] : "";
        if ($idC == 0){
            require_once "classes/cidade_class.php";

            $cidade1 = new Cidade($_POST['nome'], $_POST['idE']);

            if ($resultado = $cidade1->insere()) {
                header("location:readCidade.php");
            }else{
                echo "Não deu certo...";
            }
        }
    }


    
/*
    // Métodos para cada operação
    function inserir($idC){
        $dados = dadosForm();

        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('INSERT INTO cidade (nome, idE) VALUES(:nome, :idE)');
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $nome = $_POST['nome'];

        $stmt->bindParam(':idE', $idE, PDO::PARAM_STR);
        $idE = $_POST['idE'];
        $stmt->execute();
        header("location:readCidade.php");
    }

    function editar($idC){
        $dados = dadosForm();

        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE cidade SET nome = :nome, idE = :idE
        WHERE idC= :idC');

        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':idE', $idE, PDO::PARAM_STR);
        $stmt->bindParam(':idC', $idC, PDO::PARAM_INT);

        $nome = $dados['nome'];
        $idE = $dados['idE'];
        $idC= $dados['idC'];
        $stmt->execute();
        header("location:readCidade.php");
    }

    function excluir($idC){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE from cidade WHERE idC= :idC');
        $stmt->bindParam(':idC', $idC, PDO::PARAM_INT);
        $idC = $idC;
        $stmt->execute();
        header("location:readCidade.php");
    }

    // Busca um item pelo código no BD
    function buscarDados($idC){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM cidade WHERE idC= $idC");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['idC'] = $linha['idC'];
            $dados['nome'] = $linha['nome'];
            $dados['idE'] = $linha['idE'];
        }
        return $dados;
    }

    // Busca as informações digitadas no form
    function dadosForm(){
        $dados = array();
        $dados['idC'] = $_POST['idC'];
        $dados['nome'] = $_POST['nome'];
        $dados['idE'] = $_POST['idE'];
        return $dados;
    }
    */
?>

