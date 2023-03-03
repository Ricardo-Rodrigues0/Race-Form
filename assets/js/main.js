//Animação de loader ao entrar em uma página web e altenar texto enquando a página e carregada.
setTimeout(function () {
  document.querySelector(".loader").style.display = "none";
  document.querySelector(".load").style.display = "none";
  document.querySelector(".main").style.display = "block";
}, 5000);

let loadingText = document.querySelector(".load");
let loadingMessages = [
  "Conectando no banco de dados",
  "Conexão feita com sucesso",
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
}, 1000);

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
