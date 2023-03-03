    // Espera 5 segundos e, em seguida, mostra o conteúdo da página
    setTimeout(function() {
        document.querySelector('.loader').style.display = 'none'; // Esconde o loader
        document.querySelector('.load').style.display = 'none'; // Esconde o texto de loading
        document.querySelector('.main').style.display = 'block'; // Mostra o conteúdo da página
      }, 5000);
  
      // Alterna o texto abaixo do loader a cada 1 segundo
      let loadingText = document.querySelector('.load');
      let loadingMessages = ["Conectando no banco de dados", "Conexão feita com sucesso", "Carregando dodos participantes", "Finalizando carregamento"];
      let index = 0;
      let maxIndex = loadingMessages.length - 1; // Tamanho máximo do array
  
      let intervalId = setInterval(function() {
        loadingText.innerText = loadingMessages[index];
        if (index === maxIndex) {
          clearInterval(intervalId); // Para a execução da função
        }
        index++;
      }, 1000);


// =================================================================

let isFormSubmitted = false;

const submitButton = document.querySelector('#submit-button');
submitButton.addEventListener('click', handleSubmitButtonClick);

function handleSubmitButtonClick() {
    if (isFormSubmitted) {
        return;
    }

    isFormSubmitted = true;

    const form = document.querySelector('form');
    const originalText = submitButton.innerText;
    submitButton.innerText = 'Salvando incrição';
    submitButton.classList.add('loading');

    setTimeout(() => {
        submitButton.innerText = originalText;
        submitButton.classList.remove('loading');
        form.submit();
        isFormSubmitted = false;
    }, 3000);
}