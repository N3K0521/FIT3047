<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ForumContent[]|\Cake\Collection\CollectionInterface $forumContent
 */
?>
<div class="forumContent index content">
    <?= $this->Html->link(__('New Forum Content'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Forum Content') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title1') ?></th>
                    <th><?= $this->Paginator->sort('paragraph1') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($forumContent as $forumContent): ?>
                <tr>
                    <td><?= $this->Number->format($forumContent->id) ?></td>
                    <td><?= h($forumContent->title1) ?></td>
                    <td><?= h($forumContent->paragraph1) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $forumContent->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $forumContent->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $forumContent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forumContent->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
