 //page
 function getPage(UrlPage){
    if(window.XMLHttpRequest) {
        oXhr = new XMLHttpRequest(); 
        
    }
    else if(window.ActiveXObject){ 
        oXhr = new ActiveXObject("Microsoft.XMLHTTP");
        
    }       
    else {
        alert("Votre navigateur n'est pas compatible avec AJAX..."); 
        return;
    }
  
   oXhr.onreadystatechange = function(){ 
        if(oXhr.readyState==4 && oXhr.status==200){
            document.getElementById("reponseserveur").innerHTML=oXhr.responseText;
        }
        else if( oXhr.readyState==4){
            document.getElementById("reponseserveur").innerHTML="<h1> la page n'est pas disponible.</h1><br/>Error !"+oXhr.status+"<br/>";
        }
   }
    oXhr.open("GET",UrlPage+"?rand="+Math.random(),false);
    oXhr.send(null);
  //modal

    let wrapper=document.querySelector("#wrapper");
    let header=wrapper.querySelector("#header");
    isMouseDown=false;
    let offsetX=0;
    let offsetY=0;

    header.addEventListener("mousedown",(e)=>{
        isMouseDown=true;
        offsetX=wrapper.offsetLeft-e.clientX;
        offsetY=wrapper.offsetTop-e.clientY;
    });
    document.addEventListener("mousemove",(e)=>{
        if(!isMouseDown) return;
        e.preventDefault();
        let left=e.clientX+offsetX;
        let top=e.clientY+offsetY;
        wrapper.classList.remove("left");
        wrapper.classList.remove("top");
        wrapper.classList.remove("right");
        wrapper.classList.remove("bottom");
        wrapper.style.left=left+"px";
        wrapper.style.top=top+"px";
        if(left<0)
            wrapper.style.left=0;
            if(top<0)
            wrapper.style.top=0;
    });
    document.addEventListener("mouseup",()=>{
        isMouseDown=false;
    });


    // $update=document.getElementById("update");
    // $idcharge=document.getElementById("idc");
    // if($idcharge.value == null){
    //     $update.classList.remove("update");
    // }
    // else if(!$idcharge.value != null){
    //     $update.classList.add("update");
    // }
}
//2
function toggleMaximize(){
if(wrapper.classList.contains("w-full")){
    wrapper.classList.remove("w-full");
    wrapper.classList.remove("h-full");
}
else{
    wrapper.classList.add("w-full");
    wrapper.classList.add("h-full");
}
wrapper.style.left="0.5%";
wrapper.style.top="14.5%"
wrapper.classList.add("left");
wrapper.classList.add("top");
wrapper.classList.add("right");
wrapper.classList.add("bottom");
}
//3
function ToggleMinimize(){
let headerStyles=window.getComputedStyle(header);
let headerHeight=headerStyles.height;
if(!wrapper.classList.contains(`h-[${headerHeight}]`)){
    wrapper.classList.add(`h-[${headerHeight}]`);
    wrapper.classList.add(`overflow-hidden`);
}
else{
    wrapper.classList.remove(`h-[${headerHeight}]`);
    wrapper.classList.remove(`overflow-hidden`);
}
}
//4
function closeWindow(){
wrapper.classList.add("hidden");
}
//5
function openWindow(){
wrapper.classList.remove("hidden");

}
function toggleMenu(){
    const menu=document.getElementById("nav-list");
    menu.classList.toggle('show');
}
// function toggleSubMenu(){
//     const parant=event.target.parentElement;;
//     parant.classList.toggle('active');
// }
//active
// const activepage=window.location.pathname;
// const navlinks=document.querySelectorAll('navbar-item').forEach(link=>{
// if(link.href.includes(`${activepage}`)){
//     link.classList.add('active');
// }
// })
//mod add

// function uploadparente(frm){
// ajax.post2('http://localhost/Gestion_vente/categorie_parent.php',frm,success,error);
// let inputs = document.querySelectorAll('input');
// inputs.forEach (input =>input.value = '');

// }


//Create function to select elements
const selectElement=(element)=>document.querySelector(element);
//Open and close nav on click

selectElement('.menu-icons').addEventListener('click',(event)=>{
event.preventDefault();
selectElement('nav').classList.toggle('active');
});
const submenu=document.querySelectorAll(".sub-menu a");
submenu.forEach(link=>{
    link.addEventListener("click",()=>{
        selectElement("nav").classList.remove("active");
    });
});


// document.addEventListener('click',function(){
// selectElement('nav').classList.remove('active');
// })
//scroll
// let nav=document.querySelector("nav")
// window.onscroll=()=>{
//     event.stopPropagation();
//     if(window.scrollY >= 450){
//     nav.classList.add("dodo")
//     }
//     else{nav.classList.remove("dodo");}
// }
//affiche detail

function depa(idd,da,td){
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp=new activeXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (this.readyState==4 && this.status==200) {
            document.getElementById('idd').innerHTML=idd;
            document.getElementById('da').innerHTML=da;
            document.getElementById('td').innerHTML=td;
            
        }
    }
    xmlhttp.open("POST","nutrition.php",true)
    xmlhttp.send();
}

//chager image
function charger(){
    var lesImg=document.getElementsByTagName("img");
    for(var i=0;i < lesImg.length;i++){
        if(lesImg[i].getAttribute("data-src")){
            lesImg[i].setAttribute("src",lesImg[i].getAttribute("data-src"));
        }
    }
}
document.addEventListener("DOMContentLoaded",charger);
//slider
// var slides=document.querySelectorAll('.slide');
// var btns=document.querySelectorAll('.slide-icon');
// let currentSlide=1;

// var manuelNav=function(manuel){
//     slides.forEach((slide)=>{
//         slide.classList.remove('melance');
//         btns.forEach((slide-icon)=>{
//             slide-icon.classList.remove('melance');
//         });
//     });
//     slides[manuel].classList.add('melance');
//     btns[manuel].classList.add('melance');
// }
   
//     btns.forEach((slide-icon,i)=>{
//         slide-icon.addEventListener("click",()=>{
//             manuelNav(i);
//             currentSlide=i;
//         })
//     });

// var repeat=function(activeClass){
//     let active=document.getElementsByClassName('melance');
//         let i=1;
//         var repeater=()=>{
//             setTimeout(function(){
//                 [...active].forEach((activeSlide)=>{
//                     activeSlide.classList.remove('melance');
//                 });
//                 slides[i].classList.add('melance');
//                 btns[i].classList.add('melance');  
//                 i++;
//                 if(slides.length==i){
//                     i=0;
//                 }
//                 if(i>=slides.length){
//                     return;
//                 }
//                 repeater();
//             },10000);
//         }
//         repeater();
// }
// repeat();
//
let slider=document.querySelector(".slider");
let nextBtn=document.querySelector(".next-btn");
let prevBtn=document.querySelector(".prev-btn");
let slides=document.querySelectorAll('.slide');
let slideIcons=document.querySelectorAll(".slide-icon");
var numberOfSlides = slides.length;
let  slideNumber=0;
nextBtn.addEventListener("click",()=>{
    slides.forEach((slide)=>{
        slide.classList.remove("melance");
    });
    slideIcons.forEach((slideIcon)=>{
        slideIcon.classList.remove("melance");
    });
    slideNumber++;
    if(slideNumber > (numberOfSlides - 1)){
        slideNumber=0;
    }
    slides[slideNumber].classList.add("melance");
    slideIcons[slideNumber].classList.add("melance");
});
// 
prevBtn.addEventListener("click",()=>{
    slides.forEach((slide)=>{
        slide.classList.remove("melance");
    });
    slideIcons.forEach((slideIcon)=>{
        slideIcon.classList.remove("melance");
    });
    slideNumber--;
    if(slideNumber  < 0){
        slideNumber=numberOfSlides - 1;
    }
    slides[slideNumber].classList.add("melance");
    slideIcons[slideNumber].classList.add("melance");
});
var playSlider;
var repeater=()=>{
    playSlider=setInterval(function(){
    slides.forEach((slide)=>{
        slide.classList.remove("melance");
    });
    slideIcons.forEach((slideIcon)=>{
        slideIcon.classList.remove("melance");
    });
    slideNumber++;
    if(slideNumber > (numberOfSlides - 1)){
        slideNumber=0;
    }
    slides[slideNumber].classList.add("melance");
    slideIcons[slideNumber].classList.add("melance");
},10000);
}
repeater();

slider.addEventListener("mouseover",()=>{
    clearInterval(playSlider);
});
slider.addEventListener("mouseout",()=>{
    repeater();
});


//page faceboock
 //page
 function faceboocktwitter(UrlPage){
    if(window.XMLHttpRequest) {
        oXhrs = new XMLHttpRequest(); 
        
    }
    else if(window.ActiveXObject){ 
        oXhrs = new ActiveXObject("Microsoft.XMLHTTP");
        
    }       
    else {
        alert("Votre navigateur n'est pas compatible avec AJAX..."); 
        return;
    }
  
    oXhrs.onreadystatechange = function(){ 
        if(oXhrs.readyState==4 && oXhrs.status==200){
            document.getElementById("contenu").innerHTML=oXhrs.responseText;
        }
        else if( oXhrs.readyState==4){
            document.getElementById("contenu").innerHTML="<h1> la page n'est pas disponible.</h1><br/>Error !"+oXhrs.status+"<br/>";
        }
   }
   oXhrs.open("GET",UrlPage+"?rand="+Math.random(),false);
   oXhrs.send(null);
 

}
//map
    function burundimap() {
        var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 12,
            center: {lat: -3.3752972172990994, lng: 29.27197626647192}
        });

        var marker = new google.maps.Marker({
            position: {lat: -3.3752972172990994, lng: 29.27197626647192},
            map: map,
            title: "Bujumbura"
        });
    }

    //odal notification
    //document.querySelector("#close").addEventListener("click",function(){
    //document.querySelector(".popup").style.display="none";
        
    // });
    //search
    // let content = document.getElementById('reponseserveur');
    // function imu(x){
    // 	getPage('index.php');
    //     if (x.length == 0) {
    //         content.innerHTML = 'resultat vide...';
    //     }
    //     else{
    //         var XML = new XMLHttpRequest();
    //         XML.onreadystatechange = function(){
    //             if (XML.readyState == 4 && XML.status == 200) {
    //                 content.innerHTML = XML.responseText;
    //             }
    //         };
    //         XML.open('GET','index.php?q='+x,true);
    //         XML.send();
    //     }
    // }
//anime
// window.onload=function(){
//     const boxes=document.querySelectorAll('.anime');

//     boxes.forEach(function(box){
//         box.style.transition='all 0.3s ease';
//         box.style.transform='translateX(-100%)';
//         box.style.opacite='0';
//     });
//     setTimeout(function(){
//         box.ofsetHeight;
//         box.style.transform='translateX(0)';
//         box.style.opacite='1';
//     },100);


// };
//facebook
// (function(d, s, id) {
//       var js, fjs = d.getElementsByTagName(s)[0];
//       if (d.getElementById(id)) return;
//       js = d.createElement(s); js.id = id;
//       js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5";
//       fjs.parentNode.insertBefore(js, fjs);
//       }(document, 'script', 'facebook-jssdk'));
