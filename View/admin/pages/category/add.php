<div class="content-wrapper" style="min-height: 353px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add phone</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Chuyên mục</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <form method="post">
                <div class="card-body">
                    <?php
                    if (isset($alert['success'])) {?>
                        <div class="form-group alert alert-primary">
                            <?=$alert['success']?>
                        </div>
                    <?php }
                    ?>
                    <div class="form-group">
                        <label>Category name</label>
                        <input type="text" name="name" class="form-control" placeholder="Category name">
                    </div>
                    <button type="submit" name="addCategory" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </section>
</div>