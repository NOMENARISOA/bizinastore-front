window.onload = function(){
    slideMin();
    slideMax();
}

let sliderMin = document.getElementById("slider-min");
let sliderMax = document.getElementById("slider-max");
let displayValOne = document.getElementById("range-min");
let displayValTwo = document.getElementById("range-max");
let minGap = 0;
let sliderTrack = document.querySelector(".slider-track");
let sliderMaxValue = document.getElementById("slider-max").max;

function slideMin(){
    if(parseInt(sliderMax.value) - parseInt(sliderMin.value) <= minGap){
        sliderMin.value = parseInt(sliderMax.value) - minGap;
    }
    if(sliderMin.value == sliderMaxValue){
        displayValOne.textContent =  new Intl.NumberFormat('fr-FR').format(sliderMin.value);
        displayValOne.textContent = displayValOne.textContent + " et +";
        console.log("max")
    }else{
        displayValOne.textContent =  new Intl.NumberFormat('fr-FR').format(sliderMin.value);
    }

    fillColor();
}
function slideMax(){
    if(parseInt(sliderMax.value) - parseInt(sliderMin.value) <= minGap){
        sliderMax.value = parseInt(sliderMin.value) + minGap;
    }
    if(sliderMax.value == sliderMaxValue){
        displayValTwo.textContent = new Intl.NumberFormat('fr-FR').format(sliderMax.value);
        displayValTwo.textContent = displayValTwo.textContent + " et +";
        console.log("max")
    }else{
        displayValTwo.textContent = new Intl.NumberFormat('fr-FR').format(sliderMax.value);
    }

    fillColor();
}
function fillColor(){
    percent1 = (sliderMin.value / sliderMaxValue) * 100;
    percent2 = (sliderMin.value / sliderMaxValue) * 100;
    sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #3264fe ${percent1}% , #3264fe ${percent2}%, #dadae5 ${percent2}%)`;
}
