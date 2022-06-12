
var controleCampo = 1;
function adicionarCampo() {
    controleCampo++;
    //console.log(controleCampo);

    document.getElementById('formulario').insertAdjacentHTML('beforeend', '<div class="form-group" id="campo' + controleCampo + '"><label>Data: <input type="text" size="15" name="data[]"  class="form-control" id="data" placeholder="--/--/----"/> Resultado: <input type="text" size="15"   name="resultado[]" class="form-control" id="resultado" /></label> <button type="button" class="btn btn-danger success-icon-notika btn-reco-mg btn-button-mg" id="' + controleCampo + '" onclick="removerCampo(' + controleCampo + ')"> - </button></div>');
}

function removerCampo(idCampo){
    //console.log("Campo remover: " + idCampo);
    document.getElementById('campo' + idCampo).remove();
}


