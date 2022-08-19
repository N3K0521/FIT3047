<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ArticleContent Controller
 *
 * @property \App\Model\Table\ArticleContentTable $ArticleContent
 * @method \App\Model\Entity\ArticleContent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticleContentController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $articleContent = $this->paginate($this->ArticleContent);

        $this->set(compact('articleContent'));
    }

    /**
     * View method
     *
     * @param string|null $id Article Content id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articleContent = $this->ArticleContent->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('articleContent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('dashboard');
        $articleContent = $this->ArticleContent->find()->firstOrFail();
      
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articleContent->title1 = $this->request->getData()['title1'];
            $articleContent->paragraph1 = $this->request->getData()['paragraph1'];
            if ($this->ArticleContent->save($articleContent)) {
                $this->Flash->success(__('The content has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The content could not be saved. Please, try again.'));
        }
        $this->set(compact('articleContent'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article Content id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articleContent = $this->ArticleContent->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articleContent = $this->ArticleContent->patchEntity($articleContent, $this->request->getData());
            if ($this->ArticleContent->save($articleContent)) {
                $this->Flash->success(__('The article content has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article content could not be saved. Please, try again.'));
        }
        $this->set(compact('articleContent'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article Content id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articleContent = $this->ArticleContent->get($id);
        if ($this->ArticleContent->delete($articleContent)) {
            $this->Flash->success(__('The article content has been deleted.'));
        } else {
            $this->Flash->error(__('The article content could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
