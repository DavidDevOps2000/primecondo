<style>
.btn-entrar {			<?php //Coloquei aqui, pois, por conta da ordem de chama de arq .css, dá conflito ou nem funciona o arq externs, e aqui é uma maneira eficaz ?>
    background: #D5D5D5;
    background-image: -webkit-linear-gradient(top, #D5D5D5, #686868);
    background-image: -moz-linear-gradient(top, #D5D5D5, #686868);
    background-image: -ms-linear-gradient(top, #D5D5D5, #686868);
    background-image: -o-linear-gradient(top, #D5D5D5, #686868);
    background-image: linear-gradient(to bottom, #D5D5D5, #686868);
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 30px;
    color: #000000;
	width: 120px;
    box-shadow: 1px 1px 20px 0px #000000;
    -webkit-box-shadow: 1px 1px 20px 0px #000000;
    -moz-box-shadow: 1px 1px 20px 0px #000000;
    text-shadow: 1px 1px 20px #000000;
    border: solid #4e4e4e79 1px;
    display: inline-block;
}
.btn-entrar:hover {
    border: solid #97F1AE 1px;
    background: #D5D5D5;
    background-image: -webkit-linear-gradient(top, #D5D5D5, #97F1AE);
    background-image: -moz-linear-gradient(top, #D5D5D5, #97F1AE);
    background-image: -ms-linear-gradient(top, #D5D5D5, #97F1AE);
    background-image: -o-linear-gradient(top, #D5D5D5, #97F1AE);
    background-image: linear-gradient(to bottom, #D5D5D5, #97F1AE);
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    text-decoration: none;
}
</style>

<body class="home-fundo">
<div id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="ModCenter" aria-hidden="true">
		<div class="modal-dialog modal-dialig-centered" role="document">
			<div class="modal-content formPrincLogin">
				<div class="modal-header">
				<div style="text-align: center;">
					 <img src="<?= base_url('assets/img/imgLoginCenter.png')?>" width="200" height="150">
				</div>
				</div>
				<div class="modal-body">
					<form id="formLogin">
						<div class="form-group">
							<input class="form-control inputLoginGeral" placeholder="Digite seu Apelido" name="txtApelido" id="txtApelido" type="text" autofocus  maxlength="110">
						</div>
							<div class="form-group">
							<input class="form-control inputLoginGeral" placeholder="Senha" name="txtSenha" id="txtSenha" type="password"  maxlength="25">
                        </div>
                        <div class="modal-footer" style="display: flex;align-items: center; justify-content: center;">
								<button type="submit" class="btn-entrar btn-lg"  id="btnEntrar">Entrar</button>
				        </div>
					</form>					
				</div>									
			</div>			
		</div>		    
	</div>
</body>
