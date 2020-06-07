<body class="home-fundo">

<div>                               <?php //Painel Superio ?>
     <div class="text-center">
         <a href="<?= base_url('home')?>">
            <img src="<?= base_url('assets/img/img_center.png')?>" width="200" height="150">
        </a>
    </div>



                                    <?php //inicio menu ?>

                                <div class="container-fluid">
                                    </div><p style="color:white;  font-size: ; text- align: justify"> <?php echo $_SESSION['email']; ?></p>
                                </div>
<div class="container-fluid" >
                <nav class="navbar navbar-default menuPrinc">
                        <div class="container-fluid"> 
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
                        
                    <ul role="menu" class="dropdown-menu" ></ul>
                        <li class=""><a href="#" onclick="home()">Inicio</a></li>
                        <li class=""><a href="#" onclick="aviso()">Avisos</a></li>
                        <li class=""><a href="#" onclick="regra()">Regras</a></li>
                        <li class=""><a href="#" onclick="visitantes();">Visitantes</a></li>
                        <li class=""><a href="#" onclick="prestador();">Prestador de Serviços</a></li>
                        <li class=""><a href="#" onclick="reclamacao()"> Reclamação</a></li>
                        <li class=""><a href="#" onclick="ajuda()"> Ajuda</a></li>

                        <li class="caixa_alta navbar-right"><a href="<?php echo base_url('Visitantes/logout'); ?>">SAIR</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>




<div class="divMsgCentro">
            <label class="msgCentro">Tecnologia e Segurança juntos por único objetivo.</label><br>
            <input type="button" class="btn_queSomos" value="Quem Somos">
        </div>



