<!DOCTYPE html>
<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

   
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    </head>
    <body class="color: grey lighten-4">
        
    <nav class="blue-grey">
    <div class="nav-wrapper">
      <a href="<?= site_url() ?>" class="brand-logo right">horaTrabalhada</a>
      <ul id="nav-mobile" class="left">
   
        <li><a href="collapsible.html"><a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
      </a></li>
      </ul>
    </div>
  </nav>

<ul id="slide-out" class="sidenav">
    <br>
      
      <li><a class="waves-effect waves-light btn blue-grey lighten-3 " href="<?= site_url()?>"  ><i class="material-icons black-text">blur_on</i>Registrar Ponto</a></li>
      <!-- <li><a class="waves-effect waves-light btn blue-grey lighten-3 " href="<?php site_url() . '/horaTrabalhada/validacao'; ?>" ><i class="material-icons black-text">blur_circular</i>Validadores</a></li>     -->
      <li><a class="waves-effect waves-light btn blue-grey lighten-3 modal-trigger" href="#modal1<?php //php site_url().'/horaTrabalhada/read_registros' ?>" ><i class="material-icons black-text">blur_linear</i>Histórico</a></li>

      
      <li><div class="user-view">
      <div class="background blue-grey lighten-5">
        <!-- <img class="responsive-img" src="https://foconaproducao.com.br/wp-content/uploads/2020/01/tempo-de-ciclo-takt-time-lead-time.jpg"> -->
        
         
      </div>
          horaTrabalhada.exe
        <!-- <a href="#user"><img class="circle responsive-img" src="https://img.freepik.com/premium-photo/3d-head-woman-human-artificial-intelligence-ai-generated-profile-future-tech-machine-learning-engineering-abstract-face-futuristic-digital-transformation-person-blue-background_590464-162316.jpg"></a>
        -->
      </div>
    </li>
      <li><div class="divider"></div></li> 
      <li><a class="subheader">Sobre</a></li>
      <li>
      <div class="collapsible-header waves-effect waves-light btn blue-grey lighten-3"><i class="material-icons black-text">blur_linear</i>versões
      </div>
      <li>
      <div class="collapsible-body">
            <span>Lorem ipsum dolor sit amet.</span>
          </div>
          
      </li>
      <li><a class="waves-effect modal-trigger"  href="#modal2">READ.ME</a></li>


      <li><a href="#name" class="waves-effect"><span class="  text-lighten-2 name"><span>Henrique Lopes <span class="right">@2023</span></span></a></li>
      <li><a href="mailto:henriquelopes@artebodoque.com? subject=subject text" ><span class="blue-text"> henriquelopes@artebodoque.com</span></a></li>

</ul>

      
  <div id="modal2" class="modal modal-fixed-footer" >
    <div class="modal-content">
    <p class="center">README - ***melhorando</p>
    <?php 
        echo readfile("../README.md");
    ?>

      <div class="row ">
        <div class="col s8 ">
          <img class="responsive-img "src=""/>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>


  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer" >
    <div class="modal-content">
    <p class="center">Trabalhando nesta funcionalidade.</p>
    <p class="center">Ajude-me a melhorar este código pelo github, ou crie apartir dele!</p>
    
      <div class="row ">
        <div class="col s8 ">
          <img class="responsive-img "src=""/>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
          


  <script type="text/javascript">

$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.modal').modal();
    $('.collapsible').collapsible();
  });
      
    </script>

