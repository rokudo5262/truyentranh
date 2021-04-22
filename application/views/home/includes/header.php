</style>
<nav class="navbar  navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand text-white" href="<?php echo base_url(); ?>main/trangchu">Truyện Tranh</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown"> Thể Loại</a>
                <div class="dropdown" style="position: static;">
                    <div class="dropdown-menu" style="width: 100%; height:auto; ">
                        <?php foreach ($genre as $data) : ?>
                            <a class="dropdown-item btn" style="display: inline; width:150px;" href="<?php echo base_url(); ?>main/genre/<?= $data['id_genre'] ?>" type="submit" title="<?= $data['description_genre'] ?>">
                                <?= $data['name_genre'] ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle text-white" id="navbardrop" data-toggle="dropdown">Tình Trạng</a>
                <div class="dropdown" style="position: static;">
                    <div class="dropdown-menu" style="width: 100%; height:auto; ">
                        <?php foreach ($status as $data) : ?>
                            <a class="dropdown-item btn" style="display: inline; width:150px;" href="<?php echo base_url(); ?>main/status/<?= $data['id_status'] ?>" data-toggle="tooltip" data-placement="bottom" title="<?= $data['description_status'] ?>">
                                <?= $data['name_status'] ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-outline-primary text-white rounded border-white" href="<?php echo base_url(); ?>main/detail/<?php echo $random[0]['id_book'] ?>">Ngẩu Nhiên</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo base_url(); ?>main/timkiemnangcao">Tìm Kiếm Nâng Cao</a>
            </li>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" required="" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary text-white my-2 my-sm-0" type="submit">Search</button>
            </form>
        </ul>
        <?php if (isset($_SESSION['name_user'])) { ?>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" id="navbardrop" data-toggle="dropdown">
                        Xin chào, <?php echo $this->session->userdata['name_user'] ?>
                    </a>
                    <div class="dropdown-menu float-left">
                        <a class="dropdown-item btn-primary" href="<?php echo base_url(); ?>main/canhan">Thông Tin Cá Nhân</a>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>main/caidat">Cài Đặt</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>main/signout">Đăng Xuất</a>
                    </div>
                </li>
            </ul>
        <?php  } else { ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <button class="btn btn-inline-primary text-white rounded my-2 my-sm-0" data-toggle="modal" data-target="#signin">Đăng Nhập</button>
                </li>
                <li class="nav-item ">
                    <button class="btn btn-inline-primary text-white rounded my-2 my-sm-0" data-toggle="modal" data-target="#signup">Đăng Ký</button>
                </li>
            </ul>
        <?php  } ?>
    </div>
</nav>
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal" id="signin">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <form class="user" method="post" action="<?php echo base_url(); ?>main/signin">
                <div class="modal-header bg-primary text-white">
                    <h4 class="modal-title">Đăng Nhập</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <p>
                            <label>Gmail</label>
                            <input type="gmail" name="gmail" id="gmail" class="form-control" required="">
                        </p>
                    </div>
                    <div class="form-group">
                        <p>
                            <label>Mật Khẩu</label>
                            <input type="password" name="password" id="password" class="form-control" required="">
                        </p>
                    </div>
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
                <form class="user" action="<?php echo base_url(); ?>main/signup" method="post">
                    <div class="form-group">
                        <p>
                            <label>Email</label>
                            <input type="email" class="form-control" name="gmail" class="form-control" required="">
                        </p>
                    </div>
                    <div class="form-group">
                        <p>
                            <label>Mật Khẩu</label>
                            <input type="password" class="form-control" name="password" class="form-control" required="">
                        </p>
                    </div>
                    <div class="form-group">
                        <p>
                            <label>Nhập Lại Mật Khẩu</label>
                            <input type="password" class="form-control" name="comfirm_password" class="form-control" required="">
                        </p>
                    </div>
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