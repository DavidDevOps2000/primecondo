

<div>
        <form id="formCadasVisi">
            <div class="panel panel-primary">
                    <div class="panel-heading"><h4>Cadastro de Visitantes</h4></div>
                        <div class="panel-body">
                            <div class="form-group col-lg-6">
                                <label for="textNome" class="control-label">Nome Visitante:</label>
                                <input name="valorNomeVisitante" id="valorNomeVisitante" class="form-control" placeholder="Digite seu Nome" type="text" required>
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
                 data-url= 'visitantes/listar'>  
                 <!--Endereço do Controller responsável em buscar os dados da lista -->
                        
                    <thead>
                        <tr>
                            <th data-field='nome_visi' class="col-md-2 text-center text-light bg-primary">Nome</th> 
                                <!--campo usuario no bd -->

                            <th data-field='status_visi' class="col-md-2 text-center text-light bg-primary">Ativo</th> 
                                <!--campo ativo no bd --> <!--//aJUSTAR no banco-->

                            <th data-field='diaFim' class="col-md-2 text-center text-light bg-primary">Valido até</th> 
                                <!--campo ativo no bd --> <!--//aJUSTAR no banco-->

                            <th  class = "col-md-2 text-center text-light bg-primary" data-formatter="opcoes" data-field='nome_visi'
                                >Ativar | Desativar</th>
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
        var opcoes = '<button class="btn btn-xs btn-warning text-center" type="button"  onClick="reativa_usuario('+"'"+ value +"'"+');"><span class="glyphicon glyphicon-open"></span></button>';

        }else{

        var opcoes = '<button class = "btn btn-xs btn-primary text-center" type="button" onclick="listarVisitantes('+ "'" + value + "'" +');"><span class = "glyphicon glyphicon-pencil"></span></button>\n\
        <button class = "btn btn-xs btn-danger text-center" type="button" onclick="desativa_usuario('+ "'" + value + "'" +');"><span class = "glyphicon glyphicon-trash"></span></button>';
        }
        return opcoes;
    }

    //função de busca de usuario que aparece um modal.
    

    //Botão alterar dentro do modal recebe essa função
    function alterar(){
        if($("#msenha").val() != $("#mcsenha").val()){
            swal({
                title: "Atenção!",
                text: "senhas incompatíveis, verifique!",
                type: "error"
            });
            return false;
        }else{     
            $.ajax({
                type: "POST",
                url: 'usuario/alterar',
                data: {'senha':$('#msenha').val(),
                        'usuario':$('#musuario').val(),
                        'tipo':$('#mcmb-tipo').val()},
                success: function(data){
                    if(data == 1){
                        swal({
                            title: "OK",
                            text: "Senha ALTERADA!",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#54DD74",
                            confirmButtonText: "OK!",
                            closeOnConfirm: true,
                            closeOnCancel: false
                        },
                        function(isConfirm){
                            if(isConfirm){
                                $('#tableusu').bootstrapTable('refresh');
                                
                            }
                        });
                        $('#alteracao').modal('hide');
                        
                        
                    }else{
                        swal({
                            title: "OK",
                            text: "Erro na ALTERAÇÃO, verifique!",
                            type: "error",
                            showCancelButton: false,
                            confirmButtonColor: "#54DD74",
                            confirmButtonText: "OK!",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        });
                    }
                },
                beforeSend: function(){
                    swal({
                        title: "Aguarde!",
                        text: "Carregando...",
                        imageUrl: "assets/img/gifs/preloader.gif",
                        showConfirmButton: false
                    });
                },
                error: function(){
                    alert('Unexpected error.')
                }
            });
        }
    }


    // tipo = document.getElementById('tipoCampo').text;
    // alert(tipo);

    //Desativar o usuario!
function desativa_usuario(usuario){

            swal({
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
                  function(isConfirm){
                  if(isConfirm){
                     $.ajax({
                        url: base_url + "usuario/desativar",
                        type: "POST",
                        data: {'usuario':usuario},
                        success: function(data){
                            // nome = data[0].usuario;
                            // alert(nome);
                            
                            if(data == 2){
                                swal({
                                    title: "Atenção",
                                    text: "Vc não pode desativar a si mesmo",
                                    type: "error",
                                    showCancelButton: false,
                                    confirmButtonColor: "54DD74",
                                    confirmButtonText: "OK!",
                                    cacelButtonText: "",
                                    closeOnConfirm:true,
                                    closeOnCancel: false
                                });
                            }else if(data == 1){
                                swal({
                                    title: "OK",
                                    text: "Usuário DESATIVADO!",
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "54DD74",
                                    confirmButtonText: "OK!",
                                    cacelButtonText: "",
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
                                    cacelButtonText: "",
                                    closeOnConfirm:false,
                                    closeOnCancel: false
                                });
                            }
                        },
                        beforeSend: function(){
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
                    if (data == 1){
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
                    }else{
                        swal.close();
                    }
                },
                beforeSend: function(){
                    swal({
                        title: "Aguarde!",
                        text: "Carregando...",
                        imageUrl: "assets/img/gifs/preloader.gif",
                        showConfirmButton: false
                    });
                },
                error: function() {
                    alert('Error');
                }
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
        closeOnCancel:true},

        function(isConfirm){
            if(isConfirm){
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
                        }
                    },
                    beforeSend: function(){
                        swal({
                            title:"Aguarde!",
                            text:"Gravando dados...",
                            imageUrl:"assets/img/alertas/loading.gif",
                            showConfirmButton:false
                        });
                    },
                    error:function(data_error){
                        sweetAlert("Atenção", "Erro ao gravar os dados!","error");
                    }
                });
            
        }
    });
}
</script>