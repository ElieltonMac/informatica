function view(){
    $.ajax({
        method:"GET",
        url:"/informatica/view/" + tela + ".php"
    })
    .done(function(resposta){
        $("#content").html(resposta);
    })

    if(tela == "cadastro-os"){
        
    }
}

var searchOs = document.getElementById("input-search-os");

function pesquisaOrdem(){
    $.ajax({
        method: "POST",
        url: "/informatica/view/pesquisa-ordem.php",
        data: {searchOs: searchOs.value}
    })
    .done(function(msg){
        $("#list-orders").html(msg);
    });
}


var idos = document.getElementById("id-os");
function excluirOrdem(){
    $.ajax({
        method: "POST",
        url: "/informatica/painel.php",
        data: {ordem: idos.value}
    })
    .done(function(){
        alert("Excluido com sucesso");
        location.href="/informatica/painel.php?pagina=lista-ordens";
    })
}


var idCliente = document.getElementById("id-cliente");
function excluirCliente(){
    $.ajax({
        method: "POST",
        url: "/informatica/painel.php",
        data: {idcliente: idCliente.value}
    })
    .done(function(){
        alert("Cliente excluido com sucesso");
        location.href="/informatica/painel.php?pagina=lista-clientes";
    })
}
