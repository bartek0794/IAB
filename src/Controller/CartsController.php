<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

class CartsController extends AppController
{
    public function index()
    {
        $carts = $this->paginate($this->Carts);

        $this->set(compact('carts'));
        $this->set('_serialize', ['carts']);
    }
    
    public function update() {
    session_start();
	if ($this->request->is('post')) {
            if (!empty($this->request->data)) {
                foreach ($this->request->data['count'] as $index=>$count) {
                    
                    if ($count>0) {
			 $productId = $this->request->data['product_id'][$index];
                       $_SESSION['koszyk'][$productId]['count'] = $count; 
	        }
                }
                
            
            }
        }
        $this->redirect(array('action'=>'view'));
    }
    
    public function del($id) {
    session_start();
    $i = true;
	unset($_SESSION['koszyk'][$id]); 
	
	foreach($_SESSION['koszyk'] as $product => $k):
		if(empty($product[$k]))
			$i = false;
	endforeach;
	if($i == true) {
		unset($_SESSION['koszyk']);
		$_SESSION['countProducts'] = 0;
	}
	
        $this->redirect(array('action'=>'view'));
    }

    
    public function view($id = null)
    {
       
    }

    
    public function add()
    {
	session_start();
            
	$connection = ConnectionManager::get('default');
	foreach($_SESSION['koszyk'] as $product):
		$connection->execute("INSERT INTO carts SET idProduct='".$product['idProduct']."', idUser='".$_SESSION['user']['id']."', priceOne='".$product['priceProduct']."', quantity='".$product['count']."', value='".$product['count']*$product['priceProduct']."' ");
	endforeach;
	$this->redirect(array('action'=>'view'));
	
    }
    
    public function edit($id = null)
    {
        $cart = $this->Carts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cart = $this->Carts->patchEntity($cart, $this->request->data);
            if ($this->Carts->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cart could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cart'));
        $this->set('_serialize', ['cart']);
    }
    
    
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cart = $this->Carts->get($id);
        if ($this->Carts->delete($cart)) {
            $this->Flash->success(__('The cart has been deleted.'));
        } else {
            $this->Flash->error(__('The cart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
