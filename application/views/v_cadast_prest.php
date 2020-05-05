<div>
        <form id="formCadastroPrestPrest">
            <div class="panel panel-primary">
                    <div class="panel-heading text-center"><h4>Cadastro de Prestadores de Serviços</h4></div>
                        
                        
                        <div class="form-group col-lg-3">
                                <input name="servicos[]" id="entrega" value="entrega" type="checkbox">
                                <label for="textNome" class="control-label">Entrega</label>
                                <br>
                                <input name="servicos[]" id="encanamento" value="encanamento" type="checkbox">
                                <label for="textNome" class="control-label">Encanamento</label>
                                <br>
                                <input name="servicos[]" id="reforma" value="reforma" type="checkbox">
                                <label for="textNome" class="control-label">Reforma</label>
                                <br>
                                <input name="servicos[]" id="eletricista" value="eletricista" type="checkbox">
                                <label for="textNome" class="control-label">Eletricista</label>
                                <br>
                                <input name="servicos[]" id="outros" value="outros" type="checkbox">
                                <label for="textNome" class="control-label">Outros, qual ?</label>
                        </div>
                                
                        <div class="form-group col-lg-3">
                                <label for="textNome" class="control-label">Explique com poucas palavras como será esse serviço ?</label>
                                <textarea class="form-control" style="resize: none" placeholder="Digite o nome do Serviço"></textarea>
                        </div>
                          
                        <div class="form-group col-lg-3" style="padding-top:1.5%">
                            <label for="textUsuario" class="control-label">Quantos dias vai durar esse serviço ?</label>
                            <select name="cmb-tipo" id="cmb-tipo" class="form-control" data-container="body" data-width="100%">
                                <option>1 Dia</option> 
                                <option>2 Dias</option>
                                <option>3 Dias</option>
                                <option>4 Dias</option>
                                <option>5 Dias</option>
                                <option>6 Dias</option>
                                <option>Indeterminado</option>
                                
                            </select>     
                        </div>  

                    <div class="panel-footer clearfix" style="padding-top:15%">
                        <div class="btn-group pull-left">      
                            <button type="reset" class="btn btn-lg btn-danger" id = "btnlimpar">Cancelar</button>
                        </div>

                        <div class="btn-group pull-right">      
                            <button type="button" data-toggle="modal" data-target="#MyModal" class="btn btn-lg btn-success">Confirmar</button>
                        </div> 
                    </div>
                       
                    </div>
                </form>
</div>

    
<!--// Confirm-->

<div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="ModCenter" aria-hidden="true">
		<div class="modal-dialog modal-dialig-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"> <span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="ModCenter">Por favor, Confirme sua a senha</h4>			
				</div>
				<div class="modal-body">
					<form id="formConf">
						<div class="form-group">
							<label>Senha</label>
							<input type="password" class="form-control" placeholder="Senha" name="senha" id="senha">
						</div>
							<div class="form-group">
							<label>Confirme Senha</label>
							<input type="password" class="form-control" placeholder="Digite Novamente" name="csenha" id="csenha">
                        </div>
                        <div class="modal-footer">
					            <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
				            	<button type="submit" class="btn btn-primary">Confirmar</button>
				        </div>
					</form>					
				</div>
									
			</div>			
		</div>		
	</div>



<script type="text/javascript"> //Fazer o metodo de enviar dados para a model e cadastrar poe lá, e Veja como fazer o Check
$(document).ready(()=>{
        //Salva o cadastro do usuário
        $("#formConf").submit(function(event){
            if($("#senha").val() != $("#csenha").val()){
                swal({
                    title: "Atenção!",
                    text: "Senhas incompatíveis, verifique!",
                    type:"error",
                });
                return false;
            }else{
                $.ajax({
                    type: "POST",
                    url: "usuario/cadastrar",
                    data: $("#formCadastro").serialize(),
                    success: function(data){
                        if($.trim(data) == 1){

                            $("#formCadastro").trigger("reset");
                            swal({title: "OK!", text: "Dados salvos com sucesso.", type: "success"});
                        }else{
                            swal({title: "ATENÇÃO!", text: "Erro ao inserir, verifique!", type: "error",});
                        }

                    },
                    beforeSend: function(){
                        swal({title: "AGUARDE!", text: "Carregando...", imageUrl: "assets/img/gifs/preloader.gif",});
                    },
                    error: function(){
                        alert:("Unexpected error.");
                
                    }
                });
                return false;
            }
        });
        setInterval(function(){
            var $table = $('#tableusu');
            $table.bootstrapTable('refresh');
        }, 5000)
    });
</script>