<?php
namespace App\Controller;

use App\Controller\AppController;

class SubcategoriesController extends AppController
{

    public function index()
    {
        $subcategories = $this->paginate($this->Subcategories);

        $this->set(compact('subcategories'));
        $this->set('_serialize', ['subcategories']);
    }

    public function view($id)
    {
        $subcategory = $this->Subcategories->get($id, [
            'contain' => []
        ]);

        $this->set('subcategory', $subcategory);
        $this->set('_serialize', ['subcategory']);
    }

    public function add()
    {
        $subcategory = $this->Subcategories->newEntity();
        if ($this->request->is('post')) {
            $subcategory = $this->Subcategories->patchEntity($subcategory, $this->request->data);
            if ($this->Subcategories->save($subcategory)) {
                $this->Flash->success(__('The subcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The subcategory could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('subcategory'));
        $this->set('_serialize', ['subcategory']);
    }

    public function edit($id = null)
    {
        $subcategory = $this->Subcategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subcategory = $this->Subcategories->patchEntity($subcategory, $this->request->data);
            if ($this->Subcategories->save($subcategory)) {
                $this->Flash->success(__('The subcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The subcategory could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('subcategory'));
        $this->set('_serialize', ['subcategory']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subcategory = $this->Subcategories->get($id);
        if ($this->Subcategories->delete($subcategory)) {
            $this->Flash->success(__('The subcategory has been deleted.'));
        } else {
            $this->Flash->error(__('The subcategory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}