<?php


namespace App\Controller;

use Cake\I18n\FrozenTime;
use Cake\Event\EventInterface;
use Cake\Mailer\TransportFactory;
use Cake\Mailer\MailerAwareTrait;
use Cake\Mailer\Email;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */



class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        // Allow users to logout and reset their password
        $this->Auth->allow(['login', 'register', 'password', 'reset','logout']);
    }

    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'managment']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function managment()
    {
        $this->viewBuilder()->setLayout('dashboard');
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * User Type method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function type($id = null, $type = null)
    {
        $this->viewBuilder()->setLayout('dashboard');

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user->user_type = $type;
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been updated.'));

                return $this->redirect(['action' => 'managment']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }



    public function register()
    {
        $this->viewBuilder()->setLayout('admin');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            //check email
            $query = $this->Users->findByUserEmail($this->getRequest()->getdata('user_email'));

            $users = $query->first();
            if (is_null($users)) {
                $emailSplit=explode("@",$this->getRequest()->getdata('user_email'));
                if(strlen($emailSplit[0])>45||strlen($emailSplit[1])>100){
                    $this->Flash->error('the length of character before @ must less than 45 and the length of character after @ must less than 100.');
                }
                else{
                    $userDetails = $this->request->getData();
                    if ($userDetails['user_password'] == $userDetails['user_password2']) {
                        $user = $this->Users->patchEntity($user, $userDetails);
                        $user["registered_timestamp"] = FrozenTime::now();
                        $user["user_type"] = 'user';
                        if ($this->Users->save($user)) {
                            $this->Flash->success(__('Sign up successfully.'));

                            return $this->redirect(['action' => 'login']);
                        }
                    } else {
                        $this->Flash->error('Your confirm password is not same as your password.');
                    }
                }

            } else {
                $this->Flash->error('This email has been registered.');
            }
        }
    }
    public function login()
    {
        $this->viewBuilder()->setLayout('admin');
        if ($this->getRequest()->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['controller'=>'Forums','action'=>'notification']);
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function password()
    {
        $this->viewBuilder()->setLayout('admin');
        if ($this->getRequest()->is('post')) {
            $query = $this->Users->findByUserEmail($this->getRequest()->getdata('user_email'));

            $users = $query->first();
            if (is_null($users)) {
                $this->Flash->error('Email address does not exist. Please try again');
            } else {

                $passkey = uniqid();

                $url = Router::Url(['controller' => 'Users', 'action' => 'reset'], true) . '/' . $passkey;
                $timeout = time() + DAY;
                if ($this->Users->updateAll(['passkey' => $passkey, 'timeout' => $timeout], ['user_id' => $users->user_id])) {

                    $this->sendResetEmail($url, $users);
                    $this->redirect(['action' => 'login']);
                } else {
                    $this->Flash->error('Error saving reset passkey/timeout');
                }
            }
        }
    }

    private function sendResetEmail($url, $users)
    {
        $email = new Email('default');
        $email->viewBuilder()->setTemplate('resetpw');
        $email->setEmailFormat('html');

        $email->setTo($users->user_email);
        $email->setSubject('Reset your password');
        $email->setViewVars(['url' => $url, 'user_lname' => $users->user_lname, 'user_fname' => $users->user_fname]);
        if ($email->send()) {
            $this->Flash->success(__('Check your email for your reset password link'));
        } else {
            $this->Flash->error(__('Error sending email: ') . $email->smtpError);
        }
    }

    public function reset($passkey = null)
    {
        $this->viewBuilder()->setLayout('admin');
        if ($passkey) {
            $query = $this->Users->find('all', ['conditions' => ['passkey' => $passkey, 'timeout >' => time()]]);
            $users = $query->first();
            if ($users) {
                if (!empty($this->getRequest()->getData())) {
                    // Clear passkey and timeout
                    $this->getRequest()->getdata('passkey') == null;
                    $this->getRequest()->getdata('timeout') == null;
                    $users = $this->Users->patchEntity($users, $this->getRequest()->getdata());
                    $users->user_password = $this->getRequest()->getdata()['password'];

                    if ($this->Users->save($users)) {

                        $this->Flash->success(__('Your password has been successfully reset.'));
                        return $this->redirect(['action' => 'login']);
                    } else {
                        $this->Flash->error(__('Your password could not be reset. Please, try again.'));
                    }
                }
            } else {
                $this->Flash->error('Invalid or expired passkey. Please check your email or try again');
                $this->redirect(['action' => 'password']);
            }

            unset($users->password);
            $this->set(compact('users'));
        } else {
            $this->redirect('/');
        }
    }

    public function dashboard()
    {
        $this->viewBuilder()->setLayout('dashboard');
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out');
        return $this->redirect($this->Auth->logout());
    }
}
