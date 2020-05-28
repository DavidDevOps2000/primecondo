<body>

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
                                    <button type="reset" class="btn btn-lg btn-primary" id="btnlimpar">Limpar</button>
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
                            <th data-field='nome_visi' class="col-md-1 text-center">Visitante</th>
                                <?php  //campo usuario no bd ?>

                            <th data-field='diaFim'  data-formatter='diasRestantes' 
                                                class="col-sm-1 text-center">Valido até o dia </th> 
                                <?php  //campo ativo no bd ?>   <?php  ////aJUSTAR no banco?>

                            <th data-field='status_visi' class="col-md-1 text-center">ATIVO ?</th> 
                                <?php  //campo ativo no bd ?>  <?php  ////aJUSTAR no banco?>

                            <th  data-formatter="opcoesTudo" data-field='nome_visi' 
                                            class="col-sm-1 text-center text-light">Ações</th>
                            <?php  //colocaremos a função data-formatter que chamará a função JavaScript ?>
                           
                        </tr>
                    </thead>
            </table>
        </div>
</div>
</div>

</body>