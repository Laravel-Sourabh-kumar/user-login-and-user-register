<?php
include_once "config/database.php";
$obj = new Query();

## Form submit
if (isset($_POST['submit'])) {
    ## Update Data
    $data = $_POST;
    $id = $data['id'];

    unset($data['submit']);
    unset($data['id']);

    $res = $obj->updateData('users', $data, 'id', $id);
    if ($res) {
        $_SESSION['success'] = "User has been updated successfully";
    } else {
        $_SESSION['error'] = "Something went wrong";
    }
    header("LOCATION: users.php");
    exit;
}

## Get Data by ID
$user = array();
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
    $result = $obj->getDataById('users', '*', 'id', $id);
    if ($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
    }
} else {
    header("LOCATION: users..php");
    exit;
}

?>



<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
<?php      include("include/header_script.php");  ?>
     
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
   
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
     <?php      include("include/header.php"); ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
          <?php      include("include/sidebar.php"); ?>
    
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Users</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <div class="text-end upgrade-btn">
                            <a href="users.php"
                                class="btn btn-info  d-md-inline-block text-white"><i class="fa fa-plus"></i> Back</a>
                        </div>
                    </div>  
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12   col-md-12">
                        <div class="card">
                            <div class="card-body">
                            <form method="post" action="edituser.php" class="form-horizontal form-material mx-2">
                                <input type="hidden" value="<?php echo $user['id'] ?>" name="id">

                                <!-- <form > -->
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0"> Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="name"  value="<?php echo $user['name'] ?>" placeholder="Johnathan Doe"
                                            class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" name="email"  value="<?php echo $user['email'] ?>" placeholder="johnathan@admin.com"
                                             class="form-control ps-0 form-control-line"                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Password</label>
                                        <div class="col-md-12">
                                            <input type="password"  value="<?php echo $user['password'] ?>" value="password" name="password"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" name="mobile"  value="<?php echo $user['mobile'] ?>" placeholder="123 456 7890"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Address</label>
                                        <div class="col-md-12">
                                            <textarea rows="5"  value="" name="address" class="form-control ps-0 form-control-line"><?php echo $user['address'] ?></textarea>
                                        </div>
                                    </div>
                                     
                                    <button type="submit" name="submit" class="btn text-white btn-info">Submit </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php      include("include/footer.php"); ?>
    
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <?php      include("include/footer_script.php"); ?>
    
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
 
</body>

</html>