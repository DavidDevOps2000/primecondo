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
    },(isConfirm)=>{
            if(isConfirm){ 
                    $.ajax({
                            type: "POST",
                            url: "visitantes/cadastrarVisitantes",  //Cadastrar Visitantes
                            data: $("#formCadasVisi").serialize(),
                                            success:(data)=>{
                                                    if($.trim(data) == 1){
                                                            $("#formCadasVisi").trigger("reset");

                                                            swal({ title: "OK!", text: "Visitante Salvo com Sucesso", confirmButtonText: "Ok", type: "success"}
                                                                            ,(isConfirm)=>{
                                                                                        if(isConfirm){
                                                                                                document.location.reload(true);//Atualizar documento caso pressionem Ok
                                                                                                    }
                                                                            });        
                                                    }else if($.trim(data) == 2){ /*var msg = data;  alert(msg);*/
                                                                                                        
                                                            swal({title: "Visitante já existe", text: "Por Favor... Digite outro nome", type: "error"});
                        
                                                    }else{
                                                            swal({title: "ATENÇÃO!", text: "Erro ao inserir visitante, verifique!", type: "error"});
                                                            }

                                                    },beforeSend: ()=>{
                        swal({title: "Só um momento...",text: "Loading...", imageUrl: "assets/img/gifs/loading.gif",showConfirmButton:false });
                    },
                    error:()=>{ alert('Erro Desconhecido'); }//Só dá erro aqui, quando há um problema no banco de dados ou no model
                    
                });
                return false;//Esse Returna deve ficar após os swal, pois senão, vao carregar ETERNAMENTE SEM DAR OS RESULTADOS
        }
    });

    return false;
});
})




function btnEditOpcoes(nomeVisiConsultar){
    var opcoesEdit="<input class='btn btn-sm btn-info' type='button' data-toggle='modal' onClick='consulAlterVisi("+'"'+ nomeVisiConsultar +'"'+");' data-target='#ModalEditar' value='Editar Visitante'>";
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



var nomeSeu;

function consulAlterVisi(nomeVisiConsultar){

$.ajax({
        type:"POST",
        url:'visitantes/consultVisiToModel',
        dataType:'json',
        data:{'nomeVisitante':nomeVisiConsultar},
            success:(data)=>{
                            nomeSeu = data[0].nome_visi;//Salvando nome antigo aqui, para ser usado no insert na conficional Where

                            $('#vlrNomeVisi').val(data[0].nome_visi);//Insertando os valores do JSN result da controller 

                            document.getElementById("vlrAutoriza").innerHTML = data[0].status_visi;

                            ano = data[0].diaFim[0] + '' + data[0].diaFim[1];//Convertendo DATA para o Front
                            mes = data[0].diaFim[5] + '' + data[0].diaFim[6];
                            dia = data[0].diaFim[8] + '' + data[0].diaFim[9];
                            diaConvert = dia +'/'+ mes +'/'+ ano;

                            document.getElementById("vlrDiaFim").innerHTML = diaConvert;//Jogando data convertida na tela

                             //$('#vlrAutoriza').val(data[0].status_visi);//Nas inputs
                             //$('#vlrDiaFim').val(data[0].diaFim);// do formulário, ALIAS isso só funcionará se tiver o data[0].NomeCampoDB
            swal.close();;//Esse close,é para evitar que carregue, pois senão, vao carregar ETERNAMENTE SEM DAR OS RESULTADOS
            },
            beforeSend:()=>{
                swal({title: "Só um momento...",text: "Loading...", imageUrl: "assets/img/gifs/loading.gif",showConfirmButton:false });
            },
            error:()=>{
                alert('Unexpected error.');
                swal.close();
            }
    });
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
                        (isConfirm)=>{
                            if(isConfirm){
                                $.ajax({
                                        url: "visitantes/desativarVisi",
                                        type: "POST",
                                        data: {'nomeVisitante':nomeVisiDesativar}
                                            ,success: (data)=>{
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
                                                            (isConfirm)=>{
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
                            },beforeSend:()=>{
                                swal({
                                    title: "Aguarde!",
                                    text: "Gravando dados...",
                                    imageUrl: "assets/img/gifs/loading.gif",
                                    showConfirmButton: false });
                            },
                            error: (data_error)=>{
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
        (isConfirm)=>{
            if(isConfirm){
                $.ajax({
                        url: "visitantes/ativarVisi",
                        type: "POST",
                        data: {'nomeVisitante':nomeVisiAtivar}
                            ,success:(data)=>{
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
                                        (isConfirm)=>{
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
            },beforeSend:()=>{
                swal({
                    title: "Aguarde!",
                    text: "Gravando dados...",
                    imageUrl: "assets/img/gifs/loading.gif",
                    showConfirmButton: false });
            },
            error:(data_error)=>{
                sweetAlert("Atenção", "Erro ao gravar os dados!", "error");
            }
        });
    }
});
}

var mostrarData;
function diasRestantes(numeroDia, row){//Esse Row é uma propriedadade da table onde vc pega o valor da linha e a utiliza

    ano = row.diaFim[0]+ '' + row.diaFim[1];//Peguei os 2 primeiros digitos do Ano dentro da linha do campo 'diaFim'
    mes = row.diaFim[5]+ '' + row.diaFim[6];//Peguei os 2 primeiros digitos do Mes dentro da linha do campo 'diaFim'
    dia = row.diaFim[8]+ '' + row.diaFim[9];//Peguei os 2 primeiros digitos do Ano dentro da linha do campo 'diaFim'
    diaConvert = dia +'/'+ mes +'/'+ ano;

    mostrarData = diaConvert;
   return diaConvert;
  
}

function alterVisi(){

    $.ajax({
                type: "POST",
                url: 'visitantes/alterVisi',////////////////////Trabalhe aqui hoje
                data:{
                    'nomeVisi':nomeSeu,
                    'nomeNovoVisi':$('#vlrNomeVisi').val(),
                    'maisDias':$('#vlrMaisDias').val(),
                    'novoStatus':$('#vlrAutoriza').val(),
                            },success:(data)=>{
                                        if(data == 1){
                                                swal({  title: "OK", 
                                                        text: "Dados alterados",
                                                        type: "success", 
                                                        showCancelButton: false, 
                                                        confirmButtonColor: "#54DD74",
                                                        confirmButtonText: "OK!",
                                                        closeOnConfirm: true,
                                                        closeOnCancel: false
                                                        }
                                                        ,(isConfirm)=>{
                                                                 if(isConfirm){ document.location.reload(true); /*Atualizar documento caso pressionem Ok*/   }
                                                            }
                                                    );
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
                                }, beforeSend:()=>{ swal({ title: "Aguarde!", text: "Carregando...", imageUrl: "assets/img/gifs/loading.gif", showConfirmButton: false});
                                        
                                }, error: ()=>{  alert('Unexpected error.'); }
                    });
    }