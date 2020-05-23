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