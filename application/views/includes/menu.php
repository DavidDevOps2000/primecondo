<div class="container-fluid" >
                <nav class="navbar navbar-default menuPrinc" >
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
                        
                    <ul role="menu" class="dropdown-menu" style="margin: 0 auto;" ></ul>
                        <li class="" style="margin-left:265px"><a href="#" onclick="home()">INICIO</a></li>
                        <li class=""><a href="#" onclick="aviso()">AVISOS</a></li>
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



<script>

function visitantes(){ window.location.href="visitantes";}

function home(){ window.location.href="home";}


function regras(){ window.location.href="regras";}


function contatos(){ window.location.href="contatos";}


function avisos(){ window.location.href="avisos";}

</script>
