<?php
// Define as constantes de conexão com o banco de dados
$dbHost = "127.0.0.1";
$dbUser = "root";
$dbPassword = "";
$dbDatabase = "race";

// Variáveis para difinir os nomes das tabelas
$dbParticipants = "participants"; //Tabela de participantes

$conn = new mysqli($dbHost, $dbUser, $dbPassword);
$conn->set_charset('utf8');

// Verifica se houve erro na conexão
if ($conn->connect_errno) {
    echo "ERRO! Não foi possível realizar a coneção com o banco de dados";
}

// Cria o esquema do banco de dados se ele não existir
$query_create_schema = "CREATE SCHEMA IF NOT EXISTS $dbDatabase";
$result_create_schema = $conn->query($query_create_schema) or die("ERRO! Não foi possível criar sua database ($dbDatabase)  -> " . $conn->connect_error);


// Conecta ao banco de dados e selecionando a database
$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbDatabase);
$conn->set_charset('utf8');

// ==================================================================================

// Criando a tabela produtos se ela não existir no banco de dados
$query_create_table = "CREATE TABLE IF NOT EXISTS $dbParticipants (
    id INT NOT NULL AUTO_INCREMENT,
    participantsName VARCHAR(200) NOT NULL,
    participantsCpf VARCHAR(32) NOT NULL,
    participantsAge VARCHAR(32) NOT NULL,
    participantsBirth VARCHAR(32) NOT NULL,
    participantsTel VARCHAR(32) NOT NULL,
    participantsGenre VARCHAR(32) NOT NULL,
    visualization VARCHAR(32) NOT NULL DEFAULT 0,
    registrationDate DATETIME NOT NULL,
    PRIMARY KEY (`id`))";

$result_create_table = $conn->query($query_create_table) or die("ERRO! Não foi possível criar tabela ($dbParticipants)  -> " . mysqli_error($conn));

// Obtém o ID do participante da solicitação POST enviada pelo modal
$participant_id = $_POST['participant_id'];

// Atualiza o número de visualizações do perfil do participante no banco de dados
$sql2 = "UPDATE participants SET visualization = visualization + 1 WHERE id = $participant_id";
$result = mysqli_query($conn, $sql2);