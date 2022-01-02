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
            <?php
            if(isset($_GET['search']))
            {
                $searchtext = $_GET['search'];
                $search = $blog->SearchPost($searchtext);
                if(mysqli_num_rows($search) > 0)
                {

                while ($row1 = mysqli_fetch_array($search))
                {
                    ?>
                    <div class="card mb-4">
                        <a href="post.php?postid=<?= base64_encode($row1['id']); ?>"><img class="card-img-top" src="uploads/<?= $row1['photo'] ?>" alt="Photo" style="width:100%; height:400px;"></a>
                        <div class="card-body">
                            <div class="small text-muted">Post Create Date: <?= date('D-M-Y',strtotime($row1['createtime'])) ?></div>
                            <h2 class="card-title"><?= $row1['title'] ?></h2>
                            <div class="card-text">Posted By: <?= $row1['name'] ?></div>
                            <p class="card-text"><?= substr($row1['content'], 0, 250) ?>.....</p>

                            <a class="btn btn-primary" href="post.php?postid=<?= base64_encode($row1['id']); ?>">Read more →</a>
                        </div>
                    </div>
                    <?php
                }
                }else
                    {
                        echo '<h2 class="text-center text-danger">Data Not Found!</h2>';
                    }
            }
            else
            {
                ?>
                <?php while ($activeBlg = mysqli_fetch_array($activeblog)) { ?>
                <div class="card mb-4">
                    <a href="post.php?postid=<?= base64_encode($activeBlg['id']); ?>"><img class="card-img-top" src="uploads/<?= $activeBlg['photo'] ?>" alt="Photo" style="width:100%; height:400px;"></a>
                    <div class="card-body">
                        <div class="small text-muted">Post Create Date: <?= date('D-M-Y',strtotime($activeBlg['createtime'])) ?></div>
                        <h2 class="card-title"><?= $activeBlg['title'] ?></h2>
                        <div class="card-text">Posted By: <?= $activeBlg['name'] ?></div>
                        <p class="card-text"><?= substr($activeBlg['content'], 0, 250) ?>.....</p>

                        <a class="btn btn-primary" href="post.php?postid=<?= base64_encode($activeBlg['id']); ?>">Read more →</a>
                    </div>
                </div>
            <?php } ?>
            <?php
            }
            ?>

        </div>

        <!-- Side widgets-->
        <?php require_once 'widget.php'; ?>

    </div>
</div>

<?php require_once 'footer.php'; ?>
