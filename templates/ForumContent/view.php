<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ForumContent $forumContent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Forum Content'), ['action' => 'edit', $forumContent->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Forum Content'), ['action' => 'delete', $forumContent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forumContent->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Forum Content'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Forum Content'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="forumContent view content">
            <h3><?= h($forumContent->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title1') ?></th>
                    <td><?= h($forumContent->title1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Paragraph1') ?></th>
                    <td><?= h($forumContent->paragraph1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($forumContent->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
