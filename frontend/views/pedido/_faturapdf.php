<!-- Main content -->
<div class="container-fluid">
    <section class="invoice">
        <!-- title row -->
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">

                <h2>Fatura nº <?=$pedido->id ?></h2>
                <h5>Data: <?=$pedido->data ?></h5>
                <address>

                    <br>
                    Empresa:<?= $empresa->nomeempresa ?><br>
                    NIF: <?= $empresa->nif ?><br>
                    Morada:<?= $empresa->morada ?><br>
                    Código Postal: <?=$empresa->codpostal?> <?=$empresa->localidade?><br>
                    Telefone: <?= $empresa->telefone?><br>
                    Capital Social: <?=$empresa ->capitalsocial?><br>

                </address>
            </div>
            <div class="col-sm-4 invoice-col"></div>

            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <address>
                    <br>
                    <h2>Cliente</h2>
                    Nome: <?=$pedido->profile->user->username ?><br>
                    NIF: <?= $pedido->profile->numcontribuinte ?><br>
                </address>
            </div>
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>REF</th>
                        <th>Descrição</th>
                        <th>QTD #</th>
                        <th>Valor Un.</th>
                        <th>Valor IVA</th>
                        <th>Taxa IVA</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                        $valoriva=0;
                        foreach($linhapedido as $linha){
                            echo '<tr>';
                            echo '<td> '.  $linha->artigo->referencia  .' </td>';
                            echo '<td> '.  $linha->artigo->descricao  .'</td>';
                            echo '<td> '. $linha->quantidade  .'</td>';
                            echo '<td> '. $linha->valorunitario .'€</td>';
                            echo '<td>'. $linha->valorunitario*$linha->taxaiva/100 .'€</td>';
                            echo '<td> '. $linha->taxaiva  .'%</td>';
                            echo '</tr>';
                            $valoriva=$valoriva+$linha->valorunitario*$linha->taxaiva/100;

                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-9">
            </div>
            <!-- /.col -->
            <div class="col-3">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Valor IVA:</th>
                            <td> <?= $valoriva ?> €</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td><?= $pedido->total ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
    </section>

</div>
