<?php
    //  criando uma conexão com o banco PDO MYSQL
    $conn = new PDO("mysql:dbname=kkkkteste; host=localhost", "root", "" );

    //  criando uma conexão com o banco PDO SQL SERVER
    $conn = new PDO("sqlsrv:Database=dbphp7; server=localhost\SQLEXPRESS; ConnectionPooling", "sa", "" );

    // criando comando pdo sql
    $stmt = $conn->prepare("SELECT * FROM teste");

    //  enviar comando para o banco de dados
    $stmt->execute();

    // traz os dados para vindo do banco
    $results = $stmt->fetchAll();

    // tratamento de dados com o foreach

    // ler a linha
    foreach ($results as $row) {
        // ler a coluna
        foreach ($row as $key => $value) {
            echo "<strong>".$key.":</strong>".$value."<br/>";
        }

    }

    // inserindo dados
    $stmt = $conn->prepare("INSERT INTO teste (campo1, campo2) VALUES (:CAMPO1, :CAMPO2)");

    $campo1 = "teste1";
    $campo2 = "teste2";

    // uni os valores aos campo do parametro de inserção ao banco
    $stmt->bindParam(":campo1", $CAMPO1);
    $stmt->bindParam(":campo2", $CAMPO2);

    $stmt->execute();


    // atualizando dados 
    $stmt = $conn->prepare("UPDATE teste SET campo1 = :CAMPO1, campo2 = :CAMPO2 WHERE id_teste = :ID");

    $campo1 = "teste1";
    $campo2 = "teste2";
    $id = 1;
    // uni os valores aos campo do parametro de inserção ao banco
    $stmt->bindParam(":campo1", $CAMPO1);
    $stmt->bindParam(":campo2", $CAMPO2);
    $stmt->bindParam(":ID", $id);

    $stmt->execute();


    //  apagando banco de dados
    $stmt = $conn->prepare("DELETE FROM teste WHERE id_teste = :ID");
    $stmt->bindParam(":ID", $id);

    $stmt->execute();

    // usando transações
    $conn = beginTransaction();

    $stmt = $conn->prepare("DELETE FROM teste WHERE id_teste = :ID");
    $stmt->bindParam(":ID", $id);

    $stmt->execute();

    // defaz a alteração do banco
    $conn->rollback();

    // confirma a alteração do banco
    $conn->commit();

?>