<div class="content-wrapper" style="min-height: 353px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add product</h1>
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
            <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <?php
                    if (isset($alert['success'])) {?>
                        <div class="form-group alert alert-primary">
                            <?=$alert['success']?>
                        </div>
                    <?php }
                    ?>
                    <div class="form-group">
                        <label>Product name</label>
                        <input type="text" name="name" class="form-control" placeholder="Product name">
                    </div>
                    <div class="form-group">
                        <label>Product price</label>
                        <input type="text" name="price" class="form-control" placeholder="Product Price">
                    </div>
                    <div class="form-group">
                        <label>Product Quantity</label>
                        <input type="text" name="quantity" class="form-control" placeholder="Product Quantity">
                    </div>
                    <div class="form-group">
                        <label>Product Image</label>
                        <input class="form-control" type="file" name="image" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label>Phone name</label>
                        <select class="phone form-control" name="selectedPhones[]" multiple >
                            <?php
                            foreach ($phones as $phone) {?>
                                <option value="<?=$phone['phoneId']?>"><?=$phone['phoneName']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category name</label>
                        <select class="form-select" name="category" >
                            <?php
                            foreach ($categories as $category) {?>
                                <option value="<?=$category['categoryId']?>"><?=$category['categoryName']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" name="addProduct" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </section>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.phone').select2();
    });
</script>
