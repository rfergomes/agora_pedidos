$(function () {
    var data = ["Java", "PHP", "Delphi", "C++", "Phyton", "C#"];
    var text = "";

    $("#produto").on("keyup", function () {
        $("#produto").after('<div class="listaProdutos"></div>');
        var q = $(this).val();
        html = "";
        var i;
        for (i = 0; i < data.length; i++) {
            html += '<div class="si"><a href="javascript:;" onclick="selecionarProduto(this)"'
                    + 'data-id="' + i +
                    '" data-valor="' + data[i] + '">' +
                    i + " - R$ " + data[i] + '</a></div>';

        }
        $(".listaProdutos").html(html);
        $(".listaProdutos").show();
    });
});