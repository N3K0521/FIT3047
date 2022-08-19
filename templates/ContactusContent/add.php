<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactusContent $contactusContent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Contactus Content'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="contactusContent form content">
            <?= $this->Form->create($contactusContent) ?>
            <fieldset>
                <legend><?= __('Add Contactus Content') ?></legend>
                <?php
                    echo $this->Form->control('phone');
                    echo $this->Form->control('address');
                    echo $this->Form->control('email');
                    echo $this->Form->control('openinghours');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
