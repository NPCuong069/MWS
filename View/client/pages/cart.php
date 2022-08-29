<div class="container-fluid d-flex justify-content-center">
    <div class="content-wrapper justify-content-center" style="min-height: 353px; max-width: 600px; width: 100%">
        <div class="content-header">
            <div class="container-fluid ">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="./?controller=home" class="m-0 text-dark">Get other products</a>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">
                        Your cart
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <?php foreach ($products as $product) { ?>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="../../../Public/client/img/products/<?= $product["productImage"] ?>"
                                     class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $product["productName"] ?></h5>
                                    <label>Number of products</label>
                                    <form name="changeNum" method="POST" class="row">
                                        <div class="col-3">
                                            <input type="text" name="productId" value="<?= $product["productId"] ?>"
                                                   hidden/>
                                            <input class="btn btn-primary" type="submit" name="minus" value="-1"/>
                                        </div>
                                        <input type="number" name="quantity_<?= $product["productId"] ?>"
                                               value="<?= $product["quantity"] ?>" class=" col-3" disabled/>
                                        <div class="col-3">
                                            <input type="number" name="productPrice"
                                                   value="<?= $product["productPrice"] ?>" hidden/>
                                            <input type="text" name="productId" value="<?= $product["productInCartId"] ?>"
                                                   hidden/>
                                            <input class="btn btn-primary" type="submit" name="plus" value="+1"/>
                                        </div>
                                    </form>
                                    <p class="card-text">Total:
                                        $<?= $product["productPrice"] * $product["quantity"] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
                <div>Total: $<?= $cart[0]["cartTotal"] ?></div>

                <form method="post">
                    <legend>Delevery informations</legend>
                    <div class="mb-3">
                        <label>Customer name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <label>Customer address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address">
                    </div>
                    <div class="mb-3">
                        <label>Customer phone</label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone number">
                    </div>

                    <button type="submit" name="order" class="btn btn-primary">Order</button>
                </form>
            </div>
        </section>
    </div>
</div>
