document.getElementById("butt").addEventListener("click",function()
{
    var box = document.getElementById("chang");
    if(box.style.display == "none")
    {
        box.style.display="block";
       
    }
    else
    {
        box.style.display="none";
    }
    var boxi = document.getElementById("butt");
     if(boxi.style.display == "none")
    {
         boxi.style.display="block";
    }
     else
   {
          boxi.style.display="none";
     }


     var boxi = document.getElementById("achiv");
     if(boxi.style.display == "none")
    {
         boxi.style.display="block";
    }
     else
   {
          boxi.style.display="none";
     }
     

     var boxe = document.getElementById("quiz");
    if(boxe.style.display == "block")
    {
        boxe.style.display="none";
    }
    else
    {
        boxe.style.display="block";
        passeQ(questions[0]);
        nextBtn.classList.remove('add');
         nextBtn.disabled = true;
    }

    var boxu = document.getElementById("achiv2");
    if(boxu.style.display == "block")
    {
        boxu.style.display="none";
    }
    else
    {
        boxu.style.display="block";
    }

    

})
const questions = [{
    questiion: 'Pensez-vous avoir ou avoir eu de la fièvre ces 10 derniers jours (frissons, sueurs) ?',

    input: {
        type: 'radio',
        qIndex: 'i1',
        answer: [{
            text: 'Oui',
            icon: 'fa fa-check'
        }, {
            text: 'Non',
            icon: 'fa fa-times'
        }]
    }
}, {
    questiion: 'Quelle est votre température corporelle ?',

    input: {
        type: 'number',
        qIndex: 'i2',
        name: 'degrés',
        min: 34,
        max: 42
    }
}, {
    questiion: 'Ces derniers jours, avez-vous une toux ou une augmentation de votre toux habituelle ?',

    input: {
        type: 'radio',
        qIndex: 'i3',
        answer: [{
            text: 'Oui',
            icon: 'fa fa-check'
        }, {
            text: 'Non',
            icon: 'fa fa-times'
        }]
    }
}, {
    questiion: 'Avez-vous eu des courbatures inhabituelles au cours des derniers jours ?',

    input: {
        type: 'radio',
        qIndex: 'i4',
        answer: [{
            text: 'Oui',
            icon: 'fa fa-check'
        }, {
            text: 'Non',
            icon: 'fa fa-times'
        }]
    }
}, {
    questiion: 'Ces derniers jours, avez-vous un mal de gorge ?',

    input: {
        type: 'radio',
        qIndex: 'i5',
        answer: [{
            text: 'Oui',
            icon: 'fa fa-check'
        }, {
            text: 'Non',
            icon: 'fa fa-times'
        }]
    }
}, {
    questiion: 'Ces dernières 24 heures, avez-vous de la diarrhée ? Avec au moins 3 selles molles.',

    input: {
        type: 'radio',
        qIndex: 'i6',
        answer: [{
            text: 'Oui',
            icon: 'fa fa-check'
        }, {
            text: 'Non',
            icon: 'fa fa-times'
        }]
    }
}, {
    questiion: 'Ces derniers jours, avez-vous une fatigue inhabituelle qui vous a obligé à vous reposer plus de la moitié de la journée ?',

    input: {
        type: 'radio',
        qIndex: 'i7',
        answer: [{
            text: 'Oui',
            icon: 'fa fa-check'
        }, {
            text: 'Non',
            icon: 'fa fa-times'
        }]
    }
}, {
    questiion: 'Avez-vous des difficultés importantes pour vous alimenter ou boire depuis plus de 24h ?',

    input: {
        type: 'radio',
        qIndex: 'i8',
        answer: [{
            text: 'Oui',
            icon: 'fa fa-check'
        }, {
            text: 'Non',
            icon: 'fa fa-times'
        }]
    }
}, {
    questiion: 'Dans les dernières 24 heures, avez-vous noté un manque de souffle inhabituel lorsque vous parlez ou faites un petit effort ?',

    input: {
        type: 'radio',
        qIndex: 'i9',
        answer: [{
            text: 'Oui',
            icon: 'fa fa-check'
        }, {
            text: 'Non',
            icon: 'fa fa-times'
        }]
    }
}, {
    questiion: 'Actuellement, comment vous vous sentez ?',

    input: {
        type: 'radio',
        qIndex: 'i10',
        answer: [{
            text: 'Bien',
            icon: ' fa fa-laugh'
        }, {
            text: 'Assez bien',
            icon: ' fa fa-smile-o'
        }, {
            text: 'Fatigué(e)',
            icon: ' fa fa-frown-o'
        }, {
            text: 'Très fatigué',
            icon: 'fa fa-dizzy'
        }]
    }
}, {
    questiion: 'Quel est votre âge ? Ceci, afin de calculer un facteur de risque spécifique.',

    input: {
        type: 'number',
        qIndex: 'i11',
        name: 'ans',
        min: 0,
        max: 110
    }
}, {
    questiion: 'Quel est votre poids ? Afin de calculer l’indice de masse corporelle qui est un facteur influençant le risque de complications de l’infection.',

    input: {
        type: 'number',
        qIndex: 'i12',
        name: 'kg',
        min: 20,
        max: 250
    }
}, {
    questiion: 'Quelle est votre taille ? Afin de calculer l’indice de masse corporelle qui est un facteur influençant le risque de complications de l’infection.',

    input: {
        type: 'number',
        qIndex: 'i13',
        name: 'cm',
        min: 80,
        max: 250
    }
}, {
    questiion: 'Avez-vous de l’hypertension artérielle mal équilibrée ? Ou avez-vous une maladie cardiaque ou vasculaire ? Ou prenez-vous un traitement à visée cardiologique ?',

    input: {
        type: 'radio',
        qIndex: 'i14',
        answer: [{
            text: 'Oui',
            icon: 'fa fa-check'
        }, {
            text: 'Non',
            icon: 'fa fa-times'
        },{
            text: 'Ne sait pas',
        },]
    }
}, {
    questiion: 'Êtes-vous diabétique ?',

    input: {
        type: 'radio',
        qIndex: 'i15',
        answer: [{
            text: 'Oui',
            icon: 'fa fa-check'
        }, {
            text: 'Non',
            icon: 'fa fa-times'
        }]
    }
}, {
    questiion: 'Avez-vous ou avez-vous eu un cancer ?',

    input: {
        type: 'radio',
        qIndex: 'i16',
        answer: [{
            text: 'Oui',
            icon: 'fa fa-check'
        }, {
            text: 'Non',
            icon: 'fa fa-times'
        }]
    }
}, {
    questiion: 'Avez-vous une maladie respiratoire ? Ou êtes-vous suivi par un pneumologue ?',

    input: {
        type: 'radio',
        qIndex: 'i17',
        answer: [{
            text: 'Oui',
            icon: 'fa fa-check'
        }, {
            text: 'Non',
            icon: 'fa fa-times'
        }]
    }
}, {
    questiion: 'Avez-vous une insuffisance rénale chronique dialysée ?',

    input: {
        type: 'radio',
        qIndex: 'i18',
        answer: [{
            text: 'Oui',
            icon: 'fa fa-check'
        }, {
            text: 'Non',
            icon: 'fa fa-times'
        }]
    }
}, {
    questiion: 'Avez-vous une maladie chronique du foie ?',

    input: {
        type: 'radio',
        qIndex: 'i19',
        answer: [{
            text: 'Oui',
            icon: 'fa fa-check'
        }, {
            text: 'Non',
            icon: 'fa fa-times'
        }]
    }
}, {
    questiion: 'Êtes-vous enceinte ?',

    input: {
        type: 'radio',
        qIndex: 'i20',
        answer: [{
            text: 'Oui',
            icon: 'fa fa-check'
        }, {
            text: 'Non',
            icon: 'fa fa-times'
        }, {
            text: 'Homme',
            icon: 'fa fa-male'

        }]
    }
}, {
    questiion: 'Avez-vous une maladie connue pour diminuer vos défenses immunitaires ?',

    input: {
        type: 'radio',
        qIndex: 'i21',
        answer: [{
            text: 'Oui',
            icon: 'fa fa-check'
        }, {
            text: 'Non',
            icon: 'fa fa-times'
        },
        {
            text: 'Ne sait pas',
        },]
    }
}, {
    questiion: 'Prenez-vous un traitement immunosuppresseur ? C’est un traitement qui diminue vos défenses contre les infections. Voici quelques exemples : corticoïdes, méthotrexate, ciclosporine, tacrolimus, azathioprine, cyclophosphamide (liste non exhaustive).',

    input: {
        type: 'radio',
        qIndex: 'i22',
        answer: [{
            text: 'Oui',
            icon: 'fa fa-check'
        }, {
            text: 'Non',
            icon: 'fa fa-times'
        },
        {
            text: 'Ne sait pas',
        },]
    }
}

]

const questinNbr = document.querySelector('.questinNbr');
const SuiverBar = document.querySelector('.bar');
let i = 1;
const btn = document.querySelector('.butt');
const nextBtn = document.querySelector('#nextbutton');
const lastbtn = document.querySelector('.last-btn');
const question = document.querySelector('.question');
const options = document.querySelector('.option');
const passe = document.querySelector('.passe');

const result = document.querySelector('.para h3')
const analysemsg = document.querySelectorAll('.para p')


nextBtn.addEventListener('click', () => {

    if (i < questions.length) {
    
    passeQ(questions[i])
    index(i)
    lastbtn.style.display = 'block';
    nextBtn.disabled = true;
   i++;
    if (i === 22) {
        nextBtn.innerText = 'Terminer le test'
        nextBtn.classList.add('result')
        const resultB = document.querySelector('.result')
        resultB.addEventListener('click', analyse)

    } 
    else {
        nextBtn.innerText = 'Suivant'
    }
}
});

function index(j) {
    const Nbr = j + 1;
    questinNbr.innerText = Nbr; 
    SuiverBar.style.width = `calc(${Nbr}* calc(100% / 22))`;
}
function passeQ(questiion) {

    question.innerText = questiion.questiion;
    options.innerHTML = '';
    const optionanswer = questiion.input.answer;
    const optioninput = questiion.input;

    if (optioninput.type === 'radio') {

        optionanswer.forEach(answer => {

            options.innerHTML += `
                    <div>
                        <input type="radio" name="${optioninput.qIndex}" id="${answer.text}">
                        <label for="${answer.text}">
                        <i class="fas ${answer.icon}"></i>
                        <span>${answer.text}</span> </label>
                    </div>`;
        });



    } else {

        options.innerHTML += `<input type="number"  name="${optioninput.qIndex} id="${optioninput.name}" min="${optioninput.min}" max="${optioninput.max}" placeholder="${optioninput.min} - ${optioninput.max}">
                                    <span class="input-span">${optioninput.name}</span>`
    }


};
lastbtn.addEventListener('click', () => {
   i--;  
    passeQ(questions[i]);
    index(i); 
    if (i <= 1){
        i = 1;
        lastBtn.classList.add('add');
        lastbtn.style.display = 'none';
    } 
 
    
});

passe.addEventListener('change', (event) => {
    const input = event.target;
    if (input.type === 'number') {
        const testnumber = parseFloat(input.value);
        if (testnumber >= input.min && testnumber <= input.max) {
            answers[input.name] = input.value
            console.log(answers);
            nextBtn.disabled = false;
        } else {
            nextBtn.disabled = true;
        }
    } else {
        nextBtn.disabled = false;
        answers[input.name] = input.id
        console.log(answers);
    }
});

 let answers = {}
let facteurGraMineur = 0
let facteurGraMajeur = 0
let facteurPronostique = 0
let facteurG = 0

 function analyse(){
     // facteur Pronostique

    if(answers['i11'] >= 70) {
        facteurPronostique++;
    }
    if (answers['i14'] === 'Oui') {
        facteurPronostique++;
    }
    if (answers['i15'] === 'Oui') {
        facteurPronostique++;
    } 
    if (answers['i16'] === 'Oui') {
        facteurPronostique++;
    }
    if (answers['i17'] === 'Oui'){
        facteurPronostique++;
    }
    if (answers['i18'] === 'Oui')  {
        facteurPronostique++;
    }
    if (answers['i19'] === 'Oui') {
        facteurPronostique++;
    }
    if (answers['i20'] === 'Oui') {
        facteurPronostique++;
    } 
    if (answers['i21'] === 'Oui') {
        facteurPronostique++;
    }
    if (answers['i22'] === 'Oui'){
        facteurPronostique++;
     }

     // facteur Mineur
     if(answers['i2'] >= 39){
        facteurGraMineur++;
     }  
     if (answers['i9'] === 'Oui') {
        facteurGraMineur++;
     } 
     if (answers['i10'] === 'Fatigué(e)' || answers['i10'] === 'Très fatigué'){
        facteurGraMineur++;
     }

    // facteur Majeur
    if(answers['i2'] <= 35,4){
        facteurGraMajeur++;
    } 
    if (answers['i9'] === 'Oui'){
         facteurGraMajeur++;
    } 
    if (answers['i8'] === 'Oui'){
        facteurGraMajeur++;
    }

    console.log(facteurPronostique);
    console.log(facteurGraMineur);
    console.log(facteurGraMajeur);
    // Patient avec fièvre, ou toux + mal de gorge, ou toux + courbatures ou fièvre + diarrhée
    if(answers['i1'] === 'Oui' || (answers['i3'] === 'Oui' && answers['i5'] === 'Oui') || (answers['i3'] === 'Oui' && answers['i4'] === 'Oui') || (answers['i1'] === 'Oui' && answers['i6'] === 'Oui')){
    // Tout patient sans facteur pronostique

    if(facteurPronostique == 0){
            if(facteurGraMineur == 0 && facteurGraMajeur == 0 && ( answers['i11'] < 50)){
                analysemsg[0].innerText = "nous vous conseillons de rester à votre domicile et de contacter votre médecin en " + 
                "cas d’apparition de nouveaux symptômes. Vous pourrez aussi utiliser à nouveau l’application pour réévaluer" +
                "vos symptômes." 
                analysemsg[1].innerText = 'Restez chez vous au maximum en attendant que les symptômes disparaissent. Pren' +
                'ez votre température deux fois par jour. Rappel des mesures d’hygiène.'
                analysemsg[0].style.fontWeight = 'bold'
                analysemsg[0].style.color = '#369D53'
            }
            else if(facteurGraMineur == 0 && facteurGraMajeur >= 1 && ( answers['i11'] > 50 && answers['i11'] < 69)){
                analysemsg[0].innerText = "téléconsultation ou médecin généraliste ou visite à domicile " +
                "appelez le 141 si une gêne respiratoire ou des difficultés importantes pour s’alimenter ou boire pendant plus de 24h apparaissent."  
                analysemsg[1].innerText = 'Restez chez vous au maximum en attendant que les symptômes disparaissent. Pren' +
                'ez votre température deux fois par jour. Rappel des mesures d’hygiène.'
                analysemsg[0].style.fontWeight = 'bold'
                analysemsg[0].style.color = '#369D53'
            }
    }

    //Tout patient avec un facteur pronostique ou plus
    if(facteurPronostique >= 1){
        if((facteurGraMineur == 0 && facteurGraMajeur == 0) || facteurGraMineur == 1){
            analysemsg[0].innerText = "téléconsultation ou médecin généraliste ou visite à domicile " + 
            "appelez le 141 si une gêne respiratoire ou des difficultés importantes pour s’alimenter ou boire pendant plus de 24h apparaissent." 
            analysemsg[1].innerText = 'Restez chez vous au maximum en attendant que les symptômes disparaissent. Pren' +
            'ez votre température deux fois par jour. Rappel des mesures d’hygiène.'
            analysemsg[0].style.fontWeight = 'bold'
            analysemsg[0].style.color = '#369D53'
        }
        else if(facteurGraMineur >= 2){
            analysemsg[0].innerText = "appel 141" 
            analysemsg[1].innerText = 'Restez chez vous au maximum en attendant que les symptômes disparaissent. Pren' +
            'ez votre température deux fois par jour. Rappel des mesures d’hygiène.'
            analysemsg[0].style.fontWeight = 'bold'
            analysemsg[0].style.color = '#369D53'

        }
    }
    //Tout patient avec ou sans facteur pronostique avec au moins un facteur de gravité majeur
    if((facteurPronostique>= 0) && facteurGraMajeur>=1 ){
        analysemsg[0].innerText = "appel 141" 
        analysemsg[1].innerText = 'Restez chez vous au maximum en attendant que les symptômes disparaissent. Pren' +
        'ez votre température deux fois par jour. Rappel des mesures d’hygiène.'
        analysemsg[0].style.fontWeight = 'bold'
        analysemsg[0].style.color = '#369D53'
    }
 }

 // Tout patient avec fièvre et toux 

  if(answers['i1']==='Oui' && answers['i3']==='oui')
  {
      //Tout patient sans facteur pronostique 
      if(facteurPronostique == 0){
          if((facteurGraMineur>= 0) && facteurGraMajeur == 0 ){
            analysemsg[0].innerText = "téléconsultation ou médecin généraliste ou visite à domicile " + 
            "appelez le 141 si une gêne respiratoire ou des difficultés importantes pour s’alimenter ou boire pendant plus de 24h apparaissent." 
            analysemsg[1].innerText = 'Restez chez vous au maximum en attendant que les symptômes disparaissent. Pren' +
            'ez votre température deux fois par jour. Rappel des mesures d’hygiène.'
            analysemsg[0].style.fontWeight = 'bold'
            analysemsg[0].style.color = '#369D53'
          }
      }
      // Tout patient avec un facteur pronostique ou plus 
      if(facteurPronostique >= 0){
          if((facteurGraMineur == 0 || facteurGraMineur == 1) && facteurGraMajeur == 0){
            analysemsg[0].innerText = "téléconsultation ou médecin généraliste ou visite à domicile " + 
            "appelez le 141 si une gêne respiratoire ou des difficultés importantes pour s’alimenter ou boire pendant plus de 24h apparaissent." 
            analysemsg[1].innerText = 'Restez chez vous au maximum en attendant que les symptômes disparaissent. Pren' +
            'ez votre température deux fois par jour. Rappel des mesures d’hygiène.'
            analysemsg[0].style.fontWeight = 'bold'
            analysemsg[0].style.color = '#369D53'
          }
          if(facteurGraMineur >= 2){
            analysemsg[0].innerText = "appel 141" 
            analysemsg[1].innerText = 'Restez chez vous au maximum en attendant que les symptômes disparaissent. Pren' +
            'ez votre température deux fois par jour. Rappel des mesures d’hygiène.'
            analysemsg[0].style.fontWeight = 'bold'
            analysemsg[0].style.color = '#369D53'
          }
      }
     // Tout patient avec ou sans facteur pronostique avec au moins un facteur de gravité majeur
      if((facteurPronostique>= 0) && facteurGraMajeur>=1 ){
        analysemsg[0].innerText = "appel 141" 
        analysemsg[1].innerText = 'Restez chez vous au maximum en attendant que les symptômes disparaissent. Pren' +
        'ez votre température deux fois par jour. Rappel des mesures d’hygiène.'
        analysemsg[0].style.fontWeight = 'bold'
        analysemsg[0].style.color = '#369D53'
    }
  }
      // Tout patient avec un seul symptôme parmi fièvre, toux, mal de gorge, courbatures 
      if(answers['i1'] === 'Oui' || answers['i3'] === 'Oui' || answers['i5'] === 'Oui' || answers['i4'] === 'Oui'){
         if(facteurGraMajeur == 0 && facteurGraMineur== 0){
             analysemsg[0].innerText = "Votre situation ne relève probablement pas du Covid-19. Consultez votre médecin au moindre doute" 
             analysemsg[1].innerText = 'Restez chez vous au maximum en attendant que les symptômes disparaissent. Pren' +
            'ez votre température deux fois par jour. Rappel des mesures d’hygiène.'
             analysemsg[0].style.fontWeight = 'bold'
             analysemsg[0].style.color = '#369D53'
          }
         if((facteurGraMajeur == 1 || facteurGraMineur == 1) || facteurPronostique == 1){
             analysemsg[0].innerText = "Votre situation ne relève probablement pas du Covid-19. Un avis médical est recommandé. Au moindre doute, appelez le 141." 
            analysemsg[1].innerText = 'Restez chez vous au maximum en attendant que les symptômes disparaissent. Pren' +
            'ez votre température deux fois par jour. Rappel des mesures d’hygiène.'
           analysemsg[0].style.fontWeight = 'bold'
             analysemsg[0].style.color = '#369D53'
          }
      }
     // Tout patient avec aucun symptôme
    if ((answers['i1'] === 'Non') && (answers['i3'] === 'Non') && (answers['i4'] === 'Non') && (answers['i5'] === 'Non') && (answers['i6'] === 'Non')){
        analysemsg[0].innerText = 'Votre situation ne relève probablement pas du Covid-19. N’hésitez pas à contacter votre médecin en cas de doute.' +
        'Vous pouvez refaire le test en cas de nouveau symptôme pour réévaluer la situation.'+
        'Pour toute information concernant le Covid-19 allez vers la page d’accueil.'
        analysemsg[1].innerText = 'Restez chez vous au maximum en attendant que les symptômes disparaissent. Pren' +
        'ez votre température deux fois par jour. Rappel des mesures d’hygiène.'
        analysemsg[0].style.fontWeight = 'bold'
        analysemsg[0].style.color = '#369D53'
    }
     console.log()
     resultat(facteurG);
 }
 function resultat(facteurG){
    var boxu = document.getElementById("achiv2");
    if(boxu.style.display == "block")
    {
        boxu.style.display="none";
    }
    else
    {
        boxu.style.display="block";
    }

    var box3 = document.getElementById("achiv3");
    if(box3.style.display == "block")
    {
        box3.style.display="none";
    }
    else
    {
        box3.style.display="block";
    }
    quiz.style.display="none";
    var box = document.getElementById("chang");
    if(box.style.display == "none")
    {
        box.style.display="block";
       
    }
    else
    {
        box.style.display="none";
    }
    var boxi = document.getElementById("butt");
     if(boxi.style.display == "none")
    {
         boxi.style.display="block";
         boxi.value = 'Recommencer le test';
         boxi.addEventListener('click', () => {

            window.location.reload()
        })
    }
     else
   {
          boxi.style.display="none";
     }
     result.innerText = 'Résultats'

 }