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

  <!-- Carrega a biblioteca de ícones Bootstrap, que fornece ícones vetoriais escaláveis. -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
  <div class="main-loader">
    <div class="loader"></div>
    <div class="load"></div>
  </div>
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
                    <!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" title="Visualizar participante">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-octagon" viewBox="0 0 16 16">
                        <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z" />
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                      </svg>
                    </button> -->
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Visualizar participante">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-octagon" viewBox="0 0 16 16">
                        <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z" />
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                      </svg>
                    </button>

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

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title mr-4 text-center">VISUALIZAR PARTICIPANTES</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p><strong>ID</strong> <?php echo $aux['id']; ?></p>
          <p><strong>Participantes</strong> <?php echo $aux['participantsName']; ?></p>
        </div>
      </div>
    </div>
  </div>


  <script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
      myInput.focus()
    })
  </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<!-- Importando um arquivo JS para dentro do projeto | Ele pode conter funções personalizadas, manipulação de eventos e outras funcionalidades específicas do projeto. -->
<script src="./assets/js/main.js"></script>

</html>