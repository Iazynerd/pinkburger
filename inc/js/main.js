var url = window.location.href;
if(url.includes('index')){
    document.getElementsByClassName("index")[0].classList.add("active");
}else if(url.includes('menu')){
    document.getElementsByClassName("menu")[0].classList.add("active");
}else if(url.includes('orders')){
    document.getElementsByClassName("orders")[0].classList.add("active");
}else if(url.includes('contact')){
    document.getElementsByClassName("contact")[0].classList.add("active");
}else if(url.includes('about')){
    document.getElementsByClassName("about")[0].classList.add("active");
}else{
    document.getElementsByClassName("index")[0].classList.add("active");
}