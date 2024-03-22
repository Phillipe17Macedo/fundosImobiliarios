<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>


<?php
require("Conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta os dados do formulário
    $nome = $_POST['nome'];
    $ticker = $_POST['ticker'];
    $valor = $_POST['valor'];
    $quantidade = $_POST['quantidade'];
    $data = $_POST['data'];
    // Valida os dados do formulário
    if (empty($nome)) {
        echo 'O nome é obrigatório.';
    }
    else if (empty($ticker)) {
        echo 'É necessário informar ticker.';
    }
    else if (empty($valor)) {
        echo 'É necessário informar valor.';
    }
    else if (empty($quantidade)) {
        echo 'É necessário informar valor.';
    }
    else if (empty($data)) {
        echo 'É necessário informar data.';
    }
    else if (!filter_var($quantidade, FILTER_VALIDATE_INT)) {
        echo 'É necessário informar valor inteiro.';
    } else {
        $conexao = new Conexao ("localhost", "3306", "fundo_imobiliario", "aluno", "iftm");
        print("INSERT INTO fundos (nome, ticker, valor, quantidade, data)
        VALUES ('{$nome}', '{$ticker}', '{$valor}', '{$quantidade}', '{$data}')");

        if($conexao->conectar()) {
            $resultados = $conexao->executar("INSERT INTO fundos (nome, ticker, valor, quantidade, data)
            VALUES ('{$nome}', '{$ticker}', '{$valor}', '{$quantidade}', '{$data}')");
            header('Location: listar.php');
        }
    } 
    echo "Dados de cadastro:</br>";
    echo $nome . "</br>" .   $ticker . "</br>" . $valor .  "</br>" . $quantidade .  "</br>" . $data;
} 
    

?>
<body>
    <div class="container">
        <form role="form" class="mt-5" method="post" action="cadastrarForm.php">
            <div class="form-group row">
                <label for="inputNome" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Nome">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputTicker" class="col-sm-2 col-form-label">Ticker</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputTicker" name="ticker" placeholder="Ticker" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputValor" class="col-sm-2 col-form-label">Valor</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputValor" name="valor" placeholder="Valor R$" required step="any">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputQuantidade" class="col-sm-2 col-form-label">Quantidade de cotas</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputQuantidade" name="quantidade" placeholder="Quantidade de cotas" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputData" class="col-sm-2 col-form-label">Data da compra</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="inputData" name="data" placeholder="Data da compra" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <input type="submit" value="Cadastrar Compra" name="submit" class="btn btn-primary" />
                </div>
            </div>
        </form>
    </div>
</body>