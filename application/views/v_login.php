<html>
    <div class="container">
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
                                    <input class="form-control" placeholder="Usuário" name="txtEmail" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="txtSenha" type="password" required>
                                </div>
                                <button type="submit" id="btnEntrar" class="btn btn-block btn-primary"> Entrar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>

<!--/<script type="text/javascript" src=<?php echo strtoupper($this->session->userdata('usuario'))?>-->
 