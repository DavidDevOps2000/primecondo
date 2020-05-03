<div>
        <form id="formCadastroPrest">
            <div class="panel panel-primary">
                    <div class="panel-heading text-center"><h4>Cadastro de Prestadores de Serviços</h4></div>
                        
                        
                        <div class="form-group col-lg-3">
                                <input name="usuario" id="usuario" type="checkbox" required>
                                <label for="textNome" class="control-label">Entrega</label><br>
                                <input name="usuario" id="usuario" type="checkbox" required>
                                <label for="textNome" class="control-label">Encanamento</label><br>
                                <input name="usuario" id="usuario" type="checkbox" required>
                                <label for="textNome" class="control-label">Reforma</label><br>
                                <input name="usuario" id="usuario" type="checkbox" required>
                                <label for="textNome" class="control-label">Eletricista</label><br>
                                <input name="usuario" id="usuario" type="checkbox" required>
                                <label for="textNome" class="control-label">Outros, qual ?</label><br>
                        </div>
                                
                        <div class="form-group col-lg-3">
                                <label for="textNome" class="control-label">Explique com poucas palavras como será esse serviço ?</label>
                                <textarea class="form-control" style="resize: none" placeholder="Digite o nome do Serviço"></textarea>
                        </div>
                          
                        <div class="form-group col-lg-3" style="padding-top:1.5%">
                            <label for="textUsuario" class="control-label">Quantos dias vai durar esse serviço ?</label>
                            <select name="cmb-tipo" id="cmb-tipo" class="form-control selectpicker" data-container="body" data-width="100%" required>
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
                            <button type="submit" class="btn btn-lg btn-success">Confirmar</button>
                        </div> 
                    </div>
                       
                    </div>
                </form>
</div>