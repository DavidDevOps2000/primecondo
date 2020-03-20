$(document).ready(function(){$('#formPrincipal').submit(function(event){
    //Evento do formulario, ao pressionar o botao submit
    // vai ativar o ajax e json.
   
$.ajax({
        type:"POST",
        url: 'Login/Logar_ajax',//Controller login no metodo logar_ajax
        data: $('#formPrincipal').serialize(),//Os IDs dos Form vão para a validação na controller
        
        success:function(data){//Caso toda a controller funcione corretamente

            if ($.trim(data) == '1') { //Valido o retorno da controller
         
                        window.location.href = "home";

            }else{
                    swal({ //Caso retorne algo exibe uma mensagem ao usuario
                         title: "Atenção!",
                         text:"Acesso negado, Usuário ou senha inválido!",
                         type:"error",
                        });
                           // $("#formPrincipal").trigger('reset');//Limpa os objetos de tela
                }

        },beforeSend: function(){ //Tela de carregamento

            swal({
                title:"Aguarde!",
                text:"Carregando...",
                imageUrl: "assets/img/gifs/preloader.gif",
                showConfirmButton: false
                });
        },
            
        error:function(){ //Caso aconteça algum erro inesperado no Ajax
        alert('Deu Erro.');
        }

        });
        return false;//Aqui vai desativar a função após execução
      });
    });