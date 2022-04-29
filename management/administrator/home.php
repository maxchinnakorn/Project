<?php include ('checkuser.php');?>
<?php include ('modules/css.php');?>
<?php
$sql_system = "SELECT * FROM system";
$query_system = $connect_management->query($sql_system);
$row_system = $query_management->fetch_array();
$query_management->close();
?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!-- Main Header -->
<?php include ('modules/menus/menu_top.php');?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php include ('../../../include/url_photos_admin.php');?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?=$row['user_name'];?></p>
            <!-- Status -->
            <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
          </div>
        </div>
<?php include ('modules/menus/menu_left.php');?>
      </section>
      <!-- /.sidebar -->
    </aside>
<?php
if($page == 'profile')
{
  include ('modules/profile/index.php');
}
elseif($page == 'profile_edit_password' || $page == 'profile_edit_password_update')
{
  include ('modules/profile/edit_password.php');
}
elseif($page == 'permission')
{
  include ('modules/permission/index.php');
}
elseif($page == 'permission_reset_password' || $page == 'permission_reset_password_update')
{
  include ('modules/permission/reset_password.php');
}
elseif($page == 'permission_add_user' || $page == 'permission_add_user_update')
{
  include ('modules/permission/add_user.php');
}
elseif($page == 'permission_close_user' || $page == 'permission_close_user_update')
{
  include ('modules/permission/close_user.php');
}
elseif($page == 'permission_set' || $page == 'permission_set_update')
{
  include ('modules/permission/permission_set.php');
}
elseif($page == 'setting' || $page == 'setting_update')
{
  include ('modules/setting/index.php');
}
else
{
  include ('modules/home/index.php');
}
$connect_school->close();
?>
<?php
$query->close();
include ('modules/footerjs.php');
?>
</body>
</html>
