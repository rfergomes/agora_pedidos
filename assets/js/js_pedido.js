$(function () {
    $("#btInserir").on("click", function () {
        var id_produto = $("#id_produto").val();
        var valor = $("#valor").val();
        var qtde = $("#qtde").val();
        $.ajax({
            url: base_url + "item/salvar",
            type: "POST",
            dataType: "json",
            data: {
                id_produto: id_produto,
                id_pedido: id_pedido,
                valor: valor,
                qtde: qtde
            },
            success: function (data) {
                if(data.erro > 0){
                    alert(data.msg[0]);
                }
                lista_itens(data.lista);
                $("#produto").val("");
                $("#id_produto").val("");
                $("#valor").val("");
                $("#qtde").val("");
            }
        });
    });

    $("#produto").on("keyup", function () {
        var q = $(this).val();
        $.ajax({
            url: base_url + "produto/buscar/" + q,
            type: "POST",
            dataType: "json",
            data: {},
            success: function (data) {
                $("#produto").after('<div class="listaProdutos"></div>');
                html = "";
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<div class="si"><a href="javascript:;" onclick="selecionarProduto(this)"'
                            + 'data-id="' + data[i].id_produto +
                            '" data-nome="' + data[i].produto +
                            '" data-valor="' + data[i].preco + '">' +
                            data[i].produto + " - R$ " + data[i].preco + '</a></div>';

                }
                $(".listaProdutos").html(html);
                $(".listaProdutos").show();
                
            }
        });
    });
});

function lista_itens(data) {
    html = "<tr>";
    var total_pedido = 0.00;
    for (var i in data) {
        total_pedido += parseFloat(data[i].valor);
        var j = parseInt(i) + 1;
        html += '<td align="center">' + data[i].id_item + '</td>' +
                '<td align="left">' + data[i].produto + '</td>' +
                '<td align="center">' + data[i].valor + '</td>' +
                '<td align="center">' + data[i].qtde + '</td>' +
                '<td align="center">' + data[i].subtotal + '</td>' +
                '<td align="center"><a href="javascript:;" onclick="return excluir_item(this)" data-entidade="item" data-id="' + data[i].id_item + '" class="btn btn-outline-vermelho">Excluir</a></td></tr>';
    }

    html += '<tr><td align="right" colspan="6" ><b>Total:</b> R$ ' + total_pedido + '</span></td> </tr>';
    $("#total_pedido").html(total_pedido);
    $("#lista_itens").html(html);

}

function selecionarProduto(obj) {
    var id = $(obj).attr("data-id");
    var nome = $(obj).attr("data-nome");
    var valor = $(obj).attr("data-valor");

    $(".listaProdutos").hide();
    $("#produto").val(nome);
    $("#id_produto").val(id);
    $("#valor").val(valor);
    $("#qtde").val(1);
    $("#qtde").focus();
}

function excluir_item(obj) {
    var entidade = $(obj).attr('data-entidade');
    var id = $(obj).attr('data-id');
    if (confirm('Deseja realmente excluir?')) {
        $.ajax({
            url: base_url + entidade + "/excluir/" + id + "/" + id_pedido,
            type: "POST",
            dataType: "json",
            data: {},
            success: function (data) {
                lista_itens(data);
            }
        });
    }
}

