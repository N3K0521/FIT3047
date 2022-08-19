
                <h3>Pending approval</h3>
                <?= $this->Flash->render() ?>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php echo $isActive == 'forum' ? 'active' : '' ?>" id="Forums-tab" data-bs-toggle="pill" data-bs-target="#Forums" type="button" role="tab" aria-controls="Forums" aria-selected="true">Forums<span class="unread"><?php echo $allUnApprovedForum ?></span></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php echo $isActive == 'comment' ? 'active' : '' ?>" id="Comments-tab" data-bs-toggle="pill" data-bs-target="#Comments" type="button" role="tab" aria-controls="Comments" aria-selected="false">Comments<span class="unread"><?php echo $allUnApprovedComments ?></span></button>
                    </li>

                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show <?php echo $isActive == 'forum' ? 'active' : '' ?>" id="Forums" role="tabpanel" aria-labelledby="Forums-tab">
                        <table class="table table-hover table-bordered ">
                            <thead>
                                <tr>
                                    <th>TITIE</th>
                                    <th>CONTENT</th>
                                    <th>POSTTIME</th>
                                    <th>post user</th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($forums as $forum) : ?>
                                    <tr>
                                        <td><?= h($forum["title"]) ?></td>
                                        <td><?= h($forum["content"]) ?></td>
                                        <td><?= h($forum["postTime"]) ?></td>
                                        <td><?= h($forum["user"]["user_fname"] . " " . $forum["user"]["user_lname"]) ?></td>
                                        <td class="actions">
                                            <?= $this->Form->postLink(__('Approve'), ['action' => 'approveforum', $forum["id"]], ['class' => 'btn btn-info', 'style' => 'color:white']) ?>
                                            <?= $this->Form->postLink(__('Reject'), ['action' => 'rejectforum', $forum["id"]], ['class' => 'btn btn-danger', 'style' => 'color:white']) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade show <?php echo $isActive == 'comment' ? 'active' : '' ?>" id="Comments" role="tabpanel" aria-labelledby="Comments-tab">
                        <table class="table table-hover table-bordered ">
                            <thead>
                                <tr>
                                    <th>FORUM TITIE</th>
                                    <th>COMMENT</th>
                                    <th>POSTTIME</th>
                                    <th>COMMENT post user</th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($comments as $comment) : ?>
                                    <tr>
                                        <td><?= h($comment["forum"]["title"]) ?></td>
                                        <td><?= h($comment["comments"]) ?></td>
                                        <td><?= h($comment["postTime"]) ?></td>
                                        <td><?= h($comment["user"]["user_fname"] . " " . $comment["user"]["user_lname"]) ?></td>
                                        <td class="actions">
                                            <?= $this->Form->postLink(__('Approve'), ['action' => 'approvecomment', $comment["id"]], ['class' => 'btn btn-info', 'style' => 'color:white']) ?>
                                            <?= $this->Form->postLink(__('Reject'), ['action' => 'rejectcomment', $comment["id"]], ['class' => 'btn btn-danger', 'style' => 'color:white']) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
          