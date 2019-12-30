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
                                        <th scope="col">Total All Channel</th>
                                        <th scope="col">Channel Active</th>
                                        <th scope="col">Status</th>
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
                                            <td><?= $acnt['total_all_channel']; ?></td>
                                            <td><?= $acnt['channel_active']; ?></td>
                                            <td><?= $acnt['status']; ?></td>
                                            <td><a type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editaccount<?= $acnt['id']; ?>"><i class="fas fa-edit"></i></a> <a href="<?= base_url(); ?>listaccount/hapus/<?= $acnt['id']; ?>" type="button" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-times"></i></a></td>
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
                    <h5 class="modal-title" id="addaccountTitle">Add Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('listaccount'); ?>" method="post">
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
                        <div class="form-group">
                            <input type="text" class="form-control" id="total_all_channel" name="total_all_channel" placeholder="Total All Channel" value="304" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="channel_active" name="channel_active" placeholder="Channel Active">
                        </div>
                        <div class="form-group">
                            <label for="type">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option>Select status...</option>
                                <option value="Checked">Checked</option>
                                <option value="Unchecked">Unchecked</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Account -->
    <div class="modal fade" id="editaccount<?= $account['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editaccount<?= $account['id']; ?>Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editaccount<?= $account['id']; ?>Title">Edit Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('listaccount'); ?>/ubah/<?= $account['id']; ?>" method="post">
                    <div class="modal-body">
                        <div class="input-group input-group-sm mb-3">
                            <input type="hidden" name="id" id="id" value="<?= $account['id']; ?>">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">STBID</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="stbid" name="stbid" value="<?= $account['stbid']; ?>">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Username</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="username" name="username" value="<?= $account['username']; ?>">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Password</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="password" name="password" value="<?= $account['password']; ?>">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Type</span>
                            </div>
                            <select class="form-control form-control-sm" id="type" name="type">
                                <option>Select account Type...</option>
                                <option value="ZTE" <?php if ($account['type'] == 'ZTE') : ?>selected<?php else : ?><?php endif; ?>>ZTE</option>
                                <option value="FiberHome" <?php if ($account['type'] == 'Fiberhome') : ?>selected<?php else : ?><?php endif; ?>>FiberHome</option>
                                <option value="Huawei" <?php if ($account['type'] == 'Huawei') : ?>selected<?php else : ?><?php endif; ?>>Huawei</option>
                            </select>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Total All Channel</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="total_all_channel" name="total_all_channel" placeholder="Total All Channel" value="304" readonly>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Channel Active</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="channel_active" name="channel_active" value="<?= $account['channel_active']; ?>">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Status</span>
                            </div>
                            <select class="form-control form-control-sm" id="status" name="status">
                                <option>Select status...</option>
                                <option value="Checked" <?php if ($account['type'] == 'Checked') : ?>selected<?php else : ?><?php endif; ?>>Checked</option>
                                <option value="Unchecked" <?php if ($account['type'] == 'Unchecked') : ?>selected<?php else : ?><?php endif; ?>>Unchecked</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="ubah" class="btn btn-primary savebtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>