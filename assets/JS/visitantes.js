$(document).ready(function(){ $("#formCadasVisi").submit(function(event){
    
$.ajax({
        type: "POST",
        url: "visitantes/cadastrarVisitantes",
        data: $("#formCadasVisi").serialize(),
            success: function(data){

                        if($.trim(data) == 1){

                            $("#formCadasVisi").trigger("reset");

                            swal({title: "OK!", text: "Dados salvos com sucesso.", type: "success"});

                        }else{
                            //var msg = data;
                            //alert(msg);
                            swal({title: "ATENÇÃO!", text: "Erro ao inserir, verifique!", type: "error",});
                        }

                    },
                    beforeSend: function(){
                        swal({
                            title: "AGUARDE!",
                            text: "Loading...", 
                            imageUrl: "assets/img/gifs/loading.gif",
                            showConfirmButton:false
                        });
                    },
                    error: function(){
                       
                
                    }
                });
                return false;
        });
        setInterval(function(){
            var $table = $('#tableusu');
            $table.bootstrapTable('refresh');
        }, 5000);
    });