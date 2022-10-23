<?php session_start();
header("Content-type: application/javascript"); ?>

let _init = () => {
var session = eval('(<?php echo json_encode($_SESSION) ?>)');
let theme = session["theme"];
let language = session["language"];
let background = document.getElementById("body");
let headers = document.getElementsByTagName("h1");
let links = document.getElementsByTagName("a");
let setTheme = document.getElementById("setTheme");
let setLanguage = document.getElementById("setLanguage");
let logout = document.getElementById("logout");
let navbarBrand = document.getElementById("navbarBrand");
let navbarAbout = document.getElementById("navbarAbout");
let navbarBrands = document.getElementById("navbarBrands");
let navbarContacts = document.getElementById("navbarContacts");
let cards = document.getElementsByClassName("card");
let cardListBtn = document.getElementsByClassName("cardListBtn");
let loadPdfHeader = document.getElementById("pdfLoad");
let loadPdfButton = document.getElementById("pdfLoadBtn");
if (theme == "dark") {
background.style.backgroundColor = "grey";
[...headers].forEach((element) => {
element.style.color = "white";
});
[...cards].forEach((element) => {
element.style.backgroundColor = "lightGrey";
});
[...links].forEach((element) => {
element.style.color = "white";
});
} else {
background.style.backgroundColor = "white";
[...headers].forEach((element) => {
element.style.color = "black";
});
[...cards].forEach((element) => {
element.style.backgroundColor = "white";
});
[...links].forEach((element) => {
element.style.color = "black";
});
}
if (language == "russian") {
try{
setTheme.innerHTML = "Установить тему";
setLanguage.innerHTML = "Установить язык";
loadPdfHeader.innerHTML = "Загрузить PDF файл с водительской лицензией";
pdfLoadBtn.value = "Отправить";
logout.innerHTML = "Выйти";
}
catch(e){}
try{
[...cardListBtn].forEach((element) => {
element.innerHTML = "Список авто";
});
} catch(e){}
navbarBrand.innerHTML = "Супер Авто";
navbarAbout.innerHTML = "О нас";
navbarBrands.innerHTML = "Бренды";
navbarContacts.innerHTML = "Контакты";
} else {
try{
setTheme.innerHTML = "Set theme";
setLanguage.innerHTML = "Set language";
loadPdfHeader.innerHTML = "Load PDF file with drivers licence";
pdfLoadBtn.value = "Submit";
logout.innerHTML = "Logout";
}
catch(e){}
try{
[...cardListBtn].forEach((element) => {
element.innerHTML = "Car list";
});
} catch(e){}
navbarBrand.innerHTML = "Super Auto";
navbarAbout.innerHTML = "About us";
navbarBrands.innerHTML = "Brands";
navbarContacts.innerHTML = "Contacts";
console.log(cardListBtn);
}
};