//Animação de loader ao entrar em uma página web e altenar texto enquando a página e carregada.
setTimeout(function () {
  document.querySelector(".loader").style.display = "none";
  document.querySelector(".load").style.display = "none";
  document.querySelector(".main").style.display = "block";
}, 5 ); // 5000

let loadingText = document.querySelector(".load");
let loadingMessages = [
  "Carregando dodos participantes",
  "Finalizando carregamento",
];
let index = 0;
let maxIndex = loadingMessages.length - 1;

let intervalId = setInterval(function () {
  loadingText.innerText = loadingMessages[index];
  if (index === maxIndex) {
    clearInterval(intervalId);
  }
  index++;
}, 2000);

// =================================================================

//Animação no botão de fazer inscrição antes de ser enviado o formulário
let isFormSubmitted = false;

const submitButton = document.querySelector("#submit-button");
submitButton.addEventListener("click", handleSubmitButtonClick);

function handleSubmitButtonClick() {
  if (isFormSubmitted) {
    return;
  }

  isFormSubmitted = true;

  const form = document.querySelector("form");
  const originalText = submitButton.innerText;
  submitButton.innerText = "Salvando incrição";
  submitButton.classList.add("loading");

  setTimeout(() => {
    submitButton.innerText = originalText;
    submitButton.classList.remove("loading");
    form.submit();
    isFormSubmitted = false;
  }, 3000);
}

// =================================================================

// 
function updateModal(button) {
  var modal = document.getElementById('exampleModal');
  var img = modal.querySelector('.card-img-top');
  var id = modal.querySelector('#participant-id');
  var name = modal.querySelector('#participant-name');
  var cpf = modal.querySelector('#participant-cpf');
  var age = modal.querySelector('#participant-age');
  var birth = modal.querySelector('#participant-birth');
  var tel = modal.querySelector('#participant-tel');
  var genre = modal.querySelector('#participant-genre');

  img.src = button.dataset.imagem;
  id.innerText = button.dataset.participantId;
  name.innerText = button.dataset.participantName;
  cpf.innerText = button.dataset.participantCpf;
  age.innerText = button.dataset.participantAge;
  birth.innerText = button.dataset.participantBirth;
  tel.innerText = button.dataset.participantTel;
  genre.innerText = button.dataset.participantGenre;

  // Obtém o ID do participante do botão clicado
var participant_id = button.dataset.participantId;

// Cria um objeto FormData para enviar os dados POST
var data = new FormData();
data.append('participant_id', participant_id);

// Envia a solicitação POST para o servidor
var xhr = new XMLHttpRequest();
xhr.open('POST', 'database/connection.php');
xhr.onload = function() {
  if (xhr.status === 200) {
    // Atualização bem-sucedida
  } else {
    // Erro ao atualizar
  }
};
xhr.send(data);

}