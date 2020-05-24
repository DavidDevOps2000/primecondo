$(document).ready(function(){ $("#formCadasVisi").submit(function(event){
$.ajax({
        type: "POST",
        url: "visitantes/cadastrarVisitantes",
        data: $("#formCadasVisi").serialize(),
            success: function(data){

                        if($.trim(data) == 1){

                            $("#formCadasVisi").trigger("reset");

                            swal({title: "OK!", text: "Visitante Salvo com Sucesso", type: "success"});         //Cadastrar Visitante

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
                       
                
                    }
                });
                return false;
        });
        setInterval(function(){
            var $table = $('#tableusu');
            $table.bootstrapTable('refresh');
        }, 5000);
    });





    function listarVisitantes(usuario){
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