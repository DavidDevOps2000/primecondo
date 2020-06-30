function authAcess(seuCaminho){
    var vlrApelido = document.getElementById('vlrApelido').innerText; //Para verificar se o usuario está logado ou não
    
    $.ajax({
            type:"POST",
            url:'home/authAcessoPage',
            dataType:'json',
            data:{'nomeApelido':vlrApelido},
                                    success:(data)=>{
                                            
                                        if(data[0].nome_pessoa != null){
                                                            window.location.href= seuCaminho;
                                        }else{
                                            swal({
                                                title: "Error",
                                                text: "Faça o login, ou reative seu cadastro na portaria",
                                                type: "error",
                                                showCancelButton: false,
                                                confirmButtonColor: "#54DD74",
                                                confirmButtonText: "OK!",
                                                closeOnConfirm: false,
                                                closeOnCancel: false
                                                });
                                            }
                                        },
                                beforeSend:()=>{ swal({title: "Só um momento...",text: "Loading...", imageUrl: "assets/img/gifs/loading.gif",showConfirmButton:false });},
                                
                                error:()=>{ swal({
                                                title: "OK",
                                                text: "Error no Banco de dados, Por Favor entre mais tarde",
                                                type: "error",
                                                showCancelButton: false,
                                                confirmButtonColor: "#54DD74",
                                                confirmButtonText: "OK!",
                                                closeOnConfirm: false,
                                                closeOnCancel: false
                                                });
                                    }
                });
    }




function prestador(){ 
    //authAcess("prestador_serv");
    window.location.href="prestador_serv";
}


function visitantes(){
    //authAcess("visitantes");
    window.location.href="visitantes";
}

function home(){ 
    window.location.href="home";
}



function multa(){ 
                    swal({ //Caso retorne algo exibe uma mensagem ao usuario
                    title: "Atenção!",
                    text:"Esse módulo não foi construido",
                    type:"error",
                    });     
    }


function reclamacao(){ 
                        swal({ //Caso retorne algo exibe uma mensagem ao usuario
                        title: "Atenção!",
                        text:"Esse módulo não foi construido",
                        type:"error",
                        });   
}

function regras(){ window.location.href="regras";}


function contatos(){ 
    window.location.href="contatos";
}


function aviso(){ window.location.href="avisos";}



