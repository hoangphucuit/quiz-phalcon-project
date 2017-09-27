<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
      <img src="/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo ($_SESSION['user']); ?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <?php if(($_SESSION['role'])==1)
          {
    ?>
    <ul class="sidebar-menu">
      <li class="header">Danh mục</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Ôn Thi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/dethi">Đề thi</a></li>
          <li><a href="/dethi">Đề thi ngẫu nhiên</a></li>
          
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Thư viện câu hỏi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/question">Danh sách câu hỏi</a></li>
          <li><a href="/question/add">Thêm câu hỏi</a></li>
          
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Quản lý đề thi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/dethi/upload">Thêm câu hỏi trắc nghiệm</a></li>
          <li><a href="/dethi/upload">Thêm câu hỏi tự luận</a></li>
          
        </ul>
      </li>
      
      <li class="treeview"> 
        <a href="#"><i class="fa fa-link"></i> <span>Quản lý vai trò thành viên </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/roles">Danh sách vai trò</a></li>
          <li><a href="/roles/add">Thêm vai trò</a></li>
        </ul>
      </li>
      <li class="treeview"> 
        <a href="#"><i class="fa fa-link"></i> <span>Quản lý thành viên </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/users">Danh sách thành viên</a></li>
          <li><a href="/users/add">Thêm thành viên</a></li>
        </ul>
      </li>
    </ul>
    <?php
      }
    elseif(($_SESSION['role'])==2)
  {
  ?>
  <ul class="sidebar-menu">
      <li class="header">Danh mục</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Ôn Thi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/dethi">Đề thi</a></li>
          <li><a href="/dethi">Đề thi ngẫu nhiên</a></li>
          
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Thư viện câu hỏi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/question">Danh sách câu hỏi</a></li>
          <li><a href="/question/add">Thêm câu hỏi</a></li>
          
        </ul>
      </li>
    </ul>
    <?php
  }
  ?>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>