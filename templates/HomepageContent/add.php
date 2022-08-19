<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HomepageContent $homepageContent
 */
?>

            <?= $this->Flash->render() ?>
                <?= $this->Form->create($homeContent, ['type' => 'file']) ?>
                <h3>Edit homepage content</h3>
                <header class="py-5" style="padding-top:0px !important">
                    <div class="container px-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-xxl-6">
                                <div class="text-center my-5">

                                    <h1 class="fw-bolder mb-3"> <?php echo $this->Form->control('title1', ['class' => 'form-control', 'label' => false, 'required' => true]); ?></h1>
                                    <p class="lead fw-normal text-muted mb-4"> <?php echo $this->Form->textarea('paragraph1', ['class' => 'form-control', 'label' => false, 'required' => true]); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <section class="py-5 bg-light" id="scroll-target">
                    <div class="container px-5 my-5">
                        <div class="row gx-5 align-items-center">
                            <div class="col-lg-6">
                                <?php if (!$homeContent->image1) { ?>
                                    <img class="img-fluid rounded mb-5 mb-lg-0" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." />
                                <?php } else {
                                    echo $this->Html->image('homepage/' . $homeContent->image1,['class'=>'img-fluid rounded mb-5 mb-lg-0']);
                                } ?>

                                <?= $this->Form->control('image1', ['type' => 'file', 'label' => false, 'class' => 'form-control-file', 'style' => 'margin-top:10px']); ?>
                            </div>
                            <div class="col-lg-6">
                                <h2 class="fw-bolder"><?php echo $this->Form->control('title2', ['class' => 'form-control', 'label' => false, 'required' => true]); ?></h2>
                                <p class="lead fw-normal text-muted mb-0"><?php echo $this->Form->textarea('paragraph2', ['class' => 'form-control', 'label' => false, 'required' => true]); ?></p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="py-5">
                    <div class="container px-5 my-5">
                        <div class="row gx-5 align-items-center">
                            <div class="col-lg-6 order-first order-lg-last">
                                <?php if (!$homeContent->image2) { ?>
                                    <img class="img-fluid rounded mb-5 mb-lg-0" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." />
                                <?php } else {
                                    echo $this->Html->image('homepage/' . $homeContent->image2,['class'=>'img-fluid rounded mb-5 mb-lg-0']);
                                } ?>
                                <?= $this->Form->control('image2', ['type' => 'file', 'label' => false, 'class' => 'form-control-file', 'style' => 'margin-top:10px']); ?>
                            </div>
                            <div class="col-lg-6">
                                <h2 class="fw-bolder"><?php echo $this->Form->control('title3', ['class' => 'form-control', 'label' => false, 'required' => true]); ?></h2>
                                <p class="lead fw-normal text-muted mb-0"><?php echo $this->Form->textarea('paragraph3', ['class' => 'form-control', 'label' => false, 'required' => true]); ?></p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="py-5 bg-light">
                    <div class="container px-5 my-5">
                        <div class="text-center" style="width: 50%;margin-left:25%">
                            <h2 class="fw-bolder"><?php echo $this->Form->control('title4', ['class' => 'form-control', 'label' => false, 'required' => true]); ?></h2>
                            <p class="lead fw-normal text-muted mb-5"><?php echo $this->Form->textarea('paragraph4', ['class' => 'form-control', 'label' => false, 'required' => true]); ?></p>
                        </div>
                        <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                            <div class="col mb-5 mb-5 mb-xl-0">
                                <div class="text-center">
                                    <?php if (!$homeContent->image3) { ?>
                                        <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                                    <?php } else {
                                        echo $this->Html->image('homepage/' . $homeContent->image3,['class'=>'img-fluid rounded-circle mb-4 px-4']);
                                    } ?>
                                    <?= $this->Form->control('image3', ['type' => 'file', 'label' => false, 'class' => 'form-control-file', 'style' => 'margin-bottom:10px']); ?>
                                    <h5 class="fw-bolder"><?php echo $this->Form->control('name1', ['class' => 'form-control', 'label' => false, 'required' => true]); ?></h5>
                                    <div class="fst-italic text-muted"><?php echo $this->Form->control('usertype1', ['class' => 'form-control', 'label' => false, 'required' => true]); ?></div>
                                    <br>
                                    <p class="lead fw-normal text-muted mb-0"><?php echo $this->Form->textarea('userdes', ['class' => 'form-control', 'label' => false, 'required' => true]); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?= $this->Form->button('Submit', ['class' => 'btn btn-primary','style'=>'float:right;margin-top:10px']) ?>
                <?= $this->Form->end() ?>
            