$(document).ready(function(){ $("#formCadasVisi").submit(function(event){
$.ajax({
        type: "POST",
        url: "visitantes/cadastrarVisitantes",
        data: $("#formCadasVisi").serialize(),
            success: function(data){

                        if($.trim(data) == 1){

                            $("#formCadasVisi").trigger("reset");

                            swal({title: "OK!", text: "Visitante Salvo com Sucesso", type: "success"});         //Cadastrar Visitantes

                        }else if($.trim(data) == 2){
                            /*var msg = data;
                            alert(msg);*/

                            swal({title: "Visitante já existe", text: "Por Favor... Digite outro nome", type: "error",});
                        
                        }else{
                            swal({title: "ATENÇÃO!", text: "Erro ao inserir visitante, verifique!", type: "error",});

                        }

                    },
                    beforeSend: function(){
                        swal({
                            title: "Só um momento...",
                            text: "Loading...", 
                            imageUrl: "assets/img/gifs/loading.gif",
                            showConfirmButton:false
                        });
                    },
                    error: function(){
                       alert('Erro Desconhecido');
                
                    }
                });
                return false;
        });
        setInterval(function(){
            var $table = $('#tableusu');
            $table.bootstrapTable('refresh');
        }, 5000);
    });



    


        //função que faz aparereces 2 botoes o de busca e o de desativa
function opcoes(nomeVisitante){
var opcoes=
        "<button class='btn btn-xs btn-success' type='button' onClick='ativarVisi("+'"'+ nomeVisitante +'"'+");'><span class='glyphicon glyphicon-ok-sign' style='width:58px'>Ativar</span></button>\
        <button class='btn btn-xs btn-warning' type='button' onClick='desativarVisi("+'"'+ nomeVisitante +'"'+");'><span class='glyphicon glyphicon-remove-sign'>Desativar</span></button>"   
            return opcoes;
        }


    //Função para REATIVAR o $nomeVisitante
function desativarVisi(nomeVisiDesativar){ 
                    swal({
                        title:"Atenção",
                        text: "Quer Desativar a entrada desse visitante ?",
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
                                                        closeOnCancel: false });
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
                                        closeOnCancel: false });
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
