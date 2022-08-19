<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>

                    <div class="row">
                        <div class="col-xl">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Add New Article</h5>
                                </div>
                                <div class="card-body">
                                    <?= $this->Form->create($article, ["type"=>"file"]) ?>
                                    <div class="mb-3">
                                        <label class="form-label" for="title">Title</label>
                                        <?php echo $this->Form->control('title',['class'=>'form-control','label'=>false]); ?>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="body">Body</label>
                                        <?php echo $this->Form->control('body',['class'=>'form-control','label'=>false]); ?>
                                    </div>
                                    <div class="mb-3">
                                        <?php echo $this->Form->control('redirect'); ?>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="url">Url</label>
                                        <?php echo $this->Form->control('url',['class'=>'form-control','label'=>false]); ?>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="image_file">Image File</label>
                                        <?php echo $this->Form->control('image_file',['type'=>'file','class'=>'form-control','label'=>false]); ?>
                                    </div>


                                    <?= $this->Form->button('Submit',['class'=>'btn btn-primary']) ?>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                        </div>

                    </div>

        