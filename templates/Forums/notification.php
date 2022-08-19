<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Forum[]|\Cake\Collection\CollectionInterface $forums
 */
?>
 
                    <h3>Notification</h3>
                    <?= $this->Flash->render() ?>
                  
                    <table class="table table-hover table-bordered ">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('title') ?></th>
                                <th><?= $this->Paginator->sort('content') ?></th>
                                <th><?= $this->Paginator->sort('postTime') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($forums as $forum): ?>
                            <tr>
                                <td><?= h($forum["title"]) ?></td>
                                <td><?= h($forum["content"]) ?></td>
                                <td><?= h($forum["postTime"]) ?></td>
                                <td class="actions">
                                    <?php if($forum["totalUnRead"]>0){
                                        echo $this->Html->link('Unread forum<span class="unread">'.$forum["totalUnRead"].'</span>', ['action' => 'view', $forum["id"]],['class' => 'btn btn-info','style'=>'color:white','escape'=>false]);
                                    }else{
                                        echo $this->Html->link('Unread forum'.$forum["totalUnRead"].'</span>', ['action' => 'view', $forum["id"]],['class' => 'btn btn-info','style'=>'color:white','escape'=>false]);
                                    }
                              ?>
                                   
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                