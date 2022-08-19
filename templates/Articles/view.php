<?php
///**
// * @var \App\View\AppView $this
// * @var \App\Model\Entity\Article $article
// */
//?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Post - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Page content-->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1"><?= h($article->title) ?></h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted on <?= h($article->timestamp) ?></div>
                </header>
                <!-- Preview image figure-->

                <h1 class="fw-bolder mb-1"><?= $this->Html->image($article->image, array('width'=>'75%', 'height'=>'75%')) ?></h1>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4"><?= h($article->body) ?></p>

                </section>
            </article>
        </div>
    </div>
</div>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>
