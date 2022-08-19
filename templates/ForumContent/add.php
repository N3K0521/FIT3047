<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HomepageContent $homepageContent
 */
?>

            <?= $this->Flash->render() ?>
                <?= $this->Form->create($forumContent, ['type' => 'file']) ?>
                <h3>Edit forum content</h3>
                <label>Title</label>
                <?php echo $this->Form->control('title1', ['class' => 'form-control', 'label' => false, 'required' => true]); ?>
                <br>
                <label>Paragraph</label>
                <?php echo $this->Form->textarea('paragraph1', ['class' => 'form-control', 'required' => true]); ?>
                
                <?= $this->Form->button('Submit', ['class' => 'btn btn-primary','style'=>'float:right;margin-top:10px']) ?>
                <?= $this->Form->end() ?>
         