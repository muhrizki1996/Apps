<div id="content-wrapper">

    <div class="container-fluid">

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <?php if ($this->session->flashdata('flash')) : ?>
        <?php endif; ?>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><?= $subtitle; ?></li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                <?= $subtitle; ?></div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="dataTable_length"><a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addaccount">Add New</a>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="dataTable_filter" class="dataTables_filter"><label data-children-count="1">
                                        <form action="" method="post" class="">Search:<input type="search" class="form-control form-control-sm" placeholder="Search account.." name="keyword" aria-controls="dataTable"></form>
                                    </label></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php if (empty($account)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    There's no Account.
                                </div>
                            <?php endif; ?>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">STBID</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($account as $acnt) : ?>
                                        <tr>
                                            <th scope="row"><?= ++$start; ?></th>
                                            <td><?= $acnt['stbid']; ?></td>
                                            <td><?= $acnt['username']; ?></td>
                                            <td><?= $acnt['password']; ?></td>
                                            <td><?= $acnt['type']; ?></td>
                                            <td><button type="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button> <a href="<?= base_url(); ?>listaccountsuspended/hapus/<?= $acnt['id']; ?>" type="button" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-times"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                <?= $this->pagination->create_links(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
    <!-- /.container-fluid -->

    <!-- Modal -->
    <div class="modal fade" id="addaccount" tabindex="-1" role="dialog" aria-labelledby="addaccountTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addaccountTitle">Add Account Suspended</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('listaccountsuspended'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="stbid" name="stbid" placeholder="STBID">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" id="type" name="type">
                                <option>Select account Type...</option>
                                <option value="ZTE">ZTE</option>
                                <option value="FiberHome">FiberHome</option>
                                <option value="Huawei">Huawei</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>