<div id="wrapper">

<!-- Sidebar -->
<ul class="sidebar navbar-nav">
<?php if ($subtitle == 'Dashboard') : ?>
  <li class="nav-item active">
  <?php else : ?>
  <li class="nav-item">
  <?php endif; ?>
    <a class="nav-link" href="<?=base_url();?>dashboard">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <?php if ($subtitle == 'List Account') : ?>
  <li class="nav-item active">
  <?php else : ?>
  <li class="nav-item">
  <?php endif; ?>
    <a class="nav-link" href="<?=base_url();?>listaccount">
      <i class="fas fa-fw fa-users"></i>
      <span>List Account</span></a>
  </li>
  <?php if ($subtitle == 'List Account Suspended') : ?>
  <li class="nav-item active">
  <?php else : ?>
  <li class="nav-item">
  <?php endif; ?>
    <a class="nav-link" href="<?=base_url();?>listaccountsuspended">
      <i class="fas fa-fw fa-user-times"></i>
      <span>List Account Suspended</span></a>
  </li>
</ul>