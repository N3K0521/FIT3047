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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $forumContent->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $forumContent->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Forum Content'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="forumContent form content">
            <?= $this->Form->create($forumContent) ?>
            <fieldset>
                <legend><?= __('Edit Forum Content') ?></legend>
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
