<style>
    .forum-content{
        margin: 10px 0px;
        height:300px;
        overflow-y: scroll;
    }
    .comment-item-box{
        display: flex;
    }
    .comment-item-box .user{
        display: flex;
        flex-direction:column;
        text-align: center;
        width:150px;
    }
    .comment-item-box .user .bx-user-circle{
        font-size: 30px;
    }

    .comment-item-box .comments{
        width:100%;
    
    }
    .comment-item-box .comments-show{
        width:100%;
       
    }
</style>

<h3 style="margin-top:20px;">Forums</h3>

<?= $this->Flash->render() ?>
<div class="card" style="margin-bottom: 20px;">
    <div class="card-body">
        <?php foreach ($forums as $forum): ?>
        <h2 class="card-title"><?=  $forum["title"]; ?></h2>
        <div class="card-text" style="font-size: 10px;color:gray">
            <?= $forum["postTime"]." posted by ".$forum["user"]["user_fname"]." ".$forum["user"]["user_lname"]  ?>
            <div class="forum-content">
                <p style="font-size:25px ;"><?= $forum["content"]; ?></p>
            </div>
            <hr>
            <h3 style="margin-top:20px;">Comments</h3>
            <div class="comment-outer-box">
                <?php foreach ($allComments as $comment): ?>
                <div class="comment-item-box">
                    <div class="user">
                    <i class="bx bx-user-circle"></i>
                    <span> <?= $comment["user"]["user_fname"]." ".$comment["user"]["user_lname"]  ?></span>
                    </div>
                    <div class="comments-show">
                        <p>Commented at <?= $comment["postTime"]; ?></p>
                        <p style="font-size:25px ;"><?= $comment["comments"]; ?></p>
                    </div>
                </div>
                <hr>
                <?php endforeach; ?>
            </div>
            
            <h3 style="margin-top:20px;">Leave a comment</h3>
            <div class="comment-item-box">
                    <div class="user">
                    <i class="bx bx-user-circle"></i>
                    <?php if($this->request->getSession()->read('Auth')) { ?>
                    <span> <?= $this->request->getSession()->read('Auth')["User"]["user_fname"]." ".$this->request->getSession()->read('Auth')["User"]["user_lname"]  ?></span>
                    <?php } ?>
                </div>
                    <div class="comments">
                    <?= $this->Form->create(null) ?>
                    <?php  echo $this->Form->textarea('comments',['class'=>'form-control','label'=>false]); ?>
                    <?= $this->Form->button('Submit',['class'=>'btn btn-primary','style'=>'float:right;margin-top:20px']) ?>
                    <?= $this->Form->end() ?>
                    </div>
                </div>
        </div>
        <?php endforeach; ?>
       
    </div>
</div>
