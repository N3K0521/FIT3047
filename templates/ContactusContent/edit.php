
                <div class="row">
                    <div class="col-xl">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Edit Contact Us Page</h5>
                            </div>
                            <div class="card-body">
                                <?= $this->Form->create($contactusContent) ?>
                                <div class="mb-3">
                                    <label class="form-label" for="title">Address</label>
                                    <?php echo $this->Form->control('address',['class'=>'form-control','label'=>false]); ?>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="body">Opening Hours</label>
                                    <?php echo $this->Form->control('openinghours',['class'=>'form-control','label'=>false]); ?>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="body">Email</label>
                                    <?php echo $this->Form->control('email',['class'=>'form-control','label'=>false]); ?>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="url">Phone Number</label>
                                    <?php echo $this->Form->control('phone',['class'=>'form-control','label'=>false]); ?>
                                </div>

                                <?= $this->Form->button('Submit',['class'=>'btn btn-primary']) ?>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>

                </div>

        