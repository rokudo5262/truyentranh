<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand text-white" href="<?php echo base_url();?>main/trangchu">Truyện Tranh</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" id="navbardrop" data-toggle="dropdown">
        Thể Loại
        </a>
        <div class="dropdown-menu">
         <?php foreach ($genre as $data):?>
          <a href="<?php echo base_url();?>main/theloai/<?= $data['id_genre']?>" type="submit" class="dropdown-item btn btn-primary"  value=""><?= $data['name_genre']?></a>
          <?php endforeach;?>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" id="navbardrop" data-toggle="dropdown">
        Tình Trạng
        </a>
        <div class="dropdown-menu">
          <?php foreach ($status as $data):?>
          <button type="submit" class="dropdown-item btn btn-primary"  value=""><?= $data['name_status']?></button>
          <?php endforeach;?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white rounded border-white" href="<?php echo base_url();?>main/moinhat">Mới Nhất</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn-outline-primary text-white rounded border-white" href="<?php echo base_url();?>main/chitiet/<?php echo $random[0]['id_book']?>">Ngẩu Nhiên</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?php echo base_url();?>main/timkiemnangcao">Tìm Kiếm Nâng Cao</a>
      </li>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" required="" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-primary text-white my-2 my-sm-0" type="submit">Search</button>
        </form>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" id="navbardrop" data-toggle="dropdown">
        Xin chào, <?php echo $this->session->userdata['name_user']?>
        </a>
        <div class="dropdown-menu float-left">
          <a class="dropdown-item btn-primary" href="#">Thông Tin Cá Nhân</a>
          <a class="dropdown-item" href="#">Cài Đặt</a>
          <a class="dropdown-item" href="<?php echo base_url();?>main/signout">Đăng Xuất</a>
        </div>
      </li>
    </ul>
  </div>