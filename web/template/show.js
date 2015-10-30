/**
 * Created by cesar on 30/10/15.
 */

function mostrarAlerta(e){

    swal({
            title: "Tem Certaza que quer ativar o Item?",
            text: "Voce esta prestes a ativar o item!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sim, Ativar Item!",
            closeOnConfirm: false
        },
        function(){

            swal("Ativado!", "Este Item esta ativado.", "success");

        });

}

$(document).ready(function(){
    $('#alerta').click(mostrarAlerta)
});