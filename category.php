<?php
include __DIR__ . '/vendor/autoload.php';
$category = new \Mlc\Oop\Category();
$blog = new \Mlc\Oop\Blog();

$allcat = $category->allactivecategory();

$blogid = base64_decode($_GET['catid']);
$result = $blog->ShowBlogPost($blogid);

require_once 'header.php';
?>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <?php while ($blogrow = mysqli_fetch_array($result)) { ?>
                <div class="card mb-4">
                    <a href="category.php"><img class="card-img-top" src="uploads/<?= $blogrow['photo'] ?>" style="width: 100%; height: 500px;" alt="Blog" ></a>
                    <div class="card-body">
                        <div class="small text-muted">Post Create Date: <?= date('D-M-Y',strtotime($blogrow['createtime'])) ?></div>
                        <h2 class="card-title"><?= $blogrow['title'] ?></h2>
                        <p class="card-text"><?= $blogrow['content'] ?></p>
                        <a class="btn btn-primary" href="#!">Read more →</a>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- Side widgets-->
        <?php require_once 'widget.php'; ?>

    </div>
</div>

<?php require_once 'footer.php'; ?>
