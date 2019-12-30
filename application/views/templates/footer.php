      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Muhammad Rizki <?php echo date("Y"); ?></span>
          </div>
        </div>
      </footer>

      </div>
      <!-- /.content-wrapper -->

      </div>
      <!-- /#wrapper -->

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

      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>

      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="<?= base_url(); ?>auth/logout">Logout</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Edit Account Modal JavaScript -->
      <script>
      $(document).ready(function () {
        $('.savebtn').on('click', function() {
          $('#editaccount<?= $acnt['id']; ?>').modal('show');
          $tr = $(this).closest('tr');
          var data = $tr.children("td").map(function (){
            return $(this).text();
          }).get();
          console.log(data);
        });
        $('#id').val(data[0]);
        $('#stbid').val(data[1]);
        $('#username').val(data[2]);
        $('#password').val(data[3]);
        $('#type').val(data[4]);
        $('#total_all_channel').val(data[5]);
        $('#channel_active').val(data[6]);
        $('#status').val(data[7]);
      });
      </script>

      <!-- Bootstrap core JavaScript-->
      <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
      <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Core plugin JavaScript-->
      <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="<?= base_url('assets/'); ?>js/sb-admin.min.js"></script>

      <!-- SweetAlert2 JavaScript -->
      <script src="<?= base_url('assets/'); ?>sweetalert/sweetalert2.all.min.js"></script>
      <script src="<?= base_url('assets/'); ?>sweetalert/myscript.js"></script>

      <!-- Custom JavaScript -->
      <script src="<?= base_url('assets/'); ?>js/custom.js"></script>

      </body>

      </html>