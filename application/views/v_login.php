<html>
   
<!--//Modal Login-->
<div id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="ModCenter" aria-hidden="true">
		<div class="modal-dialog modal-dialig-centered" role="document">
			<div class="modal-content formPrincLogin">
				<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"> <span aria-hidden="true">&times;</span></button><!--//BotaoFechar-->
                <img src="<?= base_url('assets/img/imgLoginCenter.png')?>" width="200" height="150">

				</div>
				<div class="modal-body">

					<form id="formLogin">
						<div class="form-group">
							<input class="form-control inputLoginGeral" placeholder="Email" name="txtEmail" id="txtEmail" type="text" autofocus >
						</div>
							<div class="form-group">
							<input class="form-control inputLoginGeral" placeholder="Senha" name="txtSenha" id="txtSenha" type="password" >
                        </div>
                        <div class="modal-footer">
					            <button type="button" class="btn btn-primary btn-entrar" data-dismiss="modal">Fechar</button>
				            	<button  type="submit" class="btn btn-primary btn-entrar" id="btnEntrar">Entrar</button>
				        </div>
					</form>					
				</div>
									
			</div>			
		</div>		    
	</div>


</html>

<!--/<script type="text/javascript" src=<?php echo strtoupper($this->session->userdata('usuario'))?>-->
 