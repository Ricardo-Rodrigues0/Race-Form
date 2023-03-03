<!-- Inclui o arquivo de conexão com o banco de dados -->
<?php include_once("./database/connection.php"); ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Corrida | Participantes</title>

  <!-- Carrega o arquivo de estilo que define a aparência da página. -->
  <link rel="stylesheet" href="./assets/css/styleParticipants.css">

  <!-- Carrega o favicon da página exibido na guia do navegador. -->
  <link rel="icon" type="image/x-icon" href="./assets/image/favicon.png">

  <!-- Carrega a biblioteca Bootstrap, um framework popular para criar páginas da web responsivas. -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>
  <div class="loader"></div>
  <div class="load"></div>
  <div class="main">
    <div class="text_card">
      <h1>Participantes da corrida</h1>
      <a href="index.html" class="btn_submit">Formulário</a>
    </div>
    <!-- Card onde irão aparecer os participantes da corrida -->
    <div class="col-md-9 mt-3">
      <div class="row">
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM $dbParticipants ORDER BY id ASC");

        // IF para caso não retorne nada do $resultado_products (nenhum produto encontrado no bando de dados) seja exibida a mensagem abaixo
        if (mysqli_num_rows($sql) == 0) {
          echo '<h1>Nenhum participante encontrado</h1>';
        } else {

          while ($aux = mysqli_fetch_assoc($sql)) { ?>

            <div class="col-md-3">
              <div class="sidebar-module">
                <div class="main_card">
                  <div class="card">
                    <h1 class="participants_name"><strong> <?php echo $aux["participantsName"], ' #', $aux["id"]; ?> </strong> </h1><br />
                    <?php
                    $imagem = '';
                    if ($aux["participantsGenre"] == 'Masculino') $imagem = './assets/image/homem.png';
                    else if ($aux["participantsGenre"] == 'Feminino') $imagem = './assets/image/mulher.png';
                    else if ($aux["participantsGenre"] == 'Outro') $imagem = './assets/image/outro.png';
                    if (file_exists($imagem) !== true) $imagem = './assets/image/image_404.png';
                    ?>
                    <img src="<?php echo $imagem; ?>" style="width: 10vw; display: flex; align-items: center; justify-content: center;" class="card-img-top" alt="Imagem participante">
                    <div class="card-body">
                      <h5 class="card-title" _msthash="2950259" _msttexthash="307684">• <u>Informações do participante</u></h5><br />
                      <p class="card-text" _msthash="2874352" _msttexthash="10912447">
                        <strong>‣ Nome:</strong> <?php echo $aux["participantsName"]; ?> <br />
                        <strong>‣ CPF:</strong> <?php echo '***.***.' . explode(".", $aux["participantsCpf"])[2]; ?> <br />
                        <strong>‣ Idade:</strong> <?php echo $aux["participantsAge"]; ?> <br />
                        <strong>‣ Data nascimento:</strong> <?php echo date('d/m/Y', strtotime($aux["participantsBirth"])); ?> <br />
                        <strong>‣ Telefone:</strong> <?php echo $aux["participantsTel"]; ?> <br />
                        <strong>‣ Gênero:</strong> <?php echo $aux["participantsGenre"]; ?> <br />
                    </div>
                    <div class="card-footer">
                      <small class="text-muted"><strong>Inscrição feita dia <?php echo date('d/m/Y', strtotime($aux['registrationDate'])) . ' às ' . date('H:i', strtotime($aux['registrationDate'])); ?></strong></small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <?php }
        } ?>
      </div>
    </div>
  </div>
</body>
<!-- Importando um arquivo JS para dentro do projeto | Ele pode conter funções personalizadas, manipulação de eventos e outras funcionalidades específicas do projeto. -->
<script src="./assets/js/main.js"></script>

</html>