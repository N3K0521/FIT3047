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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $articleContent->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $articleContent->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Article Content'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="articleContent form content">
            <?= $this->Form->create($articleContent) ?>
            <fieldset>
                <legend><?= __('Edit Article Content') ?></legend>
                <?php
                    echo $this->Form->control('title1');
                    echo $this->Form->control('paragraph1');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
