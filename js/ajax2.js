function view(tela){
    $.ajax({
        method:"GET",
        url: "/Dashboard/View/" + tela + ".php"
    })
    .done(function(resposta){
        $("#content").html(resposta);
    })
}