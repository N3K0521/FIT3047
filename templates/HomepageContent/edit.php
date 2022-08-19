<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HomepageContent $homepageContent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $homepageContent->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $homepageContent->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Homepage Content'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="homepageContent form content">
            <?= $this->Form->create($homepageContent) ?>
            <fieldset>
                <legend><?= __('Edit Homepage Content') ?></legend>
                <?php
                    echo $this->Form->control('title1');
                    echo $this->Form->control('paragraph1');
                    echo $this->Form->control('image1');
                    echo $this->Form->control('title2');
                    echo $this->Form->control('paragraph2');
                    echo $this->Form->control('image2');
                    echo $this->Form->control('title3');
                    echo $this->Form->control('paragraph3');
                    echo $this->Form->control('title4');
                    echo $this->Form->control('paragraph4');
                    echo $this->Form->control('image3');
                    echo $this->Form->control('name1');
                    echo $this->Form->control('usertype1');
                    echo $this->Form->control('userdes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
