<div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.html">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
  </ol>

  <!-- Page Content -->
        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-users"></i>
                </div>
                <?php
                    $this->db->select('*', 'count(id)');
                    $this->db->from('daftar_akun');
                    $this->db->where('status', 'checked');
                    $queryactive = $this->db->get(); ?>
                <div class="mr-5"><?= $queryactive->num_rows(); ?> Account in Checked</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <?php
                    $this->db->select('*', 'count(id)');
                    $this->db->from('daftar_akun');
                    $this->db->where('status', 'unchecked');
                    $queryactive = $this->db->get(); ?>
                <div class="mr-5"><?= $queryactive->num_rows(); ?> Account Unchecked</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-user-times"></i>
                </div>
                <?php
                    $this->db->select('*', 'count(id)');
                    $this->db->from('daftar_akun_suspended');
                    $queryactive = $this->db->get(); ?>
                <div class="mr-5"><?= $queryactive->num_rows(); ?> Account Suspended</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
  <hr>
  <p>This is a great starting point for new custom pages.</p>

</div>
<!-- /.container-fluid -->