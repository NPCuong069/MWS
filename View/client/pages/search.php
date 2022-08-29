<section class="bg-accent section-space-less2">
    <div class="container">
        <figure class="text-center">
            <blockquote class="blockquote">
                <p>List of searched products</p>
            </blockquote>
        </figure>
                <div class="row">
                    <?php
                    foreach ($products
                             as $product) { ?>
                        <div class="col-sm-3">
                            <div class="thumb-wrapper">
                                <div class="card" style="width: 18rem;">
                                    <img src="../../../Public/client/img/products/<?= $product['productImage'] ?>"
                                         class="card-img-top" alt="..." style="max-height: 200px ">
                                    <div class="card-body" style="text-align: center">
                                        <h5 class="card-title"><?php echo $product["productName"] ?></h5>
                                        <p class="card-text">$<?php echo $product["productPrice"] ?></p>

                                        <form name="addToCart" method="POST">
                                            <input type="number" name="productPrice" value="<?= $product["productPrice"]?>" hidden/>
                                            <input type="text" name="productId" value="<?= $product["productId"]?>" hidden/>
                                            <input class="btn btn-primary" type="submit" name="addToCart" value="Add to cart" />
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } ?>
                </div>
    </div>

</section>