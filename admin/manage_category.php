<?php
ob_start();
if(!isset($_SESSION))
{
    session_start();
}
include __DIR__ . '/../vendor/autoload.php';
$category = new \Mlc\Oop\Category();
$categories = $category->allcategory();

$title = "Home";
require_once "includes/header.php";
?>

<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-sm-12">
                <section class="card">
                    <header class="card-header"> All Categories </header>
                    <div class="card-body">
                        <div class="adv-table">
                            <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline" role="grid">

                                <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 190.312px;">Sl</th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 257.422px;">Category Name</th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 233.062px;">Status</th>
                                        <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 162.219px;">Action</th>

                                    </tr>
                                    </thead>

                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                    <?php

                                    $sn = 1;
                                    while ($row = mysqli_fetch_array($categories))
                                    { ?>
                                        <tr class="gradeA odd">
                                            <td><?= $sn; ?></td>
                                            <td><?= $row['category_name'] ?></td>
                                            <td>
                                                <?php
                                                if($row['status'] == 1) { ?>
                                                    <a href="status.php?inactive=<?= base64_encode($row['id']) ?>" class="btn btn-success btn-sm"><i class="fa fa-arrow-up"></i> Active</a>
                                                <?php }
                                                else { ?>
                                                    <a href="status.php?active=<?= base64_encode($row['id']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-down"></i> Inactive</a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="edit_category.php?editid=<?= $row['id'] ?>" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="delete.php?delete=<?= base64_encode($row['id']) ?>&cat=cat" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php $sn++; } ?>

                                    </tbody>
                                </table>
                                <div class="row-fluid">
                                    <div class="span6">
                                        <div class="dataTables_info" id="dynamic-table_info">Showing 1 to 10 of 57 entries</div>
                                    </div>
                                    <div class="span6">
                                        <div class="dataTables_paginate paging_bootstrap pagination">
                                            <ul>
                                                <li class="prev disabled"><a href="#">← Previous</a></li>
                                                <li class="active"><a href="#">1</a></li><li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">5</a></li>
                                                <li class="next"><a href="#">Next → </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<?php
require_once "includes/footer.php";
?>
