let inps = document.querySelectorAll(".inp");
let info = document.querySelector(".info");
let colorBlock = document.querySelector(".color__block");

inps.forEach((inp) => {
    inp.addEventListener("input", (e) => {
        if(e.target.value < 0){
            e.target.value = "";
        }
    })
})
colorBlock.style["background-color"] = info.innerHTML.trim();