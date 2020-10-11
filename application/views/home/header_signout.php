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
          <a href="<?php echo base_url();?>main/theloai/<?= $data['id_genre']?>" type="submit" class="dropdown-item btn btn-primary"><?= $data['name_genre']?></a>
          <?php endforeach;?>
        </div>
      </li>
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle text-white" id="navbardrop" data-toggle="dropdown">
        Tình Trạng
        </a>
        <div class="dropdown-menu columns">
          <?php foreach ($status as $data):?>
          <button type="button" class="dropdown-item btn btn-primary" value="">
            <?= $data['name_status']?>
          </button>
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
      <li class="nav-item">
        <button class="btn btn-inline-primary rounded my-2 my-sm-0" data-toggle="modal" data-target="#signin">Đăng Nhập</button>
      </li>
      <li class="nav-item ">
        <button class="btn btn-inline-primary rounded my-2 my-sm-0" data-toggle="modal" data-target="#signup">Đăng Ký</button>
      </li>
    </ul>
  </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------->
  <div class="modal" id="signin">
    <div class="modal-dialog">
      <div class="modal-content">      
        <!-- Modal Header -->
        <form method="post" action="<?php echo base_url();?>main/signin">
        <div class="modal-header bg-primary text-white">
          <h4 class="modal-title">Đăng Nhập</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>        
        <!-- Modal body -->
        <div class="modal-body">
           <p> 
            <label>Gmail</label>
            <input type="gmail" name="gmail" id="gmail" class="form-control" required="">
          </p>
          <p>
            <label>Mật Khẩu</label>
            <input type="password" name="password" id="password" class="form-control" required="">
          </p>
        </div>        
        <!-- Modal footer -->
        <div class="modal-footer bg-primary text-white">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
          <button type="submit" class="btn btn-success">Đăng Nhập</button>
        </div>
      </form>
      </div>
    </div>
  </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------->
  <div class="modal" id="signup">
    <div class="modal-dialog">
      <div class="modal-content rounded">      
        <!-- Modal Header -->
        <div class="modal-header bg-primary text-white">
          <h4 class="modal-title">Đăng Ký</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="<?php echo base_url();?>main/signup" method="post">
          <p> 
            <label>Email</label>
            <input type="email" name="gmail" class="form-control" required="">
          </p>
          <p>
            <label>Mật Khẩu</label>
            <input type="password" name="password" class="form-control" required="">
          </p>
          <p>
            <label>Nhập Lại Mật Khẩu</label>
            <input type="password" name="comfirm_password" class="form-control" required="">
          </p>
        </div>        
        <!-- Modal footer -->
        <div class="modal-footer bg-primary text-white">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
          <button type="submit" class="btn btn-success">Đăng Ký</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</nav>