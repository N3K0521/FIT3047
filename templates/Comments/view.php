<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment $comment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Comment'), ['action' => 'edit', $comment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Comment'), ['action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Comments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Comment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="comments view content">
            <h3><?= h($comment->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Forum') ?></th>
                    <td><?= $comment->has('forum') ? $this->Html->link($comment->forum->title, ['controller' => 'Forums', 'action' => 'view', $comment->forum->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $comment->has('user') ? $this->Html->link($comment->user->user_id, ['controller' => 'Users', 'action' => 'view', $comment->user->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($comment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('PostTime') ?></th>
                    <td><?= h($comment->postTime) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
