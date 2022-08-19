<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticleContent $articleContent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Article Content'), ['action' => 'edit', $articleContent->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Article Content'), ['action' => 'delete', $articleContent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articleContent->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Article Content'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Article Content'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="articleContent view content">
            <h3><?= h($articleContent->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title1') ?></th>
                    <td><?= h($articleContent->title1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Paragraph1') ?></th>
                    <td><?= h($articleContent->paragraph1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($articleContent->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
