<?php
namespace App\Controller;

use App\Controller\AppController;

class ContactController extends AppController
{

    public function index()
    {
        $contact = $this->paginate($this->Contact);

        $this->set(compact('contact'));
        $this->set('_serialize', ['contact']);
    }

    public function view($id = null)
    {
        $contact = $this->Contact->get($id, [
            'contain' => []
        ]);

        $this->set('contact', $contact);
        $this->set('_serialize', ['contact']);
    }

    public function add()
    {
	if(!isset($_SESSION['user'])) {
	session_start();
	}
        $contact = $this->Contact->newEntity();
        if ($this->request->is('post')) {
            $contact = $this->Contact->patchEntity($contact, $this->request->data);
            if ($this->Contact->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['controller'=>'users','action' => 'view', $_SESSION['user']['id']]);
            } else {
                $this->Flash->error(__('The contact could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('contact'));
        $this->set('_serialize', ['contact']);
    }

    public function edit($id = null)
    {
        $contact = $this->Contact->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contact = $this->Contact->patchEntity($contact, $this->request->data);
            if ($this->Contact->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contact could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('contact'));
        $this->set('_serialize', ['contact']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contact = $this->Contact->get($id);
        if ($this->Contact->delete($contact)) {
            $this->Flash->success(__('The contact has been deleted.'));
        } else {
            $this->Flash->error(__('The contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}