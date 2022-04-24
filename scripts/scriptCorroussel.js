var balls = document.querySelector(".balls");
var quant = document.querySelectorAll('.slides .image');
var atual = 0;
var imagem = document.getElementById('atual');
var next = document.getElementById("next");
var voltar = document.getElementById("voltar");
var rolar = true;
//Crio as divs de balls para identificar data imagem
for(let i=0; i < quant.length; i++){
    var div = document.createElement("div");
    div.id = i;
    balls.appendChild(div);
    console.log("div de id"+i+"criada");
}
document.getElementById('0').classList.add('imgAtual');

//Crio uma variável que obtem a informação de qual ball tenho
var pos = document.querySelectorAll('.balls div');
for(let i=0; i<pos.length; i++){
    pos[i].addEventListener('click', ()=>{
        atual = pos[i].id;
        rolar = false;
        slide();
    })
}
//retorno uma imagem
voltar.addEventListener('click', ()=>{
    atual--;
    rolar = false;
    slide();
})
//Avanço uma imagem
next.addEventListener('click', ()=>{
    atual++;
    rolar = false;
    slide();
})

function slide(){
    console.log("entro aqui");
    if(atual >= quant.length){
        atual = 0;
    } else if(atual < 0){
        atual = quant.length -1;
    }
    document.querySelector('.imgAtual').classList.remove('.imgAtual');
    const img = document.getElementById('atual'); 
    const width = img.clientWidth;
    console.log("tam imagem "+width);
    imagem.style.marginLeft = -width*atual+"px"
    document.getElementById('atual').classList.add('imgAtual');
}

setInterval(()=>{
    if(rolar){
        atual++;
        slide();
    } else {
        rolar=true;
    }
},5000)