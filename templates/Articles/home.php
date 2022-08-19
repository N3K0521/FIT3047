
<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder"><?php echo $articleContent["title1"]; ?></h1>
            <p class="lead mb-0"><?php echo $articleContent["paragraph1"]; ?></p>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Display all articles created-->
        <?php foreach ($articles as $article): ?>
        <div class="col-lg-4 mb-3 d-flex align-items-stretch">
            <!-- Article post-->
            <div class="card mb-4">
                <div class="card-body d-flex flex-column">
                    <h2 class="card-title h4"><?= h($article->title) ?></h2>
                    <div class="small text-muted"><?= h($article->timestamp) ?></div>
                    <a href="#!"><?= $this->Html->image($article->image, array('width'=>'75%', 'height'=>'75%')) ?></a>
                    <p class="card-text mb-4 "><?= $this->Text->truncate($article->body, 400) ?></p>
                    <!-- Redirect to external page if redirect option is selected or go to inbuilt page-->
                    <?php if($article->redirect) : ?>
                        <?= $this->Html->link(__('Read more →'), $article->url,
                            ['class' => 'btn btn-primary mt-auto align-self-start','style'=>'color:white',
                                'target' => '_blank']) ?>
                    <?php else : ?>
                        <?= $this->Html->link(__('Read more →'), ['action' => 'view', $article->article_id],
                            ['class' => 'btn btn-primary mt-auto align-self-start','style'=>'color:white']) ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>




