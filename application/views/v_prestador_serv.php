<body>

<?php //-- atualização de Convidado ?>
<div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="ModCenter" aria-hidden="true">
	<div class="modal-dialog modal-dialig-centered" role="document">
			    <div class="modal-content">
				    <div class="modal-header"> <input type="button" class="close" data-dismiss="modal" aria-label="Fechar" aria-hidden="true" name="btnClose" value="&times;">
                    <h4 class="modal-title" id="ModCenter">Editar Prestador de Serviços</h4>						
				</div>
		    <div class="modal-header">
				<form id="formaAlter">
					<div class="form-group">
							<input class="form-control" type="text" name="vlrNomeVisi" id="vlrNomeVisi" placeholder="Escreva novo nome do visitante">
					</div>  
                    <div class="row-md-1">
                        
                            <label class="control-label">Entrada Autorizado(a) ?</label><br>
                            <label class="control-label" style="padding-right:80%" name="vlrAutoriza" id="vlrAutoriza">SIM</label>
                            <input type="button" class="btn btn-primary" onClick="mudarStatus()" value="Alterar">
                    </div>
                    <br>
                    
                    <div class="row-md-1">
                        <span>
                            <label class="control-label">Validade:</label>
                            <label class="control-label" name="vlrDiaFim" id="vlrDiaFim">99/99/99</label>
                            <label class="control-label"  style="padding-left:45%">Qual tipo de serviço ?</label>
                        </span>
                        <br>
                    </div>
                    <div>
                        <span class="col-md-5" style="margin-left:60%">

                            <select class="form-control" name="vlrMaisDias" id="vlrMaisDias">
                                
                                <option>Entrega</option> 
                                <option>Encanamento</option> 
                                <option>Reforma</option>
                                <option>Eletricista</option>
                                <option>Outros</option>
                        </select>
                        </span>
                    </div> 
                </div>
			</form>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					<button type="button" onClick="alterVisita()" class="btn btn-primary">Confirmar</button>
				</div>
			</div>
            </div>			
        </div>
</div>	



<?php //Cadastro convidado ?>
<div>
    <form id="formCadasVisi">
        <div class="panel panel-info">
            <div class="panel-heading text-center"><h4>Cadastro Prestadores de Serviços</h4></div>
                <div class="">


                <div class="form-group col-lg-2" >
                        <label for="textUsuario" class="control-label">Qual o tipo de serviço ?</label>
                        <select name="valorDuracaoDias" id="valorDuracaoDias" class="form-control" data-container="body" data-width="100%">
                                <option>Entrega</option> 
                                <option>Encanamento</option> 
                                <option>Reforma</option>
                                <option>Eletricista</option>
                                <option>Outros</option>
                        </select>    
                        </div>
                    <div class="form-group col-lg-4">
                        <label for="textNome" class="control-label">Observação:</label>
                        <input name="valorNomeVisitante" id="valorNomeVisitante" class="form-control" placeholder="Faça uma observação breve sobre o serviço" type="text"  maxlength="110" required>
                    </div>
                        
                    <div class="panel-footer clearfix">
                        <div class="btn-group pull-left">      
                                    <button type="reset" class="btn btn-lg btn-primary" id="btnlimpar">Apagar Campo</button>
                        </div>
                        <div class="btn-group pull-right">      
                                    <button type="submit" class="btn btn-lg btn-success">Confirmar</button>
                        </div>
                            
                        </div>

                    </div>
    </form>

<?php //Lista de Visitantes ?>
<div class="panel panel-info">
        <div class="panel-body margem">
                <table id ="listaVisi"
                        data-toggle ="table"
                        data-height ="350"
                        data-search ="true"
                        data-search-align = "center"
                        accesskey=""
                        data-side-pagination ="client"
                        data-page-list="[5,10,15]"
                        data-pagination-first-text="First"
                        data-pagination-pre-text="Voltar"   
                        data-pagination-next-text="Próximo"
                        data-pagination-last-text="Last"
                        data-url= 'prestador_serv/listar'>  
                 <?php //Endereço do Controller responsável em buscar os dados da lista ?>
                    <thead>
                       <tr class="table-primary"> 
                            <th data-field='nome_visi' class="col-md-1 text-center">Nome Prestador</th>
                                <?php  //campo usuario no bd ?>

                            <th  data-field='nome_visi' class="col-sm-1 text-center text-light">Observação</th>
                                <?php  //colocaremos a função data-formatter que chamará a função JavaScript ?>
                                
                            <th data-field='diaFim' data-formatter='diasRestantes' 
                                                class="col-md-1 text-center">Valido até</th> 
                                <?php  //campo ativo no bd ?>   <?php  ////aJUSTAR no banco?>

                            <th data-field='status_visi' class="col-sm-1 text-center">Autorizado?</th> 
                                <?php  //campo ativo no bd ?>  <?php  ////aJUSTAR no banco?>


                            <th  data-formatter="btnEditOpcoesPrest" data-field='nome_visi' 
                                            class="col-sm-1 text-center text-light">Opções</th>
                            <?php  //colocaremos a função data-formatter que chamará a função JavaScript ?>
                           
                        </tr>
                    </thead>
            </table>
        </div>
</div>
</div>



</body>
