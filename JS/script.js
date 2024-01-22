//Selectionne le bouton
const answers = document.querySelectorAll(".answer");

answers.forEach((answer) => {
  //Ecouteur d'évènement click
  answer.addEventListener("click", function (event) {
    console.log(this);

    //Vérifie si la reponse est correcte (si good_answer =1)
    if (answer.parentNode.dataset.key == 1) {
      this.style.background = "green";
    } else {
      this.style.background = "red";
    }

    // Quand je clique sur une réponse, les autres ne sont plus cliquables
    answers.forEach((element) => {
      console.log(element);
      if (element.value !== answer.value) {
        
        element.classList.add('disabled')

      }
    });
  });
});
