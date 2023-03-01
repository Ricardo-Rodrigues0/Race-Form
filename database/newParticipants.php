<?php
// Inclui o arquivo de conexão com o banco de dados
include("connection.php");

// Verifica se todos os campos foram preenchidos corretamente
if (isset($_POST['participantsName'], $_POST['participantsCpf'], $_POST['participantsAge'], $_POST['participantsBirth'], $_POST['participantsTel'], $_POST['participantsGenre'])) {
    
    //Variáveis onde irá armazenar os valores recebidos pelo POST
    $participantsName = mysqli_real_escape_string($conn, trim($_POST['participantsName']));
    $participantsCpf = mysqli_real_escape_string($conn, trim($_POST['participantsCpf']));
    $participantsAge = mysqli_real_escape_string($conn, trim($_POST['participantsAge']));
    $participantsBirth = mysqli_real_escape_string($conn, trim($_POST['participantsBirth']));
    $participantsTel = mysqli_real_escape_string($conn, trim($_POST['participantsTel']));
    $participantsGenre = mysqli_real_escape_string($conn, trim($_POST['participantsGenre']));
    
    $sql = "INSERT INTO $dbParticipanats (participantsName, participantsCpf, participantsAge, participantsBirth, participantsTel, participantsGenre, registrationDate) VALUES ('$participantsName', '$participantsCpf', '$participantsAge', '$participantsBirth', '$participantsTel', '$participantsGenre', NOW())";
    
    // Executa a query e redireciona para a página principal
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header('Location: ../index.html');
        exit();
    } else {
        echo "Erro ao inserir os dados no banco de dados.";
        exit();
    }
}