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
                        <li class=""><a href="#" onclick="home()">Home</a></li>
                        <li class=""><a href="#" onclick="aviso()">Avisos</a></li>
                        <li class=""><a href="#" onclick="regra()">Regras</a></li>
                       
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Sua Casa<b class="caret"></b></a>
                            <ul role="menu" class="dropdown-menu" style="text-align: center">
                                <li class="subMenuInterno"><a href="#" onclick="multa();">Multas</a></li>
                                <li class="subMenuInterno"><a href="#" onclick="visitante();">Visitantes</a></li>
                                <li class="subMenuInterno"><a href="#" onclick="prestador_Serv();">Prestador de Serviços</a></li>
                            </ul>
                        </li>

                        <li class=""><a href="#" onclick="reclamacao()" > Reclamação</a></li>
                        <li class=""><a href="#" onclick="ajuda()" > Ajuda</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>



<script>

var base_url = "<?= base_url()?>";
function visitante(){
    window.location.href = base_url + "visitantes";
}

function prest_serv(){
    window.location.href = base_url + "cadast_prest";
}
</script>
