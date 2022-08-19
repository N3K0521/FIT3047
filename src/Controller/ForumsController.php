<?php


namespace App\Controller;
use Cake\I18n\FrozenTime;
use Cake\Datasource\ConnectionManager;
use Cake\Event\EventInterface;
ob_start();
/**
 * Forums Controller
 *
 * @property \App\Model\Table\ForumsTable $Forums
 * @method \App\Model\Entity\Forum[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ForumsController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['list','detail']);
    
    }
 


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('dashboard');
       
        
       $forums = $this->Forums->find('all',['conditions'=>['Forums.user_id'=>$this->request->getSession()->read('Auth')['User']['user_id']]])->contain(['Users'])->all();
      
        $this->set(compact('forums'));
    }


    public function all(){
        $this->viewBuilder()->setLayout('dashboard');
       
        
       $forums = $this->Forums->find('all',['conditions'=>['Forums.approved'=>1]])->contain(['Users'])->order(['Forums.postTime'=>'ASC'])->all();
      
        $this->set(compact('forums'));
    }

    public function notification(){
        $this->viewBuilder()->setLayout('dashboard');
        
        $connection = ConnectionManager::get('default');
        $forums_sql=" SELECT 
        Forums.id AS id, 
        Forums.title AS title, 
        Forums.content AS content, 
        Forums.postTime AS postTime, 
        Forums.user_id AS user_id ,
        a.totalUnRead
      FROM 
        forums Forums 
         join 
        (select forum_id,count(*) as totalUnRead from comments where hasRead=0 group by forum_id)a  on Forums.id=a.forum_id
      WHERE 
        user_id = ".$this->request->getSession()->read('Auth')['User']['user_id'];
       $forums = $connection->execute($forums_sql)->fetchAll('assoc');
     
        $this->set(compact('forums'));
    }

    /**
     * View method
     *
     * @param string|null $id Forum id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('dashboard');

        $forums = $this->Forums->find('all',['conditions'=>['id'=>$id]
        ])->contain(['Users'])->all();

        $allComments= $this->fetchTable('Comments')->find('all',['conditions'=>['forum_id'=>$id]
        ])->contain(['Users'])->all();
        $this->set(compact('forums','allComments'));

        //unread set to 0;
        foreach($allComments as $allComments_row):
            $allComments_row->hasRead=1;
            $this->fetchTable('Comments')->save($allComments_row);
        endforeach;
        $allUnreadComments= $this->fetchTable('Comments')->find('all',
        ['conditions'=>['AND'=>['Forums.user_id'=>$this->request->getSession()->read('Auth')['User']['user_id'],'hasRead'=>'0']]])
        ->contain(['Forums'])->count();
        $this->getRequest()->getSession()->write('notification', $allUnreadComments);
       
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('dashboard');
        $forum = $this->Forums->newEmptyEntity();
        if ($this->request->is('post')) {
            $forum = $this->Forums->patchEntity($forum, $this->request->getData());
            $forum->postTime= FrozenTime::now();
            $forum->user_id=$this->Auth->User()["user_id"];
            if($this->Auth->User()['user_type']!='user'){
                $forum->approved=1;
            }
            if ($this->Forums->save($forum)) {
                $this->Flash->success(__('Submitted successfully,please wait for admin to approve.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Your forum could not be saved. Please, try again.'));
        }
        $users = $this->Forums->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('forum', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Forum id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('dashboard');
        $forum = $this->Forums->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $forum = $this->Forums->patchEntity($forum, $this->request->getData());
            if ($this->Forums->save($forum)) {
                $this->Flash->success(__('The forum has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The forum could not be saved. Please, try again.'));
        }
        $users = $this->Forums->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('forum', 'users'));
    }

    

    /**
     * Delete method
     *
     * @param string|null $id Forum id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $forum = $this->Forums->get($id);
        if ($this->Forums->delete($forum)) {
            $this->Flash->success(__('The forum has been deleted.'));
        } else {
            $this->Flash->error(__('The forum could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



    public function admindelete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $forum = $this->Forums->get($id);
        if ($this->Forums->delete($forum)) {
            $this->Flash->success(__('The forum has been deleted.'));
        } else {
            $this->Flash->error(__('The forum could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'all']);
    }


    public function list()
    {
        $this->viewBuilder()->setLayout('admin');
        $forums = $this->Forums->find('all',['conditions'=>['approved'=>'1'],
            'contain' => ['Users'],
        ])->all();
        $forumContent = $this->fetchTable('ForumContent')->find()->firstOrFail();
        $this->set(compact('forums','forumContent'));
    }


    public function detail($id=null)
    {
        $this->viewBuilder()->setLayout('admin');
        $forums = $this->Forums->find('all',['conditions'=>['id'=>$id]
        ])->contain(['Users'])->all();
        $allComments= $this->fetchTable('Comments')->find('all',['conditions'=>['AND'=>['forum_id'=>$id,'approved'=>'1']]
        ])->contain(['Users'])->all();
        $this->set(compact('forums','allComments'));

        $comment = $this->fetchTable('Comments')->newEmptyEntity();
        
        if ($this->request->is('post')) {
           

            if($this->request->getSession()->read('Auth')){ //login
                $comment = $this->fetchTable('Comments')->patchEntity($comment, $this->request->getData());
                $comment->postTime= FrozenTime::now();
                $comment->user_id=$this->Auth->User()["user_id"];
                $comment->forum_id=$id;
               
                foreach($forums as $forum): 
                    if($this->Auth->User()["user_id"]==$forum["user_id"]){
                        $comment->hasRead=1;
                    }else{
                        $comment->hasRead=0;
                    }
                endforeach;

                if($this->Auth->User()['user_type']!='user'){
                    $comment->approved=1;
                }
                
               
                if ($this->fetchTable('Comments')->save($comment)) {
                    $this->Flash->success(__('Submitted successfully,please wait for admin to approve.'));
    
                    return $this->redirect(['action' => 'detail',$id]);
                }
                $this->Flash->error(__('Your Comments cannot be submitted. Please, try again.'));
            }else{
                //not log in
                $this->Flash->error(__('You need to login first'));
                return $this->redirect(['controller'=>'users','action' => 'login']);
            }
           
        }
    }

    public function approved($isActive='forum'){
        $this->viewBuilder()->setLayout('dashboard');
        //forums
        $forums=$this->Forums->find('all',['conditions'=>['AND'=>[['approved'=>'0'],['Users.user_type'=>'user']]]])->order(['postTime'=>'ASC'])->contain(['Users'])->all();

        //comments
        $comments=$this->fetchTable('Comments')->find('all',['conditions'=>['AND'=>[['Comments.approved'=>'0'],['Users.user_type'=>'user']]]])->order(['Comments.postTime'=>'ASC'])->contain(['Users','Forums'])->all();

        $this->set(compact('forums','isActive','comments'));
    }

    public function approveforum($id = null)
    {
        $this->request->allowMethod(['post']);
        $forum = $this->Forums->get($id);
        $forum->approved=1;
        if ($this->Forums->save($forum)) {
            $this->Flash->success(__('The forum has been approved.'));
        } else {
            $this->Flash->error(__('The forum could not be approved. Please, try again.'));
        }

        return $this->redirect(['action' => 'approved','forum']);
    }

    public function approvecomment($id = null)
    {
        $this->request->allowMethod(['post']);
        $comment = $this->fetchTable('Comments')->get($id);
        $comment->approved=1;
        if ($this->fetchTable('Comments')->save($comment)) {
            $this->Flash->success(__('The comment has been approved.'));
        } else {
            $this->Flash->error(__('The comment could not be approved. Please, try again.'));
        }

        return $this->redirect(['action' => 'approved','comment']);
    }

    public function rejectforum($id = null)
    {
        $this->request->allowMethod(['post']);
        $forum = $this->Forums->get($id);
        $forum->approved=2;
        if ($this->Forums->save($forum)) {
            $this->Flash->success(__('The forum has been rejected.'));
        } else {
            $this->Flash->error(__('The forum could not be rejected. Please, try again.'));
        }

        return $this->redirect(['action' => 'approved','forum']);
    }

    public function rejectcomment($id = null)
    {
        $this->request->allowMethod(['post']);
        $comment = $this->fetchTable('Comments')->get($id);
        $comment->approved=2;
        if ($this->fetchTable('Comments')->save($comment)) {
            $this->Flash->success(__('The comment has been rejected.'));
        } else {
            $this->Flash->error(__('The comment could not be rejected. Please, try again.'));
        }

        return $this->redirect(['action' => 'approved','comment']);
    }
}
