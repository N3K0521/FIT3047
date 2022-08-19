<?php use Cake\Datasource\ConnectionManager; ?>
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder"><?php echo $forumContent["title1"]; ?></h1>
            <p class="lead mb-0"><?php echo $forumContent["paragraph1"]; ?></p>
        </div>
    </div>
</header>
<table class="table table-hover">
    <tr>
        <td>Title</td>
        <td>Replies</td>
        <td>Author</td>
        <td>Created On</td>
        <td></td>
    </tr>
    <?php 
     $connection = ConnectionManager::get('default');
    foreach ($forums as $forum):
         
          $numComment_sql=" select count(*) from comments c where c.forum_id=".$forum["id"]." and c.approved=1;";
         $numComment = $connection->execute($numComment_sql)->fetchAll('assoc')[0]["count(*)"];
   
        ?>
        <tr>
            <td><?= $forum["title"]; ?></td>
            <td><?= $numComment; ?></td>
            <td><?= $forum["user"]["user_fname"]." ".$forum["user"]["user_lname"]  ?></td>
            <td><?= $forum["postTime"]; ?></td>
            <td>  <?= $this->Html->link('Read more',['controller'=>'Forums','action'=>'detail',$forum["id"]],['class'=>'btn btn-primary']); ?></td>
        </tr>

    <?php endforeach; ?>
</table>
