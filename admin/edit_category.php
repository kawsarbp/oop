<?php
if(!isset($_SESSION))
{
    session_start();
}
include __DIR__.'/../vendor/autoload.php';
$category = new \Mlc\Oop\Category();

if(isset($_GET['editid']))
{
    $id = $_GET['editid'];
    $result = $category->SelectUpdateData($id);
    $row = mysqli_fetch_array($result);
}
$title = "Home";
require_once "includes/header.php";
?>

<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <section class="card">
                    <?php if(isset($_SESSION['cat_update'])) { ?>
                        <div class="alert alert-success alert-dismissible text-center fade show mb-0" role="alert">
                            <strong><?= $_SESSION['cat_update'] ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php unset($_SESSION['cat_update']); } ?>

                    <?php if(isset($_SESSION['cat_notupdate'])) { ?>
                        <div class="alert alert-warning alert-dismissible text-center fade show mb-0" role="alert">
                            <strong><?= $_SESSION['cat_notupdate'] ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php unset($_SESSION['cat_notupdate']); } ?>
                    <header class="card-header">Category Update Form</header>
                    <div class="card-body">
                        <form action="action.php" method="POST">
                            <div class="form-group row">
                                <label for="category_name" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="category_name" id="category_name" value="<?= $row['category_name'] ?>" placeholder="Category Name" required>
                                </div>
                            </div>

                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" <?= $row['status'] == 1 ?'checked':'' ?> id="Active" value="1" required>
                                            <label class="form-check-label" for="Active">
                                                Active
                                            </label>
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" <?= $row['status'] == 0 ?'checked':'' ?> id="Inactive" value="0" required>
                                            <label class="form-check-label" for="Inactive">
                                                Inactive
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary btn-sm" name="update_category">Update</button>
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
