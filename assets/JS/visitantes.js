$(document).ready(function(){$("#formCadasVisi").submit(function(event){
alert("Funcionou");
});
});     




    
    function busca_usuario(usuario){
        $('#alteracao').modal('show');
        $.ajax({
            type: "POST",
            url: 'usuario/consalterar',
            dataType: 'json',
            data: {'usuario': usuario},
            success: function (data){
                $('#musuario').val(data[0].usuario);
                $('#msenha').val(data[0].senha);
                swal.close();
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
                alert('Unexpected error.');
                swal.close();
            }
        });
    }


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





function desativa_usuario(nomeVisitante){
                swal({//Primeiro a pergunta
                    title:"Atenção",
                    type: "Gostaria de DESATIVAR esse Visitante?",
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
                                                    url: base_url + "cadastro/desativar",//indo 
                                                    type: "POST",
                                                    data: {'nome_visi':nomeVisitante},

                                                    success: function(data){
                                                                    
                                                        if(data == 1){
                                                    
                                                                swal({
                                                                     title: "OK",
                                                                     text: "Visitante DESATIVADO!",
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
                                                                                
                                                                                $('#listaVisi').bootstrapTable('refresh');
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
                                                                                                imageUrl: "assets/img/loading.gif",
                                                                                                showConfirmButton: false
                                                                                                });
                                                                                            },
                                                                            error: function(data_error){
                                                                                                        sweetAlert("Atenção", "Erro em fazer a ação", "error");
                                                                                                        }
                                                        });
                                                }
                                });
}
    



function Verifica(){// Verificar mais tarde essa funcionaliade para não deixar escrever o mesmo usuario
                    $.ajax({
                            type: "POST",
                            url: 'cadastro/verusu',
                            data: {'nome_visi':$('#usuario').val()},
                                
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
function reativa_usuario(nomeVisitante){
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
        },
        function(isConfirm){/* Se clicar com o btn Confirmar*/

                    if(isConfirm){/*Se confirmou */
                                  $.ajax({
                                  url:base_url + "cadastro/reativar",
                                  type:"POST",
                                  data:{'nome_visi':nomeVisitante},
                                    
                                                success:function(data){

                                                            if(data == 1){

                                                                swal({
                                                                    title:"OK",
                                                                    text:"Visitante REATIVADO",
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
                                                                                            $('#listaVisi').bootstrapTable('refresh');
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
                                                                                    imageUrl:"assets/img/loading.gif",
                                                                                    showConfirmButton:false
                                                                                 });
                                                                        },
                                                        error:function(data_error){/*CASO DE ERROR */
                                                                                    sweetAlert("Atenção", "Erro ao Salva sua ação","error");
                                                                                    }
                                        });
 
                            }
    });
}