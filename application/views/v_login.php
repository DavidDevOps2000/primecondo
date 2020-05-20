<html>
<<<<<<< HEAD
   
<!--//Modal Login-->
<div id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="ModCenter" aria-hidden="true">
		<div class="modal-dialog modal-dialig-centered" role="document">
			<div class="modal-content formPrincLogin">
				<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"> <span aria-hidden="true">&times;</span></button><!--//BotaoFechar-->
                <img src="<?= base_url('assets/img/imgLoginCenter.png')?>" width="200" height="150">

				</div>
				<div class="modal-body">

					<form id="formPrincipal">
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


=======
    <div class="container fundo_login">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <div class="login-panel panel panel-info" style="margin-top: 150px;">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-sign-in"></i> Login</h3>
                    </div>
                    <div class="panel-body">
                        <form autocomplete="off" id="formPrincipal">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control form-login-input" placeholder="Email do Morador" name="txtEmail" type="text" autofocus required>
                                </div>
                                <div>
                                    <label>
                                    Email e Senha cadastrados pelo o síndico do seu condominio.
                                    </label>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-login-input" placeholder="Senha" name="txtSenha" type="password" required>
                                </div>
                                <button type="submit" id="btnEntrar" class="btn btn-block btn-white" style="border-radius: 15px;"> Entrar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
>>>>>>> 6faae2c16c9743e939bbc7590e57a2ec675156fe
</html>

<script type="text/javascript" src=<?php echo strtoupper($this->session->userdata('usuario'))?>-->
 