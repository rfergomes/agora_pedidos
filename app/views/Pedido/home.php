<div class="border-bottom p-4 mt-5 d-block">
    <span class="titulo"><i class="far fa-list-alt"></i> MEUS PEDIDOS</span>
    <small class="px-2 d-block">CONFIRA ABAIXO EM DETALHES TODOS OS SEUS PEDIDOS REALIZADOS ATUALMENTE.</small>
</div>	
<div class="base-home">
    <div class="pb-3 text-right">
        <a href="<?= URL_BASE ?>pedido/novo" class="btn btn-azul d-inline-block"><i class="fas fa fa-plus-circle"></i> Novo pedido</a>
        <a href="" class="btn btn-roxo d-inline-block filtro"><i class="fas fa-filter"></i> Filtrar</a>
    </div>
    <div class="mostraFiltro">
        <form action="<?= URL_BASE ?>pedido/filtro" method="GET">
            <div class="rows">
                <div class="col-3">
                    <span class="text-label">Data Inicial</span>
                    <input type="date" name="data1" class="form-campo">
                </div>
                <div class="col-3">
                    <span class="text-label">Data Final</span>
                    <input type="date" name="data2" class="form-campo">
                </div>
                <div class="col-2 mt-4 pt-1">
                    <input type="submit" class="btn" value="pesquisar">
                </div>
            </div>
        </form>
    </div>
    <div class="tabela-responsiva mt-3">
        <div class="">
            <table cellpadding="0" cellspacing="0" id="dataTable">
                <thead>
                    <tr>
                        <th width="2%" align="center">ID</th>
                        <th align="center">Data</th>
                        <th align="center">Hora</th>
                        <th align="center">Total</th>
                        <th align="center">Baixado</th>							
                        <th align="center">Finalizado</th>
                        <th align="center">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($lista as $pedido) {
                        $bIco = "fas fa-window-close text-vermelho";
                        $bTexto = "Não";
                        $fIco = "fas fa-window-close text-vermelho";
                        $fTexto = "Não";
                        if ($pedido->liberado == "S") {
                            $bIco = "fas fa-check text-verde";
                            $bTexto = "Sim";
                        }
                        if ($pedido->finalizado == "S") {
                            $fIco = "fas fa-check text-verde";
                            $fTexto = "Sim";
                        }
                        ?>
                        <tr>
                            <td align="center"><?= $pedido->id_pedido ?></td>
                            <td align="center"><?= $pedido->data ?></td>
                            <td align="center"><?= $pedido->hora ?></td>
                            <td align="center">R$ <?= $pedido->total_pedido ?></td>
                            <td align="center"><i class="<?= $bIco ?>"></i> <?= $bTexto ?></td>
                            <td align="center"><i class="<?= $fIco ?>"></i> <?= $fTexto ?></td>
                            <td align="center"><a href="<?= URL_BASE . "pedido/detalhe/" . $pedido->id_pedido ?>" class="btn btn-outline-azul d-inline-block"><i class="fas fa-info-circle"></i> Detalhe</a></td>
                        </tr>
                    <?php } ?>                   
                </tbody>
            </table>
        </div>
    </div>
</div>