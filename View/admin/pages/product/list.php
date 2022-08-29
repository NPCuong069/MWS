<div class="content-wrapper" style="min-height: 1203.6px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách chuyên mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách chuyên mục</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"></div>
                            <div class="col-sm-12 col-md-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                       aria-describedby="example2_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending">Product
                                            name
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending">Price
                                        </th>
                                        <th style="text-align: center;" class="sorting" tabindex="0"
                                            aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending">Quantity
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending">Image
                                        </th>
                                        <th style="text-align: center;" class="sorting" tabindex="0"
                                            aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending">Edit
                                        </th>
                                        <th style="text-align: center;" class="sorting" tabindex="0"
                                            aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending">Delete
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    foreach ($products as $product) { ?>
                                        <tr role="row" class="odd">
                                            <td><?= $product['productName'] ?></td>
                                            <td><?= $product['productPrice'] ?></td>
                                            <td><?= $product['productQuantity'] ?></td>
                                            <td><img width="100px"
                                                     src="../../../../Public/client/img/products/<?= $product['productImage'] ?>">
                                            </td>
                                            <td style="text-align: center;">
                                                        <span class="badge bg-primary">
                                                            <a href="?controller=editProduct&productId=<?= $product['productId'] ?>">
                                                                <ion-icon name="create-outline"></ion-icon>
                                                            </a>
                                                        </span>

                                            </td>

                                            <td style="text-align: center;">
                                                        <span class="badge bg-danger">
                                                            <a href="?controller=deleteProduct&productId=<?= $product['productId'] ?>">
                                                                <ion-icon name="trash-outline"></ion-icon>
                                                            </a>
                                                        </span>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                <?php for ($page = 1; $page <= $numOfPage; $page++) {
                                    echo '<li class="page-item"> <a class="page-link" href = "?controller=listProduct&page=' . $page . '">' . $page . ' </a></li>';
                                } ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
</div>