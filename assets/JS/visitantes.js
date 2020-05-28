$(document).ready(function(){ $("#formCadasVisi").submit(function(event){
swal({
    title:"Atenção",
    text: "Tem certeza que quer cadastrar esse Visitante ?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "DD6B55",
    confirmButtonText: "Sim",
    cancelButtonText: "Não",
    closeOnConfirm: false,
    closeOnCancel: true
    },function(isConfirm){
            if(isConfirm){ 
                    $.ajax({
                            type: "POST",
                            url: "visitantes/cadastrarVisitantes",  //Cadastrar Visitantes
                            data: $("#formCadasVisi").serialize(),
                                            success: function(data){
                                                    if($.trim(data) == 1){
                                                            $("#formCadasVisi").trigger("reset");

                                                            swal({ title: "OK!", text: "Visitante Salvo com Sucesso", confirmButtonText: "Ok", type: "success"}
                                                                            ,function(isConfirm){
                                                                                                if(isConfirm){
                                                                                                    document.location.reload(true);//Atualizar documento caso pressionem Ok
                                                                                                            }
                                                                            });        
                                                    }else if($.trim(data) == 2){ /*var msg = data;  alert(msg);*/
                                                                                                        
                                                            swal({title: "Visitante já existe", text: "Por Favor... Digite outro nome", type: "error"});
                        
                                                    }else{
                                                            swal({title: "ATENÇÃO!", text: "Erro ao inserir visitante, verifique!", type: "error"});
                                                            }

                                                    },beforeSend: function(){
                        swal({title: "Só um momento...",text: "Loading...", imageUrl: "assets/img/gifs/loading.gif",showConfirmButton:false });
                    },
                    error: function(){ alert('Erro Desconhecido'); }
                    
                });
                return false;
        }
    });

    return false;
});
})




function btnEditOpcoes(nomeVisitante){
    var opcoesEdit="<input class='btn btn-xs col-md-6 btn-info' type='button' data-toggle='modal' data-target='#ModalEditar' value='Editar Visitante'>";
    return opcoesEdit;
}



function opcoes(nomeVisitante, row){ 
    if(row.status_visi == 'NÃO')
    {
    var opcoes= "<button class='btn btn-xs btn-success' type='button' onClick='ativarVisi("+'"'+ nomeVisitante +'"'+");'><span class='glyphicon glyphicon-ok-sign' style='width:58px'>Ativar</span></button>";
        return opcoes;
    }else{
    var opcoes= "<button class='btn btn-xs btn-warning' type='button' onClick='desativarVisi("+'"'+ nomeVisitante +'"'+");'><span class='glyphicon glyphicon-remove-sign'>Desativar</span></button>";
        return opcoes;
        }
}



    //Função para REATIVAR o $nomeVisitante
function desativarVisi(nomeVisiDesativar){ 
                    swal({
                        title:"Atenção",
                        text: "Desativar a entrada desse visitante ?",
                        type: "info",
                        cancelButtonColor: '#d33',
                        showCancelButton: true,
                        confirmButtonColor: "info",
                        confirmButtonText: "Sim",
                        cancelButtonText: "Não",
                        closeOnConfirm: false,
                        closeOnCancel: true
                      },    
                        function(isConfirm){
                            if(isConfirm){
                                $.ajax({
                                        url: "visitantes/desativarVisi",
                                        type: "POST",
                                        data: {'nomeVisitante':nomeVisiDesativar}
                                            ,success: function(data){
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
                                                                if(isConfirm){ document.location.reload(true);}//Atualizar documento caso pressionem Ok
                                                                }
                                                            );
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
                            },beforeSend: function(){
                                swal({
                                    title: "Aguarde!",
                                    text: "Gravando dados...",
                                    imageUrl: "assets/img/gifs/loading.gif",
                                    showConfirmButton: false });
                            },
                            error: function(data_error){
                                sweetAlert("Atenção", "Erro ao gravar os dados!", "error");
                            }
                        });
                    }
    });
}


function ativarVisi(nomeVisiAtivar){ 
    swal({
        title:"Atenção",
        text: "Quer Autorizar a entrada desse visitante ?",
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
                        url: "visitantes/ativarVisi",
                        type: "POST",
                        data: {'nomeVisitante':nomeVisiAtivar}
                            ,success: function(data){
                                if(data == 1){
                                    swal({ 
                                        title: "OK",
                                        text: "Visitante ATIVO!",
                                        type: "success",
                                        showCancelButton: false,
                                        confirmButtonColor: "54DD74",
                                        confirmButtonText: "OK!",
                                        cancelButtonText: "",
                                        closeOnConfirm:true,
                                        closeOnCancel: false }
                                        ,
                                        function(isConfirm){
                                            if(isConfirm){ document.location.reload(true);}//Atualizar documento caso pressionem Ok
                                            }
                                        );
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
            },beforeSend: function(){
                swal({
                    title: "Aguarde!",
                    text: "Gravando dados...",
                    imageUrl: "assets/img/gifs/loading.gif",
                    showConfirmButton: false });
            },
            error: function(data_error){
                sweetAlert("Atenção", "Erro ao gravar os dados!", "error");
            }
        });
    }
});
}

function diasRestantes(numeroDia, row){//Esse Row é uma propriedadade da table onde vc pega o valor da linha e a utiliza

    ano = row.diaFim[0]+ '' + row.diaFim[1];//Peguei os 2 primeiros digitos do Ano dentro da linha do campo 'diaFim'
    mes = row.diaFim[5]+ '' + row.diaFim[6];//Peguei os 2 primeiros digitos do Mes dentro da linha do campo 'diaFim'
    dia = row.diaFim[8]+ '' + row.diaFim[9];//Peguei os 2 primeiros digitos do Ano dentro da linha do campo 'diaFim'
    diaConvert = dia +'/'+ mes +'/'+ ano;

   return diaConvert;
}

