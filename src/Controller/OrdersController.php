<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

class OrdersController extends AppController
{
    public function index()
    {
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
        $this->set('_serialize', ['orders']);
    }

    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);

        $this->set('order', $order);
        $this->set('_serialize', ['order']);
    }

    public function add()
    {
    session_start();
        $order = $this->Orders->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['idPayment']++;
            $this->request->data['idDelivery']++;
            $order = $this->Orders->patchEntity($order, $this->request->data);
            
            if ($this->Orders->save($order)) {
                $connection = ConnectionManager::get('default');
                foreach($_SESSION['koszyk'] as $product):
		$connection->execute("INSERT INTO orderProducts SET idOrder='".$order['idOrder']."', idProduct='".$product['idProduct']."', count='".$product['count']."', price='".$product['priceProduct']."'");
		endforeach;
		unset($_SESSION['koszyk']);
		$_SESSION['countProducts'] = 0;
                return $this->redirect(['action' => 'successful']);
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('order'));
        $this->set('_serialize', ['order']);
    }

    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('order'));
        $this->set('_serialize', ['order']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        $connection = ConnectionManager::get('default');
	$connection->execute("DELETE FROM orderProducts WHERE idOrder='".$id."'");
    
	if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }
	
        return $this->redirect(['action' => 'index']);
    }
    
    public function successful()
    {
    
    }
}