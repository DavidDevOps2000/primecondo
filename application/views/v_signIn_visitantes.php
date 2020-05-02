


<div>
        <form id="formCadastro">
            <div class="panel panel-primary">
                    <div class="panel-heading"><h4>Cadastro de usuários</h4></div>
                        <div class="panel-body">
                            <div class="form-group col-lg-6">
                                <label for="textNome" class="control-label">Usuário:</label>
                                <input name="usuario" id="usuario" class="form-control" placeholder="Digite seu Nome" onblur="Verifica();" type="text" required>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="textUsuario" class="control-label">Tipo</label>
                                <select name="cmb-tipo" id="cmb-tipo" class="form-control selectpicker" data-container="body" data-width="100%" required>
                                    <option></option>
                                    <option>ADMINISTRADOR</option> 
                                    <option>COMUM</option>
                                </select>     
                            </div>  

                            <div class="form-group col-lg-6">      
                                <label for="inputPassword" class="control-label">Senha</label>      
                                <input type="password" class="form-control" placeholder="Informe sua senha" name="senha" id="senha" data-minlength="6" required>      
                            </div>

                            <div class="form-group col-lg-6">      
                                <label for="inputPassword" class="control-label">Confirmação</label>      
                                <input type="password" class="form-control" placeholder="Confirme sua senha" name="csenha" id="csenha" data-minlength="6" required>      
                            </div>  
                            

                            <div class="panel-footer clearfix">

                                <div class="btn-group pull-left">      
                                    <button type="reset" class="btn btn-lg btn-danger" id = "btnlimpar">Limpar</button>
                                </div>

                                <div class="btn-group pull-right">      
                                    <button type="submit" class="btn btn-lg btn-primary">Salvar</button>
                                </div> 
                        </div>
                    </div>
                </form>
</div>