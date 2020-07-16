<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<style>
  body{
    text:white;
  }
  .menuPrinc {/*Antigo navBar*/
    margin: 0 auto;
    background-image: url("<?= base_url('assets/img/fundoMenuPrinc.png')?>");
    border-radius:13px; 
    display: block; 
    float: none !important;
    box-sizing: content-box;
    justify-content: center;
    align-items: center;
     }
ul {
 list-style-type: none;
 font-size:20px
 }
 a{
   color:white;
 }
 .navBarDiv{
	border-top: transparent;
	border-right: transparent;
	border-left: transparent;
	border-bottom: 2px solid white;
  width:80%;
  height:40px;
  } 
</style>

<body class="home-fundo">
<div>                               <?php //Painel Superio ?>
     <div class="text-center">
         <a href="<?= base_url('home')?>"> <img src="<?= base_url('assets/img/img_center.png')?>" width="200" height="150"></a>
    </div>
</div>

<div style="transform:translate(0%,0%)">
  <div class="row">
      <div class="container-fluid navBarDiv">
        <nav class="navbar navbar-dark navbar-left">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuPrincOpcoes" 
              aria-controls="menuPrincOpcoes" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
          </nav>
      </div>
  </div>
    <div style="transform:translate(-25%);">
      <div class="collapse" id="menuPrincOpcoes">
          <ul class="w-25 p-4 menuPrinc" style="border-radius:12px; width:150px">
            <li><a class="nav-link" href="#" onclick="home()">Home</a></span></li>
            <li><a class="nav-link" href="#" onclick="visitantes()">Visitantes</a></span></li>
            <li><a class="nav-link" href="#" onclick="avisos()">Avisos</a></span></li>
            <li><a class="nav-link" href="#" onclick="contatos()">Contatos</a></span></li>
            <li><a class="nav-link" href="#" onclick="regras()">Regras</a></span>
            <li><a class="nav-link" href="<?php echo base_url('Visitantes/logout'); ?>">Sair</a></span></li>
          </ul>
      </div>
    </div>
</div>
<br>

  <div class="divMsgCentro">
      <label class="msgCentro">Prime Condo</label><br>
      <label class="msgCentro">Tecnologia e Segurança juntos por único objetivo.</label><br>
      <input type="button" class="btn_queSomos" value="Quem Somos"><br>
      <label class="msgCentro">© 2019-2020 PrimeCondo Todos os Direitos Reservados</label>
  </div>
<script>
      function visitantes(){ window.location.href="visitantes";}
      function home(){ window.location.href="home";}
      function regras(){ window.location.href="regras";}
      function contatos(){ window.location.href="contatos";}
      function avisos(){ window.location.href="avisos";}
</script>

</body>

<? // DICA SUPER IMPORTANTE PARA TESTE DE PHP...
// QUANDO VC EXECUTAR UMA FUNÇÃO E DER ERRO DE BANCO VÁ EM    CONSOLE - CLIQUE NA FUNÇAO COM STATUS DE ERRO - CLIQUE EM RESPONSE
    // PARA SABER O ERRO ATRAVÉS DE AVISOS EM PHP ?>