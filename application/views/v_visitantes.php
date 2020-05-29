<body>

<?php //-- atualização de Convidado ?>
		<div class="modal-dialog modal-dialig-centered" role="document">
			<div   div class="modal-content">
				<div class="modal-header">
                <input type="button" class="close" data-dismiss="modal" aria-label="Fechar" aria-hidden="true" name="btnClose" value="&times;">
                    <h5 class="modal-title" id="ModCenter">Editar Visitante</h5>						
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
                            <label class="control-label" name="nomeVisiAtual" id="nomeVisiAtual">Novo nome do Visitante</label>
							<input class="form-control"  type="text" name="vlrNomeVisi" id="vlrNomeVisi" placeholder="Escreva o nome do visitante">
						</div>
						<div class="form-group col-lg-2">

                        <label for="textUsuario" data-field='nome_visi' data-formatter='opcoes' class="control-label">Autoriza?</label>
                        <input type="text" class="form-control" name="vlrAutoriza" id="vlrAutoriza" readonly>
                        </div>
                        <div class="form-group col-lg-2" >
                        <input type="text" class="form-control" data-field='diaFim' data-formatter='diasRestantes' name="vlrDiaFim" id="vlrDiaFim" class="col-md-1" readonly>
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
					</form>					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					<button type="button" onClick=" alterVisi()" class="btn btn-primary">Confirmar</button>
				</div>					
			</div>			
        </div>

	



<?php //Cadastro convidado ?>
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
                        data-url= 'visitantes/listar'>  
                 <?php //Endereço do Controller responsável em buscar os dados da lista ?>
                    <thead>
                       <tr class="table-primary"> 
                            <th data-field='nome_visi' class="col-md-1 text-center">Visitante</th>
                                <?php  //campo usuario no bd ?>

                            <th data-field='diaFim' data-formatter='diasRestantes' 
                                                class="col-md-1 text-center">Valido até</th> 
                                <?php  //campo ativo no bd ?>   <?php  ////aJUSTAR no banco?>

                            <th data-field='status_visi' class="col-sm-1 text-center">Autorizado?</th> 
                                <?php  //campo ativo no bd ?>  <?php  ////aJUSTAR no banco?>

                            <th  data-formatter="btnEditOpcoes" data-field='nome_visi' 
                                            class="col-sm-1 text-center text-light">Opções</th>
                            <?php  //colocaremos a função data-formatter que chamará a função JavaScript ?>
                           
                        </tr>
                    </thead>
            </table>
        </div>
</div>
</div>



</body>
