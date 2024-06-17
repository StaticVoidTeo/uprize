let faqs = document.querySelectorAll(".faq");
let contactBtns = document.querySelectorAll(".circleButton");
let menuIcon = document.querySelector(".menuIcon");
let menuItems = document.querySelectorAll(".menuItem");

let prevFaq = undefined;

menuItems.forEach((el) => {
    el.addEventListener("click", () => {
        menuIcon.id = "";
        document.querySelector("header").id = "";
    })
})

menuIcon.addEventListener("click", () => {
    if(menuIcon.id){
        menuIcon.id = "";
        document.querySelector("header").id = "";
    }
    else{
        menuIcon.id = "crossMenuIcon";
        document.querySelector("header").id = "mobileHeader";
    }
})

faqs.forEach((el) => {
    el.addEventListener("click", () => {
        if(prevFaq == el){
            el.querySelector(".answer").style = "display:none;";
            el.querySelector(".plusSign").id = "";
            prevFaq = undefined;
        }
        else{
            if(prevFaq){
                prevFaq.querySelector(".answer").style = "display:none;";
                prevFaq.querySelector(".plusSign").id = "";
            }
            el.querySelector(".answer").style = "display:block;";
            el.querySelector(".plusSign").id = "rotatedPlus";
            prevFaq = el;
        }
    })
})

contactBtns.forEach((el) => {
    el.addEventListener("click", () => {
        document.querySelector("#contactForm").scrollIntoView
        ({ behavior: "smooth", block: "center", inline: "nearest" });
    })
})

document.querySelector("#contactBtnFromMenu").addEventListener("click", () => {
    document.querySelector("#contactForm").scrollIntoView
        ({ behavior: "smooth", block: "center", inline: "nearest" });
})

document.querySelector("#homeBtn").addEventListener("click", () => {
    document.querySelector("body").scrollIntoView
        ({ behavior: "smooth", block: "start", inline: "nearest" });
})

document.querySelector("#whyUsBtn").addEventListener("click", () => {
    document.querySelector("#whyUsSection").scrollIntoView
        ({ behavior: "smooth", block: "center", inline: "nearest" });
})

document.querySelector("#whatWeOfferBtn").addEventListener("click", () => {
    document.querySelector("#opportunitiesSection").scrollIntoView
        ({ behavior: "smooth", block: "center", inline: "nearest" });
})

document.querySelector("#faqBtn").addEventListener("click", () => {
    document.querySelector("#faqSection").scrollIntoView
        ({ behavior: "smooth", block: "center", inline: "nearest" });
})