<div class="content-wrapper" style="min-height: 353px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit product</h1>
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
                    <div class="form-group">
                        <label>Product name</label>
                        <input type="text" value="<?=$productOld['productName']?>" name="name" class="form-control" placeholder="Tên chuyên mục">
                    </div>
                    <div class="form-group">
                        <label>Product price</label>
                        <input type="text" value="<?=$productOld['productPrice']?>" name="price" class="form-control" placeholder="Tên chuyên mục">
                    </div>
                    <div class="form-group">
                        <label>Product quantity</label>
                        <input type="text" value="<?=$productOld['productQuantity']?>" name="quantity" class="form-control" placeholder="Tên chuyên mục">
                    </div>
                    <div class="form-group">
                        <label>Phone name</label>
<!--                        <select class="phone form-control" name="selectedPhones[]" multiple >-->
<!--                            --><?php
//                            foreach ($phones as $phone) {
//                                foreach ($selectedPhones as $selectedPhone) {
//                                    if($phone['phoneId']==$selectedPhone['phoneId']) {
//                                ?>
<!--                                <option value="--><?//=$phone['phoneId']?><!--" selected>--><?//=$phone['phoneName']?><!--</option>-->
<!--                            --><?php //} else {?>
<!--                            <option value="--><?//=$phone['phoneId']?><!--">--><?//=$phone['phoneName']?><!--</option>-->
<!--                                --><?php //}}} ?>
<!--                        </select>-->

                        <select class="phone form-control" name="selectedPhones[]" multiple >
                            <?php
                            foreach ($phones as $phone) { ?>
                                        <option value="<?=$phone['phoneId']?>" <?php
                                         foreach ($selectedPhones as $selectedPhone)
                                             if ($selectedPhone['phoneId']== $phone['phoneId']) {?>selected <?php } ?>><?=$phone['phoneName']?></option>
                                    <?php } ?>
                        </select>
                        <div class="form-group">
                            <label>Category name</label>
                            <select class="form-select" name="category" >
                                <?php
                                foreach ($categories as $category) {?>
                                    <option value="<?=$category['categoryId']?>" <?php if($category['categoryId']==$productOld['categoryId']){ ?> selected <?php } ?> ><?=$category['categoryName']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Product Image</label>
                            <input class="form-control" type="file" name="image" accept="image/*">
                            <img  width="100px" src="../../../../Public/client/img/products/<?=$productOld['productImage']?>">
                        </div>
                    </div>
                    <button type="submit" name="editProduct" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </section>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.phone').select2().val([1,2]);
    });

</script>