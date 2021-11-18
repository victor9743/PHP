<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - básico</title>
</head>
<body>
    <h2>PHP - básico</h2>
    <p>
        O objetivo principal desse arquivo serve para mostrar alguns comandos básicos que são utilizados
        em php. Não irei trabalhar com estilos, css nesta página. O foco é apenas em php. ;-)
    </p>

    <h2>Saídas de Dados</h2>

    <h4>Saída de Dados</h4>
    <?php
        echo "Esse é um exemplo de saída de dados ( echo ) <br>"; 
        print "Esse é um exemplo de saída de dados ( print )";
    ?>

    <h4>Variáveis</h4>

    <?php

        // string
        $string = "variável do tipo string";
        // inteiro
        $inteiro = 10;
        // decimal
        $decimal = 9.79;
        // boolean
        $logico = true;


        echo "string: $string </br>
              inteiro: $inteiro </br>
              decimal: $decimal </br>";
            
        echo ($logico ? "lógico: true":"lógico: false");
    ?>

    <h4>Condicionais if/else/else if</h4>

    <?php
        $nota1= 10;
        $nota2 = 10;

        $media = ($nota1 + $nota2 )/ 2;

        if($media >= 7){
            echo "Aprovado";
        }else if($media >= 5 && $media < 7){
            echo "Recuperação";
        }else{
            echo "Reprovado";
        }
    ?>

    <h4>laços de repetição for/while/foreach</h4>

    <?php

        echo "For </br>";
        for($x=0; $x<=5; $x++){
            echo "$x </br>";
        }

        echo "While </br>";
        $contador = 0;

        while($contador <=5){
            echo "$contador </br>";

            $contador++;
        }

        echo "Foreach </br>";
        $arr = array(1,2,3,4);

        foreach($arr as $item_do_array){
            $item_do_array = $item_do_array * 2;

            echo "$item_do_array </br>";
        }

    ?>
    <h4>Funções</h4>

    <?php
        function mensagem(){
            echo "Hello Wolrd </br>";
        }

        mensagem();

        function aumento($salario){

            if($salario <= 1000){
                return $salario= $salario + ($salario * 10) /100 ;
            }else if($salario > 1000 && $salario <=1500){
                return $salario= $salario + ($salario * 5) /100 ;
            }else{
                return $salario= $salario + ($salario * 2) /100 ;
            }

        }

        echo aumento(2000);

    ?>
    <h4>Switch</h4>
    
    <?php
        $opcao = 1;

        switch($opcao){
            case 1:
                echo "Opção 1</br>";
                break;
            default:
                echo "Opção Inválida</br>";
                break;

        }

    ?>

    <?php
        $numeros = array();

        $x=5;
        while($x>=count($numeros)){
            $ale = rand(1,6);
            
            if(!in_array($ale, $numeros)){
                array_push($numeros, $ale);
              
            }
            
        }
        
         print_r($numeros);
       
    ?>
            
</body>
</html>