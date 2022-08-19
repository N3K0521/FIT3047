<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Forum[]|\Cake\Collection\CollectionInterface $forums
 */
?>

                    <h3>All Approved Forums</h3>
                    <?= $this->Flash->render() ?>
                   
                    <table class="table table-hover table-bordered ">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('title') ?></th>
                                <th><?= $this->Paginator->sort('content') ?></th>
                                <th><?= $this->Paginator->sort('post time') ?></th>
                                <th><?= $this->Paginator->sort('post user') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($forums as $forum): ?>
                            <tr>
                                <td><?= h($forum["title"]) ?></td>
                                <td><?= h($forum["content"]) ?></td>
                                <td><?= h($forum["postTime"]) ?></td>
                                <td><?= h($forum["user"]["user_fname"] . " " . $forum["user"]["user_lname"]) ?></td>
                                <td class="actions">
                                    
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'admindelete', $forum["id"]], ['class' => 'btn btn-danger','style'=>'color:white','confirm' => __('Are you sure you want to delete # {0}?', $forum["title"])]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
              