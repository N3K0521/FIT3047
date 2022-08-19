<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Forum $forum
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>


                    <div class="row">
                        <div class="col-xl">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Add New Forums</h5>
                                </div>
                                <div class="card-body">
                                <?= $this->Form->create($forum) ?>
                                    <div class="mb-3">
                                    <label class="form-label" for="title">Title</label>
                                    <?php echo $this->Form->control('title',['class'=>'form-control','label'=>false,'required'=>true]); ?>
                                    </div>
                                    <div class="mb-3">
                                    <label class="form-label" for="content">Content</label>
                                    <?php  echo $this->Form->textarea('content',['class'=>'form-control','label'=>false]); ?>
                                    
                                    </div>
                                    <?= $this->Html->link('Back',['action'=>'index'],['class'=>'btn btn-secondary']) ?>
                                    <?= $this->Form->button('Submit',['class'=>'btn btn-primary']) ?>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                        </div>
                
                    </div>

           


