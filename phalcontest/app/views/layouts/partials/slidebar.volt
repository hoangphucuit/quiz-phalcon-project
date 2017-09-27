<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
      <img src="/assets/dist/img/avatar.png" class="img-circle" alt="User Image">
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
          
          <li><a href="/dethi">Câu hỏi ngẫu nhiên</a></li>
          
        </ul>
      </li>
       <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Bắt đầu khóa thi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/exam/test">Nhận đề</a></li>
          
          
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
          <li><a href="/dethi/upload">Thêm câu hỏi (Excel)</a></li>
          
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Thư viện module</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/module">Danh sách module</a></li>
          <li><a href="/module/add">Thêm module</a></li>
          
          
        </ul>
      </li>
     
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Quản lý khóa thi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/schedule">Danh sách khóa thi</a></li>
          <li><a href="/schedule/add">Tạo khóa thi</a></li>

          
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Quản lý đề thi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/test">Danh sách đề thi</a></li>
          <li><a href="/dethi/maketest">Xuất đề thi</a></li>

          
        </ul>
      </li>

       <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Quản lý sinh viên khóa thi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/score">Danh sách sinh viên khóa thi</a></li>
          <li><a href="/score/add">Thêm sinh viên khóa thi</a></li>
          <li><a href="/score/upload">Thêm sinh viên khóa thi(Excel)</a></li>
          
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
          <li><a href="/users/upload">Thêm thành viên(Excel)</a></li>
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
          
          <li><a href="/dethi">Câu hỏi ngẫu nhiên</a></li>
          
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Bắt đầu khóa thi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/exam/test">Nhận đề</a></li>
          
          
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