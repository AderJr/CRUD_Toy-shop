<?php
    require_once ('includes/conectarBD.php');
    $nomeTab = 'brinquedo';
    $resultado = $conexao->query("SHOW TABLES LIKE '$nomeTab'");
    
    if ($resultado->num_rows === 0) {
        // Inserindo comando para criar a tabela necessário, caso não exista.
        $sql = "CREATE TABLE $nomeTab (
            briID INT NOT NULL AUTO_INCREMENT,
            briNome VARCHAR(50) NOT NULL,
            briClassificacao VARCHAR(50) NOT NULL,
            PRIMARY KEY (briID)
        )";
    
        if ($conexao->query($sql) === TRUE) {
            echo "Tabela '$nomeTab' foi criada com sucesso.";
        } else {
            die("Erro ao criar a Tabela: " . $conexao->error);
        }
    }
    //INICIALIZA A SESSÃO
    session_start();

    //SE NÃO TIVER VARIÁVEIS REGISTRADAS
    //RETORNA PARA A TELA DE LOGIN
    if( (!isset($_SESSION['sessaoID'])) AND (!isset($_SESSION['sessaoNome'])) )
    Header("Location: index.php");
?>