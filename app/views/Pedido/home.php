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
        <form action="<?= URL_BASE ?>pedido/filtro" method="POST">
            <div class="rows">
                <div class="col-6">
                    <span class="text-label">Pedido</span>
                    <input type="text" name="" placeholder="Valor da pesquisar..." class="form-campo">
                </div>
                <div class="col-3">
                    <span class="text-label">Data</span>
                    <input type="date" name="" placeholder="Valor da pesquisar..." class="form-campo">
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
                    <?php foreach ($lista as $pedido) { ?>
                        <tr>
                            <td align="center"><?= $pedido->id_pedido ?></td>
                            <td align="center"><?= $pedido->data ?></td>
                            <td align="center"><?= $pedido->hora ?></td>
                            <td align="center">R$ <?= $pedido->total_pedido ?></td>
                            <td align="center"><i class="fas fa-window-close text-vermelho"></i> <?= $pedido->liberado ?></td>
                            <td align="center"><i class="fas fa-window-close text-vermelho"></i> <?= $pedido->finalizado ?></td>
                            <td align="center"><a href="#" class="btn btn-outline-vermelho d-inline-block"><i class="fas fa-trash-alt"></i> Excluir</a></td>
                        </tr>
                    <?php } ?>                   
                </tbody>
            </table>
        </div>
    </div>
</div>