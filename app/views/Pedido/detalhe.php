<script src="<?= URL_BASE ?>assets/js/js_pedido.js" type="text/javascript"></script>
<div class="">
    <div class="width-100 d-flex">
        <div class="divisor border-bottom">
            <span class="titulo px-0"><i class="fab fa-wpforms"></i> dados do pedido</span>
            <form accept-charset="<?= URL_BASE ?>pedido/cadastrar" method="POST">
                <div class="rows mt-3">
                    <div class="col-4 d-flex">
                        <div class="cx">	
                            <label class="text-label"><i class="fas fa-user"></i> Nome do cliente</label>
                            <span class="h6 mb-0"><?= $pedido->cliente ?></span>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="cx">	
                            <label class="text-label"><i class="fas fa-calendar"></i> Data</label>
                            <span class="h6 mb-0"><?= databr($pedido->data) ?></span>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="cx">	
                            <label class="text-label"><i class="far fa-clock"></i> Hora</label>
                            <span class="h6 mb-0"><?= $pedido->hora ?></span>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="cx">	
                            <label class="text-label"><i class="fas fa-dollar-sign"></i> Valor</label>
                            <span class="h6 mb-0" id="total_pedido"><?= moedaBr($pedido->total_pedido) ?></span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="d-flex">
        <div class="base-home pt-3">
            <span class="titulo pb-3 pt-3"><i class="far fa-list-alt"></i> Detalhes do pedido</span>
           
            <div class="tabela-responsiva">
                <div class="border-bottom-0">
                    <table cellpadding="0" cellspacing="0" id="dataTable">
                        <thead>
                            <tr>
                                <th width="2%" align="left">Item</th>
                                <th width="48%" align="left">Produto</th>
                                <th width="16%" align="center">Preço</th>
                                <th width="8%" align="center">Quantidade</th>							
                                <th width="15%" align="center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody id="lista_itens">
                            <?php
                            $total_pedido = 0;
                            foreach ($itens as $item) {
                                $total_pedido += $item->subtotal;
                                ?>
                                <tr class="ativo">
                                    <td><?= $item->id_item ?></td>
                                    <td><?= $item->produto ?></td>
                                    <td align="center"><?= moedaBr($item->valor) ?></td>
                                    <td align="center"><?= $item->qtde ?></td>
                                    <td align="center"><?= moedaBr($item->subtotal) ?></td>
                                </tr>
                            <?php } ?>
                            <tr><td align="right" colspan="5" ><b>Total:</b> R$ <?= moedaBr($total_pedido) ?></span></td> </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>