<?php
session_start();
include_once('BD.php'); 
include_once('function.php');
// $data = "k";
// if (isset($_GET['q'])) {
//     $data = $_GET['q'];
    
//       //&& isset($_GET['from']) && isset($_GET['to'])
//      //a.created BETWEEN '%$datecond%' AND '%$to%'
// }
// get("posting WHERE titre LiKE '%$data%' OR resume LiKE '%$data%' OR type_publication LiKE '%$data%'");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADCOV</title>
    <link rel="stylesheet" type="text/css" href="./fontawesome-free-5.15.4-web/css/all.css">   
    <link href="styles.css" rel="stylesheet">
    <link rel="stylesheet" href="modal.css">
    
   
</head>
<body>
<!--Nav markup goes here-->
<header class="container">
    <nav  id="nav">
        
        <div class="menu-icons">
            <i class="fas fa-bars"></i>
            <i class="fas fa-window-close"></i>
        </div>
        <a href="index.php" class="logo">
         <img src="./images/adcov.jpg" alt="" srcset="">
        </a>
        <ul class="nav-list">

                <li> <a href="javascript:void(0)">Securite_Allimentaire_Nutrition<i class="icon icon-md-arrow-dropdown"></i></a>
                    <ul class="sub-menu">
                        <li><a  href="javascript:void(0)" onclick="getPage('alimentaire.php')">Securite-alimentaire</a></li>
                        <li> <a  href="javascript:void(0)" onclick="getPage('nutrition.php')">nutrition</a></li>
                        <li><a  href="javascript:void(0)" onclick="getPage('eau.php')">WASH</a></li>
                    </ul>
                </li>

                <li><a href="javascript:void(0)">Sante<i class="icon icon-md-arrow-dropdown"></i></a>
                    <ul class="sub-menu">
                        <li ><a  href="javascript:void(0)" onclick="getPage('maladie.php')">Prevention des maladies</a></li>
                        <li><a  href="javascript:void(0)" onclick="getPage('sante.php')">Acces aux soins de sante</a> </li>
                        <li><a  href="javascript:void(0)" onclick="getPage('infantile.php')">Promotion de la sante maternelle et infantile</a></li>
                    </ul>
                </li>

                    <li ><a href="javascript:void(0)">Education<i class="icon icon-md-arrow-dropdown"></i></a>
                        <ul class="sub-menu">
                            <li><a  href="javascript:void(0)" onclick="getPage('enfant.php')">Soutien a l'education des enfants</a></li>
                            <li> <a  href="javascript:void(0)" onclick="getPage('professionnelle.php')">Formation professionnelle</a></li>
                            <li><a  href="javascript:void(0)" onclick="getPage('adult.php')">Alphabetisation des adultes</a></li>
                            <li><a  href="javascript:void(0)" onclick="getPage('ecole.php')">Construction d'ecoles</a></li>
                        </ul>
                    </li>
               
                <li><a href="javascript:void(0)">Autonomisation_Economique<i class="icon icon-md-arrow-dropdown"></i></a>
                    <ul class="sub-menu">
                        <li><a  href="javascript:void(0)" onclick="getPage('entreprise.php')">Creation des petites entreprises</a><li>
                        <li> <a  href="javascript:void(0)" onclick="getPage('microcredit.php')">Microcredits</a></li>
                        <li><a  href="javascript:void(0)" onclick="getPage('comptence.php')">developpement de competences</a></li>
                    </ul>
                </li>
                <li class="menu-item"><a href="javascript:void(0)">Protection_Sociale<i class="icon icon-md-arrow-dropdown"></i></a>
                    <ul class="sub-menu">
                        <li><a  href="javascript:void(0)" onclick="getPage('urgence.php')">aide humanitaire dans les conditions d'urgence</a><li>
                        <li> <a href="javascript:void(0)" onclick="getPage('protection.php')">protection des enfants</a></li>
                        <li><a  href="javascript:void(0)" onclick="getPage('agee.php')">Soutien aux personnes agees</a></li>
                        <li><a  href="javascript:void(0)" onclick="getPage('genre.php')">Lutte contre les violences basees sur le genre</a></li>
                    </ul>
                </li>
               <li><a  href="javascript:void(0)" onclick="getPage('index.php')">ADCOV</a></li>
        </ul>
        <div class="search"><input type="text" placeholder="rechercher" onkeyup="imu(this.value)"></div>
    </nav>
</header>
<!--End nav-->

<!--Hero-->
<section class="hero" id="reponseserveur">
    
    
        <div id="wropper">
            <div class="slider">

                   <div class="slide melance">
                            <img src="images/securite.jpg" alt="">
                            <div class="info">
                               <h2>securite alimentaire eT nutrition</h2>
                               
                            </div>
                    </div>

                    <div class="slide">
                            <img src="images/sante.jpg" alt="">
                            <div class="info">
                               <h2>Sante</h2>
                              
                            </div>
                    </div>

                    <div class="slide">
                            <img src="images/edu.jpg" alt="">
                            <div class="info">
                                <h2>Education</h2>
                                
                            </div>
                    </div>

                    <div class="slide">
                            <img src="images/econo.jpg" alt="">
                            <div class="info">
                               <h2>Autonomisation Economique</h2>
                               
                            </div>
                    </div>

                    <div class="slide">
                            <img src="images/protection.jpg" alt="" >
                            <div class="info">
                              <h2>Protection Sociale</h2>
                              
                            </div>
                    </div>

                    <div class="navigation">
                        <i class="fas fa-chevron-left prev-btn"></i>
                        <i class="fas fa-chevron-right next-btn"></i>
                   </div>

                    <div class="navigation-visibility">
                        <div class="slide-icon melance"></div>
                        <div class="slide-icon"></div>
                        <div class="slide-icon"></div>
                        <div class="slide-icon"></div>
                        <div class="slide-icon"></div>
                   </div>
            </div>


               

                <div class="move">
                    <div id="mover" class="anime">
                    
                        <div id="mover-header"><img src="images/vision.jpg" alt="" srcset="">Vision<div class="line"></div></div>
                        <p>
                        Monde solidaire débarrasser de la pauvreté, dans lequel les femmes et les hommes
                         défavorisés ont des choix et des opportunités de participer pleinement  à la bonne marche de la société, 
                         ont suffisamment de quoi nourrir et vêtir leurs familles,
                         ont accès  à l'éducation et aux soins de santé ou un emploi rémunérateur.
                        </p> 
                    </div>
                    <div id="mover"  class="anime">
                    
                        <div id="mover-header"><img src="images/mission.jpg" alt="" srcset="">Mission<div class="line"></div></div>
                        <p>
                        Œuvrer pour l'émergence d'une société burundaise solidaire et débarrasser de la pauvreté, dans laquelle les gens
                         peuvent vivre dans la dignité et le bien-être.
                        </p> 
                    </div>
                    <div id="mover" class="anime">
                    
                        <div id="mover-header"><img src="images/role.jpg" alt="" srcset="">Nos Valeurs<div class="line"></div></div>
                        <p>
                        L'ADCOV à comme valeur : disponibilité, durabilité, solidarité et l'autonomisation
                        </p> 
                    </div>
                    <div id="mover" class="anime">
                    
                        <div id="mover-header"><img src="images/icone6.png" alt="" srcset="">Role<div class="line"></div></div>
                        <p>
                        L'ADCOV a pour le rôle d'appuyer et accompagner les membres des communautés,
                         surtout ceux qui sont vulnérables, dans le processus du développement intégral.

                        </p> 
                    </div>
                    
            </div>
            <!--  -->
                <!-- <div class="row">
                   <div class="service">
                       <div class="section-title">
                           <h1>our services</h1>
                           <div class="line"></div>
                       </div>
                    </div>
                </div> -->
                
                    <div class="row">
                    <div class="title" style="color:brown;width:98vw;"><h1>QUI SOMMES-NOUS ?</h1></div>
                        <div class="service">
                            <img src="images/secu.jpg" alt="" srcset="">
                            <h1>securite alimentaire</h1>
                            <p>
                            Nous luttons pour la sécurité alimentaire en offrant des solutions durables aux populations vulnérables 
                            par des actions concrètes. Nous assurons 
                            l’accès à une alimentation saine et lutte contre la faim à travers le pays.  


                               </p></div>

                        <div class="service">
                            <img src="images/sa.jpg" alt="" srcset="">
                            <h1>Sante</h1>
                            <p>
                            Nous garantissons un accès facile aux services de sante essentiels et de qualité pour les femmes et enfants qui 
                            en ont le plus besoins sans distinctions surtout dans les communautés les plus vulnérables
                              
                              
                             
                              </p></div>

                        <div class="service">
                            <img src="images/edication.jpg" alt="" srcset="">
                            <h1>Education</h1>
                            <p>
                            ADCOV ouvre des portes vers un futur meilleur en offrant 
                              à chaque enfant et adulte l’accès a une éducation de qualité.
                            Chaque réussite est un pas vers un monde ou l'éducation est un droit non un privilège 

                                               
                                   
                         
                        
                              
                                </p></div>
                       <div class="service">
                            <img src="images/outo.jpg" alt="" srcset="">
                            <h1>Autonomisation Economique</h1>
                            <p> 
                            Nous nous basons sur la création des petites entreprises, l’épargne et le développement des compétences.
                               </p></div>
                       <div class="service">
                            <img src="images/prot.jpg" alt="" srcset="">
                            <h1>Protection sociale</h1>
                            <p>
                            Nous concentrons sur la protections des enfants, l'aide humanitaire,
                             soutien des personnes âgées et la lutte contre les violence basées sur le genre.

                              </p></div>
                       

                    </div>

                
    
                     <!--  -->
                <div class="maps">
                    <!-- <div class="about-content">
                        <h4>OUR Partenary</h4>
                        <h4>>charPickLocation() method, 450, 452, 466 chat sample application. See AjaxChat sample application checkboxNumber variable, 162, 169 checkGameWon() method</h4>
                        <p>charPickLocation() method, 450, 452, 466 chat sample application. See AjaxChat sample application checkboxNumber variable, 162, 169 checkGameWon() 
                            method, 460, 470 checkName()
                             function, 425 class members, JavaScript and, 54 classes directory, 98 clean target, 89 clearAttributes() method, 66 clearHistory() function, 382 client-side code</p>

                        <button class="btn btn-primary">lest tolk</button>
                        </div>
                        <div class="about-content">
                            <img src="images/securite.jpg" alt="" srcset="">
                        </div>
                    </div> -->
                       <!--  -->
                    
                        <div id="map" style="width:60%;margin:auto;height:60%">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127452.71045084276!2d29.27197626647192!3d-3.3752972172990994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19c1830f28a035a3%3A0xfeba9b97b50a4c3!2sBujumbura%2C%20Burundi!5e0!3m2!1sfr!2sus!4v1738589394414!5m2!1sfr!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    


                    <!--  -->
                
               
                <div class="title" style="color:brown;width:98vw;margin-top:18%;text-align:center"><h1>CONTACTONS-NOUS ?</h1></div>
                    <div id="moveres">
                    </div>
                        </div>
                              
                        <div class="row">
                    <div class="footer">
                    <div id="contenu"></div>
                        <div class="text">
                            <h2><i class="fab fa-instagram-square share"></i></h2>
                            <h2><i class="fab fa-whatsapp"></i></h2>
                            <h1><a  href="javascript:void(0)" onclick="faceboocktwitter('facebook.php')"><i class="fab fa-facebook-f"></i></a></h1>
                            <p><a class="twitter-timeline" href="https://twitter.com/seticburundi" ><i class="fab fa-twitter"></i></a></p>
                            <p><a href="mailto:adcovburundi@adcov.org"><i class="fa fa-envelope"></i></a></p>
                            <p> <input type="email" name="email" placeholder="entre votre email" style="line-height: 2em;">
                            <a  href="javascript:void(0)" onclick="faceboocktwitter('inscription.php')"><i class="fa fa-user"></i>S'inscrire</a></p>
                            <a href="#" class="btn"><i class="fa fa-phone"></i> +257 79 711 286 / +257 68 170 847</a>   
                            <div><h3>Email : adcovburundi@adcov.org, <span>Adresse : Avenue Bweru no 23,Rohero 2 </span></h3></div>
                      </div>
                       <marquee behavior="" direction=""> <h1><i class="fa fa-envelope">
                        <a href='mailto:ndayimelance2@gmail.com'>Site web encours de conception and COPYRIGHT BY @GICI 
                            <div class="span" style="color:brown;">(+257) 79 744 473/69 69 69 90 </div> </a></i></h1> </marquee>
                    </div>
     </div>
     <!-- modal -->
 <!-- <div class="popup">
    <button id="close">&times</button>
    <h1 style="color:green">USHAKA KUGIRA IMITAHE ?</h1>
    <p  style="color:#407">- Umutahe umwe ni : 250 000Fbu<br>
    - Umuntu umwe arekuriwe imitahe : 200<br>
    - Ishirahamwe rirekuriwe imitahe : 400<br>
    Kaze murahawe ikaze</p>
 </div> -->
</section>


<script src="scripts.js"></script>
</body>
</html>
