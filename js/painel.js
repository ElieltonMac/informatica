var telefone = document.getElementById("telefone-view");
var whatsapp = document.getElementById("whatsapp-view");
var equipamento = document.getElementById("equipamento-view");
var marca = document.getElementById("marca-view");
var modelo = document.getElementById("modelo-view");
var prob_informado = document.getElementById("problema-informado-view");;
var observacoes  = document.getElementById("observacoes-view");

function liberaAlteracaoOs(){
    telefone.removeAttribute("readonly");
    whatsapp.removeAttribute("readonly");
    equipamento.removeAttribute("readonly");
    marca.removeAttribute("readonly");
    modelo.removeAttribute("readonly");
    prob_informado.removeAttribute("readonly");
    observacoes.removeAttribute("readonly");
}