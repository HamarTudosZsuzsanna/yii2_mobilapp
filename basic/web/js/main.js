document.querySelector("header").style.display = "none";
document.querySelector("#container").classList.add("index");

document.addEventListener("DOMContentLoaded", function () {

    let setTimeH1Element = document.querySelector(".set-time");
    let setTimeDivElement = document.querySelector("#time");

    setTimeout(() => {
        setTimeH1Element.classList.add("visible");
        setTimeDivElement.classList.add("visible");

    }, 5000);

    



});