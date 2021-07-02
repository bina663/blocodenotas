<?
    require_once 'class/tabela.php';
    require_once 'class/conexao.php';
    require_once 'class/crud.php';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'create'){
        $tabela = new Tabela();
        $conexao = new Conexao();
        if(!empty($_POST['nota'])){
            $tabela->__set("notas",$_POST['nota']);
            $crud = new Crud($conexao,$tabela);
            $crud->create();
        }
        header("Location:../index.php");
    }
    if($acao == 'read'){
        $tabela = new Tabela();
        $conexao = new Conexao();
        $crud = new Crud($conexao,$tabela);
        $notas = $crud->read();
    }
    if($acao == 'update'){
        if(!empty($_POST['nota'])){
            $tabela = new Tabela();
            $tabela->__set('id',$_GET['id']);
            $tabela->__set('nota',$_POST['nota']);
            $conexao = new Conexao();
            $crud = new Crud($conexao,$tabela);
            $crud->update();
        }
        header("Location:../index.php");
    }
    if($acao == 'del'){
        $tabela = new Tabela();
        $tabela->__set('id',$_GET['id']);
        $conexao = new Conexao();
        $crud = new Crud($conexao,$tabela);
        $crud->del();
        header('Location:index.php');
    }
?>