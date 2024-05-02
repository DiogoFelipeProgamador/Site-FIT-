function menuShow(){
    let ul=document.querySelector('.navbar ul');

    if(ul.classList.contains("open")){
        ul.classList.remove("open");
    }else{
        ul.classList.add("open");
    }
}

function cauculate(){
    var height=document.getElementById("height").value
    var weight=document.getElementById("weight").value
    var numero_com_virgula = height;
    var numero_com_ponto = numero_com_virgula.replace(',','.');
    var heightcorreto = parseFloat(numero_com_ponto);

    var imc = weight / (heightcorreto ** 2);
    if(imc<18.5){
        text="Você está  magro:" + imc.toFixed(2);
    }
    else if(imc<24.9){
        text="Você está normal:" + imc.toFixed(2);
    }
    else if(imc<29.9){
        text="Você está  acima do peso:" + imc.toFixed(2);
    }
    else if(imc<34.9){
        text="Você está  obeso:" + imc.toFixed(2);
    }
    else if(imc>40){
        text="Você está  com obesidade morbida:" + imc.toFixed(2);
    }

    document.getElementById("text_area").innerText=text;

    
    
}

function calcular(){

    var heighttmb=document.getElementById("height-tmb").value
    var weighttmb=document.getElementById("weight-tmb").value
    var agetmb=document.getElementById("age-tmb").value
    var numero_com_virgula = heighttmb;
    var numero_com_ponto = numero_com_virgula.replace(',','.');
    var heighttmbcorreto = parseFloat(numero_com_ponto);

    var tmb = 88.362 + (13.397 * weighttmb) + (4.799 * heighttmbcorreto) - (5.677 * agetmb);
    if (document.getElementById("options").value==2){
        var tmb = 447.593 + (9.247 * weighttmb) + (3.098 * heightcorreto) - (4.330 * agetmb);
    }

    document.getElementById("text_area-tmb").innerText=("Seu metabolismo Basal é:") + tmb.toFixed(2);
    
    
    
    
    

}

function caucularok(){
    var ageok=document.getElementById("age-fc").value
    
    var ideal = (220 - ageok) * 0.60;
    var fci = (220 - ageok) * 0.75;
    if (document.getElementById("options-cauculo").value==2){
        var ideal = (226 - ageok) * 0.60;
        var fci = (226 - ageok) * 0.75;
    }

    document.getElementById("text_area_info").innerText=("FC mínima ideal:") + ideal.toFixed(2);

    document.getElementById("text_area_certo").innerText=("FC máxima ideal:") + fci.toFixed(2);
}

