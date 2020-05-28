<body>







<!-- modal de atualização do usuario -->
<div class="modal fade" id="alteracao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title" id="myModalLabel">Alterar dados do usuario</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-xs-6 col-md-6">
                        <label class="control-label">Usuário:</label>
                        <input name="musuario" id="musuario" class="form-control" placeholder="usuário" type="text" readonly>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="textUsuario" class="control-label">Tipo</label>
                        <select name="mcmb-tipo" id="mcmb-tipo" class="form-control selectpicker" data-container="body" data-width="100%" required>
                            <option></option>
                            <option>ADMINISTRADOR</option> 
                            <option>COMUM</option>
                        </select>     
                    </div>  

                    <div class="form-group col-xs-6 col-md-6">
                        <label class="control-label">Senha:</label>
                        <input type="password" class="form-control" placeholder="Senha" name="msenha" id="msenha" required>
                    </div>
                    <div class="form-group col-lg-6">      
                        <label for="inputPassword" class="control-label">Confirmação</label>      
                        <input type="password" class="form-control" placeholder="Confirme sua senha" 
                              name="mcsenha" id="mcsenha" data-minlength="6" required>      
                    </div>                   
                </div>
            </div>
            <div class="modal-footer" style="background-color: #A9A9A9;">
                <button type="submit" class="btn btn-lg btn-primary" onClick="alterar();">Alterar</button>
                <button type="button" class="btn btn-lg btn-primary" data-dismiss="modal">Sair</button>
            </div>
        </div>
    </div>
</div>


<div>
        <form id="formCadasVisi">
            <div class="panel panel-info">
                    <div class="panel-heading text-center"><h4>Cadastro de Visitantes</h4></div>
                        <div class="">
                            <div class="form-group col-lg-4">
                                <label for="textNome" class="control-label">Nome Visitante:</label>
                                <input name="valorNomeVisitante" id="valorNomeVisitante" class="form-control" placeholder="Digite o nome do convidado" type="text"  maxlength="110" required>
                            </div>

                            <div class="form-group col-lg-2" >
                            <label for="textUsuario" class="control-label">Quantos dias de acesso ?</label>
                            <select name="valorDuracaoDias" id="valorDuracaoDias" class="form-control" data-container="body" data-width="100%">
                                <option>1</option> 
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                            </select>    
                        </div>
                        <div class="panel-footer clearfix">

                            <div class="btn-group pull-left">      
                                    <button type="reset" class="btn btn-lg btn-primary" id="btnlimpar">Apagar</button>
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
                        data-height ="500"
                        data-search ="true"
                        data-search-align = "center"
                        accesskey=""
                        data-side-pagination ="client"
                        data-page-list="[5,10,15]"
                        data-pagination-first-text="First"
                        data-pagination-pre-text="Voltar"   
                        data-pagination-next-text="Próximo"
                        data-pagination-last-text="Last"
                        data-url= 'visitantes/listar'>  
                 <?php //Endereço do Controller responsável em buscar os dados da lista ?>
                    <thead>
                       <tr class="table-primary"> 
                            <th data-field='nome_visi' class="col-md-2 text-center">Visitante</th>
                                <?php  //campo usuario no bd ?>

                            <th data-field='diaFim'  data-formatter='diasRestantes' 
                                                class="col-sm-2 text-center">Valido até o dia </th> 
                                <?php  //campo ativo no bd ?>   <?php  ////aJUSTAR no banco?>

                            <th data-field='status_visi' class="col-sm-1 text-center">ATIVO ?</th> 
                                <?php  //campo ativo no bd ?>  <?php  ////aJUSTAR no banco?>

                            <th  data-formatter="btnEditOpcoes" data-field='nome_visi' 
                                            class="col-sm-1 text-center text-light">Ações</th>
                            <?php  //colocaremos a função data-formatter que chamará a função JavaScript ?>
                           
                        </tr>
                    </thead>
            </table>
        </div>
</div>
</div>



<div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="ModCenter" aria-hidden="true">
		<div class="modal-dialog modal-dialig-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="ModCenter">Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
						<span aria-hidden="true">&times;</span>						
					</button>						
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>Endereço de Email</label>
							<input type="Email" class="form-control" placeholder="Seu Email">
						</div>
							<div class="form-group">
							<label>Senha</label>
							<input type="password" class="form-control" placeholder="Senha">
						</div>
					</form>					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					<button type="button" class="btn btn-primary">Confirmar</button>
				</div>					
			</div>			
		</div>		
	</div>

</body>
