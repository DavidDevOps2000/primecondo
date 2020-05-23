

<div>
        <form id="formCadasVisi">
            <div class="panel panel-primary">
                    <div class="panel-heading"><h4>Cadastro de Visitantes</h4></div>
                        <div class="panel-body">
                            <div class="form-group col-lg-6">
                                <label for="textNome" class="control-label">Nome Visitante:</label>
                                <input name="usuario" id="usuario" class="form-control" 
                                placeholder="Digite seu Nome" onblur="Verifica();" type="text">
                            </div>

                            <div class="form-group col-lg-3" >
                            <label for="textUsuario" class="control-label">Quantos dias convidado(a) terá acesso ?</label>
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






<!--//Lista de Visitantes-->
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
                 data-url= 'usuario/listar'>  
                 <!--Endereço do Controller responsável em buscar os dados da lista -->
                        
                    <thead>
                        <tr>
                            <th data-field='nome_visi' class="col-md-2 text-center text-light bg-primary">Nome</th> 
                                <!--campo usuario no bd -->

                            <th data-field='status_visi' class="col-md-2 text-center text-light bg-primary">Ativo</th> 
                                <!--campo ativo no bd --> <!--//aJUSTAR no banco-->

                            <th data-field='diaFim' class="col-md-2 text-center text-light bg-primary">Valido até</th> 
                                <!--campo ativo no bd --> <!--//aJUSTAR no banco-->

                            <th  data-field ='nome_visi' data-formatter="opcoes" 
                                 class = "col-md-2 text-center text-light bg-primary">Desativar | Ativar</th>
                            <!--colocaremos a função data-formatter que chamará a função JavaScript
                            opcoes e não podemos esquecer de amarrar no data-field o campo que será o parâmetro de busca -->
                        </tr>
                    </thead>  
        </div>
 </div>

<script type="text/javascript">



        //função que faz aparereces 2 botoes o de busca e o de desativar
    function opcoes(value, row, index){
        if(row.estatus =='DESATIVADO'){
        var opcoes = '<button class="btn btn-xs btn-warning text-center" type="button" onClick="reativa_usuario('+"'"+ value +"'"+');"><span class="glyphicon glyphicon-open"></span></button>';

        }else{

        var opcoes = '<button class = "btn btn-xs btn-primary text-center" type="button" onclick="busca_usuario('+ "'" + value + "'" +');"><span class = "glyphicon glyphicon-pencil"></span></button>\n\
        <button class = "btn btn-xs btn-danger text-center" type="button" onclick="desativa_usuario('+ "'" + value + "'" +');"><span class = "glyphicon glyphicon-trash"></span></button>';
        }
        return opcoes;
    }


</script>
