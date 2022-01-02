<?php
include __DIR__ . '/vendor/autoload.php';
$category = new \Mlc\Oop\Category();
$blog = new \Mlc\Oop\Blog();

$allcat = $category->allactivecategory();
$activeblog = $blog->activeblog();

require_once 'header.php';
?>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->

        <div class="col-lg-8">
            <?php while ($activeBlg = mysqli_fetch_array($activeblog)) { ?>
            <div class="card mb-4">
                <a href="post.php?postid=<?= base64_encode($activeBlg['id']); ?>"><img class="card-img-top" src="uploads/<?= $activeBlg['photo'] ?>" alt="Photo" style="width:100%; height:500px;"></a>
                <div class="card-body">
                    <div class="small text-muted">Post Create Date: <?= date('D-M-Y',strtotime($activeBlg['createtime'])) ?></div>
                    <h2 class="card-title"><?= $activeBlg['title'] ?></h2>
                    <div class="card-text">Posted By: <?= $activeBlg['name'] ?></div>
                    <p class="card-text"><?= substr($activeBlg['content'], 0, 250) ?>.....</p>

                    <a class="btn btn-primary" href="post.php?postid=<?= base64_encode($activeBlg['id']); ?>">Read more →</a>
                </div>
            </div>
                <?php } ?>
        </div>

        <!-- Side widgets-->
        <?php require_once 'widget.php'; ?>

    </div>
</div>

<?php require_once 'footer.php'; ?>
