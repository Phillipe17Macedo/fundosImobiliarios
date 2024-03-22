<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
</head>
<?php
require("Conexao.php");
require("FundoImobiliario.php");

$conexao = new Conexao ("localhost", "3306", "fundo_imobiliario", "aluno", "iftm");

$listaDeFundos = array();

if($conexao->conectar()){

    $resultados = $conexao->executar("SELECT * FROM fundos;");
    foreach($resultados as $resultado){
        $fii = new FundoImobiliario($resultado["nome"], $resultado["ticker"], $resultado["valor"], $resultado["quantidade"], $resultado["data"]);
        array_push($listaDeFundos, $fii);
    }
}

$conexao->desconectar();

?>
<body>
    <div class="container">
        <h1>Lista de Fundos Imobiliários</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ticker</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaDeFundos as $fundo) : ?>
                    <tr>
                        <td><?php echo $fundo->getNome(); ?></td>
                        <td><?php echo $fundo->getTicker(); ?></td>
                        <td><?php echo $fundo->getValor(); ?></td>
                        <td><?php echo $fundo->getQuantidade(); ?></td>
                        <td><?php echo $fundo->getData(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>