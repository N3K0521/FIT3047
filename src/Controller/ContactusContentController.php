<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ContactusContent Controller
 *
 * @property \App\Model\Table\ContactusContentTable $ContactusContent
 * @method \App\Model\Entity\ContactusContent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactusContentController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $contactusContent = $this->paginate($this->ContactusContent);

        $this->set(compact('contactusContent'));
    }

    /**
     * View method
     *
     * @param string|null $id Contactus Content id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = 1)
    {
        $this->viewBuilder()->setLayout('admin');
        $contactusContent = $this->ContactusContent->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('contactusContent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactusContent = $this->ContactusContent->newEmptyEntity();
        if ($this->request->is('post')) {
            $contactusContent = $this->ContactusContent->patchEntity($contactusContent, $this->request->getData());
            if ($this->ContactusContent->save($contactusContent)) {
                $this->Flash->success(__('The contactus content has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contactus content could not be saved. Please, try again.'));
        }
        $this->set(compact('contactusContent'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contactus Content id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = 1)
    {
        $this->viewBuilder()->setLayout('dashboard');
        $contactusContent = $this->ContactusContent->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactusContent = $this->ContactusContent->patchEntity($contactusContent, $this->request->getData());
            if ($this->ContactusContent->save($contactusContent)) {
                $this->Flash->success(__('The contactus content has been saved.'));

                return $this->redirect(['action' => 'view']);
            }
            $this->Flash->error(__('The contactus content could not be saved. Please, try again.'));
        }
        $this->set(compact('contactusContent'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contactus Content id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contactusContent = $this->ContactusContent->get($id);
        if ($this->ContactusContent->delete($contactusContent)) {
            $this->Flash->success(__('The contactus content has been deleted.'));
        } else {
            $this->Flash->error(__('The contactus content could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
