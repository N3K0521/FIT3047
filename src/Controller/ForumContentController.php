<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ForumContent Controller
 *
 * @property \App\Model\Table\ForumContentTable $ForumContent
 * @method \App\Model\Entity\ForumContent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ForumContentController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $forumContent = $this->paginate($this->ForumContent);

        $this->set(compact('forumContent'));
    }

    /**
     * View method
     *
     * @param string|null $id Forum Content id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $forumContent = $this->ForumContent->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('forumContent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('dashboard');
        $forumContent = $this->ForumContent->find()->firstOrFail();
      
        if ($this->request->is(['patch', 'post', 'put'])) {
            $forumContent->title1 = $this->request->getData()['title1'];
            $forumContent->paragraph1 = $this->request->getData()['paragraph1'];
            if ($this->ForumContent->save($forumContent)) {
                $this->Flash->success(__('The content has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The content could not be saved. Please, try again.'));
        }
        $this->set(compact('forumContent'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Forum Content id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $forumContent = $this->ForumContent->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $forumContent = $this->ForumContent->patchEntity($forumContent, $this->request->getData());
            if ($this->ForumContent->save($forumContent)) {
                $this->Flash->success(__('The forum content has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The forum content could not be saved. Please, try again.'));
        }
        $this->set(compact('forumContent'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Forum Content id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $forumContent = $this->ForumContent->get($id);
        if ($this->ForumContent->delete($forumContent)) {
            $this->Flash->success(__('The forum content has been deleted.'));
        } else {
            $this->Flash->error(__('The forum content could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
