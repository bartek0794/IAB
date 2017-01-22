<?php
namespace App\Controller;

use App\Controller\AppController;

class ProductsController extends AppController
{

    public function index()
    {
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
    }

    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);

        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
    }

    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
	public function addtocart($id) {
		session_start();
			
		if($id)
		{    
			if(!isset($_SESSION['koszyk'][$id])) {
				$_SESSION['koszyk'][$id]['idProduct'] = $id;
				$_SESSION['koszyk'][$id]['nameProduct'] = $this->Products->get($id)->nameProduct;
				$_SESSION['koszyk'][$id]['priceProduct'] = $this->Products->get($id)->priceProduct;
				$_SESSION['koszyk'][$id]['image'] = $this->Products->get($id)->image;
				$_SESSION['koszyk'][$id]['count'] = 1;
			}
			else
			{
				$_SESSION['koszyk'][$id]['count']++;

			}
			
			if(isset($_SESSION['countProducts'])){
				$_SESSION['countProducts'] = 0;
				foreach($_SESSION['koszyk'] as $product):
					$_SESSION['countProducts'] += $product['count'];
				endforeach;
			}
			else
				$_SESSION['countProducts'] = 1;
			return $this->redirect(['action' => 'view', $id]);
		}
	}
}