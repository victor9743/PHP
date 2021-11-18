<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista 1 de 10 exercicios</title>
</head>
<body>
    <h2>Lista com 10 exercícios em PHP</h2>
    <hr>

    <h2>Exercicio 1</h2>

    <h3>Crie um algoritmo que receba um número digitado pelo usuário e verifique se esse valor é positivo, negativo ou igual a zero. 
        A saída deve ser: "Valor Positivo", "Valor Negativo" ou "Igual a Zero".</h3>
        <?php
            $numero_recebido = 10;

            echo "Numero Recebido $numero_recebido </br>" ;
            if($numero_recebido >0){
                echo "Número Positivo";
            }else if($numero_recebido<0){
                echo "Número Negativo";
            }else{
                echo "Igual a Zero";
            }
        ?>
    
    <h2>Exercicio 2</h2>

    <h3>Crie um algoritmo que solicite a entrada de um número, e exiba a tabuada de 0 a 10 de acordo com o número solicitado, ex: 
    Entrada = 4</h3>

        <?php
            $numero = 5;
    
            for($y=0; $y<=10; $y++ ){

                echo "$numero * $y = ". ($numero * $y). "</br>";

            }
           

        ?>

    <h3>Crie um algoritmo que solicite um número, e faça o cálculo fatorial do mesmo, exiba o resultado na tela.</h3>

            <?php
                $numero = 5;

                if($numero >0){
                    $valor = $numero;

                    for($i = ($valor-1); $i>0; $i--){

                        $valor = $valor *$i;
                    }
                }else{
                    $valor =0 ;
                }

                echo "!{$numero} = {$valor}";
            ?>
    <h3>Crie um programa em que o usuário escolha uma operação (soma, subtração, multiplicação ou divisão).</h3>
    <?php
        // recebendo os valores do form
        $num01 = filter_input(INPUT_POST,"num1");
        $num02 = filter_input(INPUT_POST, "num2");
        $op = filter_input(INPUT_POST, 'operacao');
        $resultado = "";

        switch($op){

            case "+":
                $resultado = $num01 + $num02;
            break;

            case "-":
                $resultado = $num01 - $num02;

            break;

            case "*":
                $resultado = $num01 * $num02;
            break;

            case "/":
                $resultado = $num01 / $num02;
            break;
            
            default:
                
            break;
        }

    ?>
    
    <h4>Resultado: <?= $resultado ?></h4>
    <form method="post">
        <label for="num1">Valor 1</label><br>
        <input type="number" name="num1"><br>

        <label for="num2">Valor 2</label><br>
        <input type="number" name="num2">

        <label for="operacao"></label><br>
        <select name="operacao">
            <option value="+">Adição</option>
            <option value="-">Subtração</option>
            <option value="*">Multiplicação</option>
            <option value="/">Divisão</option>
        </select><br>

        <input type="submit" value="Calcular" name="calcular">

    </form>

    <?php
        $numero  = filter_input(INPUT_POST,"num");
        $verif= "";
        if($numero%2 == 0 && $verif != ""){
            $verif = "O Número é Par";
        }else if($numero%2 != 0){
            $verif = "O Número é impar";
        }
    ?>

    <h2>Solicite a entrada de um número e descubra se um número digitado é par ou ímpar.</h2>
    <form method="post">
        <label for="num01">Digite um Número</label><br>
        <input type="number" name="num"><br>

        <input type="submit" value="enviar">
    </form>

    <h4>Resultado <?= $verif?></h4>



    <h2> Faça um algoritmo PHP que receba os valores A e B, imprima-os em ordem crescente em relação aos seus valores.</h2>

    <?php 
        $num1= filter_input(INPUT_POST, "num1");
        $num2= filter_input(INPUT_POST, "num2");
        $crescrente= "";

        if($num1 > $num2){
            $crescrente = "$num2 , $num1";
        }else if($num2 > $num1){
            $crescrente = "$num1 $num2";
        }
        
    ?>

    <form method="post">
        <label for="">Digite 2 números nos campos abaixo</label>
        <input type="number" name="num1">
        <input type="number" name="num2"><br>

        <input type="submit" value="Ordenar">
    </form>

    <h4>Números ordenados de forma crescente: <?= $crescrente ?></h4>

    <h2>
        Faça um algoritmo em PHP onde verifica se o valor da variável 
        A é maior ou menor que o valor da variável B. A mensagem a ser 
        impressa deve ser “A maior que B” ou “A menor que B”.
    </h2>

    <?php
        $a=3;
        $b=3;
        if($a>$b){
            echo "'A' maior que 'B'";
        }else if($b>$a){
            echo "'A' menor que 'B'";
        }else{
            echo 'Números iguais';
        }
    ?>
    <h2>
        Crie um algoritmo para calcular a média final de um aluno, para isso, solicite a entrada de três 
        notas e as insira em um array, por fim, calcule a média geral. Caso a média seja maior ou igual a seis, 
        exiba aprovado, caso contrário, exiba reprovado. Exiba também a média final calculada.
    </h2>

    <?php
        $nota1 = filter_input(INPUT_POST, "num1");
        $nota2 = filter_input(INPUT_POST, "num2");
        $nota3 = filter_input(INPUT_POST, "num3");
        $media = ($nota1 + $nota2 + $nota3)/3;
        $situacao ="";

        if($media>= 6){
            $situacao = "Aprovado";
        }
        else{
            $situacao = "Reprovado";
        }  
    ?>

    <form method="post">

        <label>Nota 1</label><br>
        <input type="number" name="num1"><br>
        <label> Nota 2</label><br>
        <input type="number" name="num2"><br>
        <label> Nota 2</label><br>
        <input type="number" name="num3"><br>

        <input type="submit" value="calcular">
    </form>

    <h4>Aluno <?= $situacao ?> Média <?= $media ?></h4>

    
</body>
</html>