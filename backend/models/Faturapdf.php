<?php
namespace backend\models;

use Mpdf\Mpdf;

class Faturapdf
{

    public function generatePDF($pedido, $empresa,$linhapedido)
    {
        $mpdf = new Mpdf();
        $mpdf->WriteHTML('
        <div class="content-wrapper">
            <div class="container-fluid">
        <!-- Main content -->
                <section class="invoice">
            
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> Gersoft
                            </h2>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-4">
            
                            <h4>Fatura nº'. $pedido->id  .'</h4>
                            <h5>Data: '. $pedido->data .'</h5>
                            <address>
            
                                <br>
                                Empresa:'. $empresa->nomeempresa .'<br>
                                NIF: '. $empresa->nif .'<br>
                                Morada:'. $empresa->morada.'<br>
                                Código Postal:'.$empresa->codpostal.' '. $empresa->localidade.'<br>
                                Telefone: '. $empresa->telefone.'<br>
                                Capital Social: '. $empresa ->capitalsocial.'€<br>
            
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <address>
                                <br>
                                <h1>Cliente</h1>
                                Nome:'. $pedido->profile->user->username.'<br>
                                NIF: '. $pedido->profile->numcontribuinte.'<br>
                            </address>
                            <br>
                            <p></p>
                        </div>
                    </div>
                    <!-- /.row -->
            
                    <!-- Table row -->
                    <div class="container">
                        <div class="col-12 table-responsive">
                            <table class="table">
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
                               ');
                                        $valoriva=0;
                                      foreach($linhapedido as $linha){
                                $mpdf->WriteHTML('
                                        <tr>
                                            <td> '.  $linha->artigo->referencia  .' </td>
                                            <td> '.  $linha->artigo->descricao  .'</td>
                                            <td> '. $linha->quantidade  .'</td>
                                            <td> '. $linha->valorunitario .'€</td>
                                            <td> '. $linha->valorunitario*$linha->taxaiva/100 .'€</td>
                                            <td> '. $linha->taxaiva  .'%</td>
                                        </tr>
                                        ');
                                          $valoriva=$valoriva+$linha->valorunitario*$linha->taxaiva/100;
                                     }
                $mpdf->WriteHTML('
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
                                        <td> '. $valoriva .' €</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>'. $pedido->total.'€</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </section>
            </div>
        </div>

        
        
                            ');




        $mpdf->Output('fatura_n'.$pedido->id.'.pdf');
    }


}