<?php
if(!isset($_SESSION))
{
    session_start();
}
include __DIR__.'/../vendor/autoload.php';
$category = new \Mlc\Oop\Category();
$blog = new \Mlc\Oop\Blog();
$actvecat = $category->allactivecategory();

if(isset($_GET['id']))
{
    $blogid = base64_decode($_GET['id']);
    $selectblog = $blog->selectBlog($blogid);
    $row1 = mysqli_fetch_array($selectblog);
}

$title = "Home";
require_once "includes/header.php";
?>

<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <section class="card">
                    <?php if(isset($_SESSION['blog_update'])) { ?>
                        <div class="alert alert-success alert-dismissible text-center fade show mb-0" role="alert">
                            <strong><?= $_SESSION['blog_update'] ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php unset($_SESSION['blog_update']); } ?>

                    <?php if(isset($_SESSION['blog_notupdate'])) { ?>
                        <div class="alert alert-warning alert-dismissible text-center fade show mb-0" role="alert">
                            <strong><?= $_SESSION['blog_notupdate'] ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php unset($_SESSION['blog_notupdate']); } ?>
                    <header class="card-header">Blog Update Form</header>
                    <div class="card-body">
                        <form action="action.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="cat_id" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select name="cat_id" id="cat_id" class="form-control" required>
                                        <option value="">Select Category</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($actvecat)) { ?>
                                            <option <?= $row['id'] == $row1['cat_id'] ? 'selected':'' ?> value="<?= $row['id'] ?>"><?= $row['category_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Title" name="title" class="form-control" id="title" required value="<?= $row1['title'] ?>" >
                                    <input type="hidden" name="id" value="<?= $row1['id'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Content" class="col-sm-2 col-form-label">Content</label>
                                <div class="col-sm-10">
                                    <textarea name="content" id="Content" class="summernote" cols="30" rows="10" required><?= $row1['content'] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                                <div class="col-sm-10">
                                    <input type="file" name="photo" class="form-control" id="photo">
                                    <img src="../uploads/<?= $row1['photo'] ?>" style="width: 150px; height:100px;" alt="IMG">
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="Active" value="1" required <?= $row1['status'] == 1 ?'checked':'' ?> >
                                            <label class="form-check-label" for="Active">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="Inactive" value="0" required <?= $row1['status'] == 0 ?'checked':'' ?>>
                                            <label class="form-check-label" for="Inactive">
                                                Inactive
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary btn-sm" name="update_blog">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<?php
require_once "includes/footer.php";
?>
