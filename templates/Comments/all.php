
                <h3>All Approved Comments</h3>
                <?= $this->Flash->render() ?>

                <table class="table table-hover table-bordered ">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('Forum title') ?></th>
                            <th><?= $this->Paginator->sort('comment') ?></th>
                            <th><?= $this->Paginator->sort('post time') ?></th>
                            <th><?= $this->Paginator->sort('comment post user') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($comments as $comment) : ?>
                            <tr>
                                <td><?= h($comment["forum"]["title"]) ?></td>
                                <td><?= h($comment["comments"]) ?></td>
                                <td><?= h($comment["postTime"]) ?></td>
                                <td><?= h($comment["user"]["user_fname"] . " " . $comment["user"]["user_lname"]) ?></td>
                                <td class="actions">

                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'admindelete', $comment["id"]], ['class' => 'btn btn-danger', 'style' => 'color:white', 'confirm' => __('Are you sure you want to delete # {0}?', $comment["title"])]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        