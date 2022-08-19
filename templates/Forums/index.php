<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Forum[]|\Cake\Collection\CollectionInterface $forums
 */
?>
 
                    <h3>Forums</h3>
                    <?= $this->Flash->render() ?>
                    <?= $this->Html->link(__('New Forums'), ['action' => 'add'], ['class' => 'btn btn-success','style'=>'float:right;margin-bottom: 20px;;width:131px']) ?>
                    <table class="table table-hover table-bordered ">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('title') ?></th>
                                <th><?= $this->Paginator->sort('content') ?></th>
                                <th><?= $this->Paginator->sort('postTime') ?></th>
                                <th><?= $this->Paginator->sort('state') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($forums as $forum): ?>
                            <tr>
                                <td><?= h($forum["title"]) ?></td>
                                <td><?= h($forum["content"]) ?></td>
                                <td><?= h($forum["postTime"]) ?></td>
                                <td><?php if($forum["approved"]==0){
                                    echo 'Waiting for approve';
                                }else if($forum["approved"]==1){
                                    echo 'Approved';
                                }else if($forum["approved"]==2){
                                    echo 'Rejected';
                                } ?></td>
                                <td class="actions">
                                    <?php if($forum["totalUnRead"]>0){
                                        echo $this->Html->link('View<span class="unread">'.$forum["totalUnRead"].'</span>', ['action' => 'view', $forum["id"]],['class' => 'btn btn-info','style'=>'color:white','escape'=>false]);
                                    }else{
                                        echo $this->Html->link('View'.$forum["totalUnRead"].'</span>', ['action' => 'view', $forum["id"]],['class' => 'btn btn-info','style'=>'color:white','escape'=>false]);
                                    }
                              ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $forum["id"]],['class' => 'btn btn-primary','style'=>'color:white']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $forum["id"]], ['class' => 'btn btn-danger','style'=>'color:white','confirm' => __('Are you sure you want to delete # {0}?', $forum["title"])]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
               