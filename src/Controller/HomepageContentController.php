<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * HomepageContent Controller
 *
 * @property \App\Model\Table\HomepageContentTable $HomepageContent
 * @method \App\Model\Entity\HomepageContent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomepageContentController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $homepageContent = $this->paginate($this->HomepageContent);

        $this->set(compact('homepageContent'));
    }

    /**
     * View method
     *
     * @param string|null $id Homepage Content id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $homepageContent = $this->HomepageContent->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('homepageContent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('dashboard');
        $homeContent = $this->HomepageContent->find()->firstOrFail();
        if ($this->request->is(['patch', 'post', 'put'])) {
           $upload_image1=$this->request->getData()['image1'];
           $upload_image2=$this->request->getData()['image2'];
           $upload_image3=$this->request->getData()['image3'];

            if(!empty($upload_image1->getSize() != 0)) {
                $im = $upload_image1->getClientFilename();
                $uploadpath = $_SERVER['DOCUMENT_ROOT'] .'/'.basename(dirname(APP)). '/webroot/img/homepage/';
                $uploadfile = $uploadpath . $im;
                $upload_image1->moveTo($uploadfile) ;
                $homeContent->image1 = $im;

            }
            if(!empty($upload_image2->getSize() != 0)) {
                $im = $upload_image2->getClientFilename();
                $uploadpath = $_SERVER['DOCUMENT_ROOT'] .'/'.basename(dirname(APP)). '/webroot/img/homepage/';
                $uploadfile = $uploadpath . $im;
                $upload_image2->moveTo($uploadfile) ;
                $homeContent->image2 = $im;

            }
            if(!empty($upload_image3->getSize() != 0)) {
                $im = $upload_image3->getClientFilename();
                $uploadpath = $_SERVER['DOCUMENT_ROOT'] .'/'.basename(dirname(APP)). '/webroot/img/homepage/';
                $uploadfile = $uploadpath . $im;
                $upload_image3->moveTo($uploadfile) ;
                $homeContent->image3 = $im;

            }

            $homeContent->title1 = $this->request->getData()['title1'];
            $homeContent->paragraph1 = $this->request->getData()['paragraph1'];
            $homeContent->title2 = $this->request->getData()['title2'];
            $homeContent->paragraph2 = $this->request->getData()['paragraph2'];
            $homeContent->title3 = $this->request->getData()['title3'];
            $homeContent->paragraph3 = $this->request->getData()['paragraph3'];
            $homeContent->title4 = $this->request->getData()['title4'];
            $homeContent->paragraph4 = $this->request->getData()['paragraph4'];
            $homeContent->name1 = $this->request->getData()['name1'];
            $homeContent->usertype1 = $this->request->getData()['usertype1'];
            $homeContent->userdes = $this->request->getData()['userdes'];
            //  debug($homeContent);
            if ($this->HomepageContent->save($homeContent)) {
                $this->Flash->success(__('The content has been saved.'));
                return $this->redirect(['action' => 'add']);
            }



            $this->Flash->error(__('The content could not be saved. Please, try again.'));
        }
        $this->set(compact('homeContent'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Homepage Content id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $homepageContent = $this->HomepageContent->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $homepageContent = $this->HomepageContent->patchEntity($homepageContent, $this->request->getData());
            if ($this->HomepageContent->save($homepageContent)) {
                $this->Flash->success(__('The homepage content has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The homepage content could not be saved. Please, try again.'));
        }
        $this->set(compact('homepageContent'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Homepage Content id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $homepageContent = $this->HomepageContent->get($id);
        if ($this->HomepageContent->delete($homepageContent)) {
            $this->Flash->success(__('The homepage content has been deleted.'));
        } else {
            $this->Flash->error(__('The homepage content could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
