<body class="home-fundo">

<div>                               <?php //Painel Superio ?>
     <div class="text-center">
         <a href="<?= base_url('home')?>">
            <img src="<?= base_url('assets/img/img_center.png')?>" width="200" height="150">
        </a>
    </div>


                                    <?php //inicio menu ?>

                                <div class="container-fluid">
                                <label class="control-label" name="vlrApelido" id="vlrApelido"><?php echo $_SESSION['apelido'];?></label>
                                </div>
<div class="container" >
                <nav class="navbar navbar-default menuPrinc">
                        <div class="container"> 
                            <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuSanduiche"><?php //Btn Menu sanduihce ?>
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                            </div>

                    <div class="collapse navbar-collapse fundoMenuSanduiche" id="menuSanduiche">
                    <ul class="nav navbar-nav">
                        <li class=""><a href="#" onclick="home()">INICIO</a></li>
                        <li class=""><a href="#" onclick="avisos()">AVISOS</a></li>
                        <li class=""><a href="#" onclick="regras()">REGRAS</a></li>
                        <li class=""><a href="#" onclick="visitantes();">VISITANTES</a></li>
                        <li class=""><a href="#" onclick="contatos()"> CONTATOS</a></li>

                        <li class="caixa_alta navbar-right"><a href="<?php echo base_url('Visitantes/logout'); ?>">SAIR</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>


<Script>

function visitantes(){ window.location.href="visitantes";}

function home(){ window.location.href="home";}


function regras(){ window.location.href="regras";}


function contatos(){ window.location.href="contatos";}


function avisos(){ window.location.href="avisos";}

</script>


<div class="divMsgCentro">
            <label class="msgCentro">Tecnologia e Segurança juntos por único objetivo.</label><br>
            <input type="button" class="btn_queSomos" value="Quem Somos"><br>
            <label class="msgCentro">© 2019-2020 PrimeCondo Todos os Direitos Reservados</label>
        </div>



<? // DICA SUPER IMPORTANTE PARA TESTE DE PHP...
// QUANDO VC EXECUTAR UMA FUNÇÃO E DER ERRO DE BANCO VÁ EM    CONSOLE - CLIQUE NA FUNÇAO COM STATUS DE ERRO - CLIQUE EM RESPONSE
    // PARA SABER O ERRO ATRAVÉS DE AVISOS EM PHP ?>