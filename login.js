



let registerButtonElt = document.getElementById("registerButtonElt");
let lawyerButtonElt = document.getElementById("lawyerButtonElt");
let judgeButtonElt = document.getElementById("judgeButtonElt");
let loginHeadingEl = document.getElementById("loginHeading");
let bottomTextEl = document.getElementById("bottomText");
let loginBoxEl = document.getElementById("loginBox");

registerButtonElt.onclick = function(){
    registerButtonElt.classList.add("bg-primary");
    registerButtonElt.classList.remove("bg-light");
    registerButtonElt.style.color = "white" ;
    lawyerButtonElt.classList.add("bg-light");
    lawyerButtonElt.classList.remove("bg-primary");
    lawyerButtonElt.style.color = "black";
    judgeButtonElt.style.color = "black";
    judgeButtonElt.classList.add("bg-light");
    judgeButtonElt.classList.remove("bg-primary");
    loginHeadingEl.textContent = "Register Login";
    bottomTextEl.classList.add("d-none");

}

lawyerButtonElt.onclick = function(){
    registerButtonElt.classList.remove("bg-primary");
    registerButtonElt.classList.add("bg-light");
    lawyerButtonElt.classList.remove("bg-light");
    lawyerButtonElt.classList.add("bg-primary");
    judgeButtonElt.classList.add("bg-light");
    judgeButtonElt.classList.remove("bg-primary");
    loginHeadingEl.textContent = "Lawyer Login";
    registerButtonElt.style.color = "black" ;
    lawyerButtonElt.style.color = "white";
    judgeButtonElt.style.color = "black";
    registerButtonElt.style.borderColor ="white";
    bottomTextEl.classList.add("d-none");
}
judgeButtonElt.onclick = function(){
    registerButtonElt.classList.remove("bg-primary");
    registerButtonElt.classList.add("bg-light");
    lawyerButtonElt.classList.add("bg-light");
    lawyerButtonElt.classList.remove("bg-primary");
    judgeButtonElt.classList.remove("bg-light");
    judgeButtonElt.classList.add("bg-primary");
    loginHeadingEl.textContent = "Judge Login";
    registerButtonElt.style.color = "black" ;
    lawyerButtonElt.style.color = "black";
    judgeButtonElt.style.color = "white";
    registerButtonElt.style.borderColor ="white";
    bottomTextEl.classList.add("d-none");
  

}