<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        //Aceder backend
        $accessbackend=$auth->createPermission('accessbackend');
        $accessbackend=$auth->description='Aceder ao backend';
        $auth->add($accessbackend);
        //Aceder frontend
        $accessfrontend=$auth->createPermission('accessfrontend');
        $accessfrontend=$auth->description='Aceder ao frontend';
        $auth->add($accessfrontend);
        //Criar qualquer registo
        $create=$auth->createPermission('create');
        $create->description='Criar registo de qualquer tabela';
        $auth->add($create);
        // Criar Clientes
        $createUtilizador = $auth->createPermission('createutilizador');
        $createUtilizador->description = 'Criar Cliente';
        $auth->add($createUtilizador);
        //Criar Comentário
        $createComentario=$auth->createPermission('createcomentario');
        $createComentario->description='Criar comentário';
        $auth->add($createComentario);
        //Criar reserva
        $createReserva=$auth->createPermission('createreserva');
        $createReserva->description='Criar reserva';
        $auth->add($createReserva);
        //Criar Método Pagamento
        $createMetodoPagamento=$auth->createPermission('createmetodopagamento');
        $createMetodoPagamento->description='Criar Método Pagamento';
        $auth->add($createMetodoPagamento);
        //Criar Mesa
        $createMesa=$auth->createPermission('createmesa');
        $createMesa->description='Criar Mesa';
        $auth->add($createMesa);
        //Criar taxa de iva
        $createIva=$auth->createPermission('createiva');
        $createIva->description='Criar Iva';
        $auth->add($createIva);
        //Criar Pedido
        $createPedido=$auth->createPermission('createpedido');
        $createPedido->description='Criar Pedido';
        $auth->add($createPedido);
        //Criar Linha Pedido
        $createLinhaPedido=$auth->createPermission('createlinhapedido');
        $createLinhaPedido->description='Criar Linha de pedido';
        $auth->add($createLinhaPedido);
        //Criar Artigos
        $createArtigo=$auth->createPermission('createartigo');
        $createArtigo->description='Criar Artigo';
        $auth->add($createArtigo);
        //Criar Categorias
        $createCategoria=$auth->createPermission('createcategoria');
        $createCategoria->description='Criar Categoria';
        $auth->add($createCategoria);
        /* ******************************************************************************* */

        //Editar qualquer registo
        $update=$auth->createPermission('update');
        $update->description='Editar qualquer registo';
        $auth->add($update);
        // Editar Clientes
        $updateUtilizador = $auth->createPermission('updateutilizador');
        $updateUtilizador->description = 'Editar Utilizador';
        $auth->add($updateUtilizador);
        //Editar Comentário
        $updateComentario=$auth->createPermission('updatecomentario');
        $updateComentario->description='Editar Comentário';
        $auth->add($updateComentario);
        //Editar Reserva
        $updateReserva=$auth->createPermission('updatereserva');
        $updateReserva->description='Editar Reserva';
        $auth->add($updateReserva);
        //Editar Método Pagamento
        $updateMetodoPagamento=$auth->createPermission('updatemetodopagamento');
        $updateMetodoPagamento->description='Editar Método Pagamento';
        $auth->add($updateMetodoPagamento);
        //Editar Mesa
        $updateMesa=$auth->createPermission('updatemesa');
        $updateMesa->description='Editar Mesa';
        $auth->add($updateMesa);
        //Editar Iva
        $updateIva=$auth->createPermission('updateiva');
        $updateIva->description='Editar taxa de iva';
        $auth->add($updateIva);
        //Editar Pedido
        $updatePedido=$auth->createPermission('updatepedido');
        $updatePedido->description='Editar pedido';
        $auth->add($updatePedido);
        //Editar Linha Pedido
        $updateLinhaPedido=$auth->createPermission('updatelinhapedido');
        $updateLinhaPedido->description='Editar linha de pedido';
        $auth->add($updateLinhaPedido);
        //Editar Artigo
        $updateArtigo=$auth->createPermission('updateartigo');
        $updateArtigo->description='Editar Artigo';
        $auth->add($updateArtigo);
        //Editar Categoria
        $updateCategoria=$auth->createPermission('updatecategoria');
        $updateCategoria->description='Editar Categoria';
        $auth->add($updateCategoria);
        /* ******************************************************************************* */

        // Apagar registos de qualquer tabela
        $delete=$auth->createPermission('delete');
        $delete->description='Apagar';
        $auth->add($delete);
        //Apagar Comentários
        $deleteComentario=$auth->createPermission('deletecomentario');
        $deleteComentario->description='Apagar comentário';
        $auth->add($deleteComentario);
        //Apagar Reservas
        $deleteReserva=$auth->createPermission('deletereserva');
        $deleteReserva->description='Apagar Reserva';
        $auth->add($deleteReserva);
        //Apagar Método Pagamento
        $deleteMetodoPagamento=$auth->createPermission('deletemetodopagamento');
        $deleteMetodoPagamento->description='Apagar método pagamento';
        $auth->add($deleteMetodoPagamento);
        //Apagar Mesa
        $deleteMesa=$auth->createPermission('deletemesa');
        $deleteMesa->description='Apagar Mesa';
        $auth->add($deleteMesa);
        //Apagar Taxa de Iva
        $deleteIva=$auth->createPermission('deleteiva');
        $deleteIva->description='Apagar taxa de iva';
        $auth->add($deleteIva);
        //Apagar Pedido
        $deletePedido=$auth->createPermission('deletepedido');
        $deletePedido->description='Apagar pedido';
        $auth->add($deletePedido);
        //Apagar linha pedido
        $deleteLinhaPedido=$auth->createPermission('deletelinhapedido');
        $deleteLinhaPedido->description='Apagar linha pedido';
        $auth->add($deleteLinhaPedido);
        //Apagar Artigo
        $deleteArtigo=$auth->createPermission('deleteartigo');
        $deleteArtigo->description='Apagar Artigo';
        $auth->add($deleteArtigo);
        //Apagar Categoria
        $deleteCategoria=$auth->createPermission('deletecategoria');
        $deleteCategoria->description='Apagar Categoria';
        $auth->add($deleteCategoria);
        /* ******************************************************************************* */

        // add "admin" role and give all  permissions
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin,$create);
        $auth->addChild($admin,$accessbackend);
        $auth->addChild($admin,$update);
        $auth->addChild($admin,$delete);
        $auth->addChild($admin,$createComentario);
        $auth->addChild($admin,$updateComentario);
        $auth->addChild($admin,$deleteComentario);
        $auth->addChild($admin,$createReserva);
        $auth->addChild($admin,$updateReserva);
        $auth->addChild($admin,$deleteReserva);
        $auth->addChild($admin,$createUtilizador);
        $auth->addChild($admin,$updateUtilizador);
        $auth->addChild($admin,$createMetodoPagamento);
        $auth->addChild($admin,$updateMetodoPagamento);
        $auth->addChild($admin,$deleteMetodoPagamento);
        $auth->addChild($admin,$createMesa);
        $auth->addChild($admin,$updateMesa);
        $auth->addChild($admin,$deleteMesa);
        $auth->addChild($admin,$createIva);
        $auth->addChild($admin,$updateIva);
        $auth->addChild($admin,$deleteIva);
        $auth->addChild($admin,$createPedido);
        $auth->addChild($admin,$updatePedido);
        $auth->addChild($admin,$deletePedido);
        $auth->addChild($admin,$createLinhaPedido);
        $auth->addChild($admin,$updateLinhaPedido);
        $auth->addChild($admin,$deleteLinhaPedido);
        $auth->addChild($admin,$createArtigo);
        $auth->addChild($admin,$updateArtigo);
        $auth->addChild($admin,$deleteArtigo);
        $auth->addChild($admin,$createCategoria);
        $auth->addChild($admin,$updateCategoria);
        $auth->addChild($admin,$deleteCategoria);


        // add "funcionario" role and give this role the "updatePost" permission
        $funcionario = $auth->createRole('funcionario');
        $auth->add($funcionario);
        $auth->addChild($funcionario, $updateUtilizador);
        $auth->addChild($funcionario, $createUtilizador);
        $auth->addChild($funcionario,$accessbackend);
        $auth->addChild($funcionario,$createReserva);
        $auth->addChild($funcionario,$updateReserva);
        $auth->addChild($funcionario,$deleteReserva);
        $auth->addChild($funcionario,$createComentario);
        $auth->addChild($funcionario,$updateComentario);
        $auth->addChild($funcionario,$deleteComentario);
        $auth->addChild($funcionario,$createIva);
        $auth->addChild($funcionario,$updateIva);
        $auth->addChild($funcionario,$createMesa);
        $auth->addChild($funcionario,$updateMesa);
        $auth->addChild($funcionario,$createCategoria);
        $auth->addChild($funcionario,$updateCategoria);
        $auth->addChild($funcionario,$createArtigo);
        $auth->addChild($funcionario,$updateArtigo);
        $auth->addChild($funcionario,$deleteArtigo);
        $auth->addChild($funcionario,$createLinhaPedido);
        $auth->addChild($funcionario,$updateLinhaPedido);
        $auth->addChild($funcionario,$deleteLinhaPedido);
        $auth->addChild($funcionario,$createPedido);
        $auth->addChild($funcionario,$updatePedido);
        $auth->addChild($funcionario,$deletePedido);

        // add "cliente" role and give this role the "updatePost" permission
        $cliente=$auth->createRole('cliente');
        $auth->add($cliente);
        $auth->addChild($cliente,$createReserva);
        $auth->addChild($admin,$accessfrontend);
        $auth->addChild($cliente,$updateReserva);
        $auth->addChild($cliente,$deleteReserva);
        $auth->addChild($cliente,$createComentario);
        $auth->addChild($cliente,$updateComentario);
        $auth->addChild($cliente,$deleteComentario);
        $auth->addChild($cliente,$createPedido);
        $auth->addChild($cliente,$updatePedido);
        $auth->addChild($cliente,$deletePedido);
        $auth->addChild($cliente,$createLinhaPedido);
        $auth->addChild($cliente,$updateLinhaPedido);
        $auth->addChild($cliente,$deleteLinhaPedido);
        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.

    }
}
