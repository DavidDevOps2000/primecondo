

<div>
        <form id="formCadastro">
            <div class="panel panel-primary">
                    <div class="panel-heading"><h4>Cadastro de Visitantes</h4></div>
                        <div class="panel-body">
                            <div class="form-group col-lg-6">
                                <label for="textNome" class="control-label">Nome Visitante:</label>
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






<!--//Lista de Visitantes-->
<div class="panel panel-info">
     <div class="panel-heading text-center"> <h1 class="panel-title">Lista de Visitantes</h1></div>
        <div class="panel-body margem">
            <table id ="tableusu"
                 data-toggle ="table"
                 data-height ="205"
                 data-search ="true"
                 data-search-align="center"
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
                            <th data-field = 'usuario' class = "col-md-3 text-center text-light bg-primary">Nome</th> 
                                <!--campo usuario no bd -->
          
                            <th data-field = 'senha' class = "col-md-3 text-center text-light bg-primary">Senha</th>
                                <!--campo senha no bd -->

                            <th data-field = 'ativo' id="tipoCampo" class = "col-md-3 text-center text-light bg-primary">Ativo</th> 
                                <!--campo ativo no bd --> <!--//aJUSTAR no banco-->

                            <th  data-field ='usuario' data-formatter="opcoes" class = "col-md-3 text-center text-light bg-primary">Ação</th>
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


  
function desativa_usuario(usuario){
                swal({//Primeiro a pergunta
                    title:"Atenção",
                    type: "Gostaria de DESATIVAR esse Usuário?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "DD6B55",
                    confirmButtonText: "Sim",
                    cancelButtonText: "Não",
                    closeOnConfirm: false,
                    closeOnCancel: true
                    },
                        function(isConfirm){// Se ao clicar em sim
                                    
                                if(isConfirm){//Se ao clicar em confirmar e for ...

                                            $.ajax({
                                                    url: base_url + "usuario/desativar",//indo 
                                                    type: "POST",
                                                    data: {'usuario':usuario},
                                                    success: function(data){
                                                                    
                                                        if(data == 1){
                                                    
                                                                swal({
                                                                     title: "OK",
                                                                     text: "Usuário DESATIVADO!",
                                                                     type: "success",
                                                                     showCancelButton: false,
                                                                     confirmButtonColor: "54DD74",
                                                                     confirmButtonText: "OK!",
                                                                     cancelButtonText: "",
                                                                     closeOnConfirm:true,
                                                                     closeOnCancel: false
                                                                    },
                                                                    function(isConfirm){
                                                                                
                                                                            if(isConfirm){
                                                                                
                                                                                $('#tableusu').bootstrapTable('refresh');
                                                                            }
                                                                    });
                                                        }else{
                                                            swal({
                                                                    title: "OK!",
                                                                    text: "Erro na DESATIVAÇÃO, verifique!",
                                                                    type: "error",
                                                                    showCancelButton: false,
                                                                    confirmButtonColor: "54DD74",
                                                                    confirmButtonText: "OK!",
                                                                    cancelButtonText: "",
                                                                    closeOnConfirm:false,
                                                                    closeOnCancel: false });
                                                            }
                                                                        },  beforeSend: ()=>{
                                                                                            swal({
                                                                                                title: "Aguarde!",
                                                                                                text: "Gravando dados...",
                                                                                                imageUrl: "assets/img/alertas/loading.gif",
                                                                                                showConfirmButton: false
                                                                                                });
                                                                                            },
                                                                            error: function(data_error){
                                                                                                        sweetAlert("Atenção", "Erro ao gravar os dados!", "error");
                                                                                                        }
                                                        });
                                                }
                                });
}
    



function Verifica(){
                    $.ajax({
                            type: "POST",
                            url: 'usuario/verusu',
                            data: {'usuario':$('#usuario').val()},
                                
                                success: function(data){
                                                        if(data == 1){
                                                                swal({
                                                                        title: "OK",
                                                                        text: "Usuário ja cadastrado na base de dados, verifique!",
                                                                        type: "error",
                                                                        showCancelButton: false,
                                                                        confirmButtonColor: "#54DD74",
                                                                        confirmButtonText: "OK!",
                                                                        closeOnConfirm: true,
                                                                        closeOnCancel: false
                                                                    });
                                                                    $('#btnlimpar').click();
                                                                    $('#usuario'.focus());

                                                        }else{swal.close();}
                                                        },

                                            beforeSend: ()=>{/*LOADING*/
                                                            swal({
                                                                title: "Aguarde!",
                                                                text: "Carregando...",
                                                                imageUrl: "assets/img/gifs/preloader.gif",
                                                                showConfirmButton: false
                                                                });
                                                            },
                                                error: ()=>{ alert('Error'); } //Caso de erro no carregamento
                            });
                    }


//Função para REATIVAR o usuario
function reativa_usuario(usuario){
    swal({
        title:"Atenção",
        type:"Gostaria de REATIVAR esse Usuário?",
        type:"warning",
        showCancelButton:true,
        confirmButtonColor:"#DD6B55",
        confirmButtonText:"Sim",
        cancelButtonText:"Não",
        closeOnConfirm:false,
        closeOnCancel:true
        },function(isConfirm){/* Se clicar com o btn Confirmar*/

                    if(isConfirm){/*Se confirmou */
                                  $.ajax({
                                  url:base_url + "usuario/reativar",
                                  type:"POST",
                                  data:{'usuario':usuario},
                                    
                                                success:function(data){
                                                            if(data == 1){
                                                                swal({
                                                                    title:"OK",
                                                                    text:"Usuário REATIVADO",
                                                                    type:"success",
                                                                    showCancelButton:false,
                                                                    confirmButtonColor:"#54DD74",
                                                                    confirmButtonText:"OK!",
                                                                    cancelButtonText:"",
                                                                    closeOnConfirm:true,
                                                                    closeOnCancel:false
                                                                    },
                                                                        function(isConfirm){
                                                                                    if(isConfirm){
                                                                                            $('#tableusu').bootstrapTable('refresh');
                                                                                                }
                                                                    });
                                                            }else{
                                                                    swal({
                                                                        title:"OK",
                                                                        text:"Erro na REATIVAÇÃO, Verifique!",
                                                                        type:"error",
                                                                        showCancelButton:false,
                                                                        confirmButtonColor:"#54DD74",
                                                                        confirmButtonText:"OK!",
                                                                        cancelButtonText:"",
                                                                        closeOnCancel:false,
                                                                        closeOnCancel:false
                                                                        });
                                                                    }},
                                                        beforeSend: ()=>{/*LOADING...*/
                                                                            swal({  title:"Aguarde!",
                                                                                    text:"Gravando dados...",
                                                                                    imageUrl:"assets/img/alertas/loading.gif",
                                                                                    showConfirmButton:false
                                                                                 });
                                                                        },
                                                        error:function(data_error){/*CASO DE ERROR */
                                                                                    sweetAlert("Atenção", "Erro ao gravar os dados!","error");
                                                                                    }
                                        });
 
                            }
    });
}
</script>
