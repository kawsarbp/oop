<?php
include __DIR__ . '/vendor/autoload.php';
$blog = new \Mlc\Oop\Blog();
$category = new \Mlc\Oop\Category();

$allcat = $category->allactivecategory();

$bid = base64_decode($_GET['postid']);
$singlepost = $blog->selectBlog($bid);
$siglerow = mysqli_fetch_array($singlepost);

require_once 'header.php';
?>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href="javascript:void(o)"><img class="card-img-top" src="uploads/<?= $siglerow['photo'] ?>" alt="Photo" style="width:100%; height:500px;"></a>
                <div class="card-body">
                    <div class="small text-muted">Post Create Date: <?= date('D-M-Y',strtotime($siglerow['createtime'])) ?></div>
                    <h2 class="card-title"><?= $siglerow['title'] ?></h2>
                    <div class="card-text">Posted By: <?= $siglerow['name'] ?></div>
                    <p class="card-text"><?= $siglerow['content'] ?></p>
                </div>
            </div>
        </div>
        <!-- Side widgets-->
        <?php require_once 'widget.php'; ?>
    </div>
</div>

<?php require_once 'footer.php'; ?>
