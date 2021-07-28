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
            <span class="titulo pb-3 pt-3"><i class="far fa-list-alt"></i> Itens do pedido</span>
            <?=
            $this->verMsg();
            $this->verErro();
            ?>
            <div class="formulario">
                <form action="">
                    <div class="rows p-3">
                        <div class="col-6 position-relative">
                            <div class="d-flex  text-justify-between items-center">
                                <span class="text-label"> Produto</span>
                            </div>
                            <input type="text" id="produto" data-type="localizar_produto" class="form-campo" />

                        </div>
                        <div class="col-2">
                            <span class="text-label">Quantidade</span>
                            <input type="number" id="qtde" value="" class="form-campo">
                        </div>
                        <div class="col-2">
                            <span class="text-label">Valor</span>
                            <input type="text" id="valor" value="" class="form-campo">
                        </div>
                        <div class="col-2 mt-3 pt-2">
                            <input type="hidden" id="id_produto">
                            <input type="button" id="btInserir" value="Inserir" class="btn btn-azul width-100">
                        </div>
                    </div>
                </form>
            </div>
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
                                <th width="15%" align="center">Excluir</th>
                            </tr>
                        </thead>
                        <tbody id="lista_itens">
                            <?php
                            foreach ($itens as $item) {
                                $total_entrada += $item->subtotal;
                                ?>
                                <tr class="ativo">
                                    <td><?= $item->id_item ?></td>
                                    <td><?= $item->produto ?></td>
                                    <td align="center"><?= moedaBr($item->valor) ?></td>
                                    <td align="center"><?= $item->qtde ?></td>
                                    <td align="center"><?= moedaBr($item->subtotal) ?></td>
                                    <td align="center"><a href="javascript:;" onclick="return excluir_item(this)" data-entidade="item" data-id="<?= $item->id_item ?>" class="btn btn-outline-vermelho">Excluir</a></td>
                                </tr>
                            <?php } ?>
                            <tr><td align="right" colspan="6" ><b>Total:</b> R$ <?= $total_entrada ?></span></td> </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-right pt-3 base-botoes">
                <a href="" class="btn btn-vermelho d-inline-block"><i class="fas fa-times"></i> Cancelar</a>
                <a href="" class="btn d-inline-block"><i class="fas fa-check"></i> Finalizar</a>
            </div>
        </div>
    </div>
</div>
<script> var id_pedido = "<?= $pedido->id_pedido ?>";</script>