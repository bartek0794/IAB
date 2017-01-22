<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Datasource\ConnectionManager;

class UsersController extends AppController
{

    public function index()
    {
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    public function view($id = null)
    {
        $user = $this->Users->get($_GET['id'], ['contain' => []]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            echo '<br/>';
            echo '<br/>';
            echo '<br/>';
            
            $connection = ConnectionManager::get('default');
	    $result = $connection->execute('SELECT password FROM users WHERE idUser ="'.$user['idUser'].'"')->fetchAll();
            if(password_verify($this->request->data['Stare'], $result[0][0])) {            
		echo "Zmieniono hasło";
		$result = $connection->execute('UPDATE users SET password ="'.(new DefaultPasswordHasher)->hash($user['Nowe']).'"');	
	    }
	    else{
		echo "Złe hasło";
	    }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function login() {	
	if($this->request->is('post'))
	{
		$user_email = trim($this->request->data['user_email']);
		$password = trim($this->request->data['password']);
		
		try
		{ 
			$connection = ConnectionManager::get('default');
			$result = $connection->execute('SELECT * FROM users WHERE users.email ="'.$user_email.'"')->fetchAll();
			if(count($result) == 0) {
				echo '<br/><br/><br/>Niepoprawny adres e-mail';
			}
			else{
				$id = $result[0][0];
				if (password_verify($password, $result[0][2])) {
					session_start();
					$_SESSION['user']['id'] = $id;
					$_SESSION['user']['name'] = $result[0][1];
					
					if($result[0][1] == 'admin@admin'){
						$_SESSION['admin'] = $result[0][1];
					}
					
					return $this->redirect(['action' => 'view', 'id' => $_SESSION['user']['id']]);
				} else {
					echo '<br/><br/><br/><br/>Niepoprawne hasło';
				}
			}
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
    }
    
    public function logout() {
	session_start();
	unset($_SESSION['user_session']);
 
	if(session_destroy())
	{
		return $this->redirect(['controller' => 'pages', 'action' => 'display', 'home']);
	}
    }
    
    public function admin() { }
    
    public function register() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('Użytkownik zarejestrowany');
                

                return $this->redirect(['action' => 'index']);
            } else {
                print_r ('Rejestracja nie powiodła się');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    
    }
}