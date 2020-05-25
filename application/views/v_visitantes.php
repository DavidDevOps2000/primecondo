

<div>
        <form id="formCadasVisi">
            <div class="panel panel-primary">
                    <div class="panel-heading"><h4>Cadastro de Visitantes</h4></div>
                        <div class="panel-body">
                            <div class="form-group col-lg-6">
                                <label for="textNome" class="control-label">Nome Visitante:</label>
                                <input name="valorNomeVisitante" id="valorNomeVisitante" class="form-control" placeholder="Digite o nome do convidado" type="text" required>
                            </div>

                            <div class="form-group col-lg-3" >
                            <label for="textUsuario" class="control-label">Quantos dias convidado(a) terá acesso ?</label>
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
                                    <button type="reset" class="btn btn-lg btn-danger" id = "btnlimpar">Limpar</button>
                                </div>

                                <div class="btn-group pull-right">      
                                    <button type="submit" class="btn btn-lg btn-primary">Salvar</button>
                                </div>
                        </div>
                    </div>
        </form>
</div>




<?php //Lista de Visitantes ?>
<div class="panel panel-info">
     <div class="panel-heading text-center"> <h1 class="panel-title text-light">Lista de Visitantes</h1></div>
        <div class="panel-body margem">
            <table id ="listaVisi"
                 data-toggle ="table"
                 data-height ="205"
                 data-search ="true"
                 data-search-align = "center"
                 accesskey=""
                 data-side-pagination ="client"
                 data-pagination ="true"
                 data-page-list="[5,10,15]"
                 data-pagination-first-text="First"
                 data-pagination-pre-text="Previous"   
                 data-pagination-next-text="Next"
                 data-pagination-last-text="Last"
                 data-url= 'visitantes/listar'>  
                 <?php //Endereço do Controller responsável em buscar os dados da lista ?>
                        
                    <thead>
                        <tr>
                            <th data-field='nome_visi' class="col-md-2 text-center text-light bg-primary">Nome Visitante</th> 
                                <?php  //campo usuario no bd ?>

                            <th data-field='status_visi' class="col-md-2 text-center text-light bg-primary">Ativo ?</th> 
                                <?php  //campo ativo no bd ?> <?php  ////aJUSTAR no banco?>

                            <th data-field='diaFim' class="col-md-2 text-center text-light bg-primary">Valido até</th> 
                                <?php  //campo ativo no bd ?> <?php  ////aJUSTAR no banco?>

                            <th  class = "col-md-2 text-center text-light bg-primary" data-formatter="opcoes" data-field='nome_visi'>Ações</th>
                            <?php  //colocaremos a função data-formatter que chamará a função JavaScript ?>
                            <?php//opcoes e não podemos esquecer de amarrar no data-field o campo que será o parâmetro de busca ?>
                        </tr>
                    </thead>  
        </div>
 </div>
