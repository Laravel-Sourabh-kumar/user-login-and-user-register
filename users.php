<?php
 include_once "config/database.php";
 $obj = new Query();
 
 $result = $obj->getData('users','*');

 
 # Delete user
 if (isset($_GET['action']) && $_GET['action'] == 'delete') {
     ## Delete Data
     $id = $_GET['id'];
     $res = $obj->deleteData("users", 'id', $id);
     $_SESSION['success'] = "User has been deleted successfully";
     header("LOCATION: users.php");
     exit;
 }
 
 ## Get Data
 $result = $obj->getData('users', '*');
 
 
 
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
     <?php include_once("include/alert.php") ?>
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
                                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <div class="text-end upgrade-btn">
                            <a href="adduser.php"
                                class="btn btn-danger  d-md-inline-block text-white"><i class="fa fa-plus"></i> ADD</a>
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
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Users List</h4>
                                <!-- <h6 class="card-subtitle">Add class <code>.table</code></h6> -->
                                <div class="table-responsive">
                                    <table class="table user-table">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Name</th>
                                                 
                                                <th class="border-top-0">Email</th>
                                                <th class="border-top-0">Phone</th>
                                                <th class="border-top-0">Address</th>
                                                <th class="border-top-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            //$rows=$result->fetch_assoc();
                                            //var_dump($rows);
                                            if($result->num_rows > 0){ 
                                            while($rows = $result->fetch_assoc()) 
                                            {
                                                ?>
                                            <tr>
                                                
                                                <td><?php echo($i++); ?></td>
                                                <td><?php echo($rows['name']); ?></td>
                                                <td><?php echo($rows['email']); ?></td>
                                                <td><?php echo($rows['mobile']); ?></td>
                                                <td><?php echo($rows['address']); ?></td>
                                                <td>  
                                                <a href="edituser.php?id=<?php echo $rows['id'] ?>" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit "></i>
                                                    </a>
                                                     <!-- <a href="#" class="btn btn-warning  text-white"><i class="fa fa-edit"></i></a> -->
                                                     <a onclick="return confirm('Do you want to delete this?')" href="users.php?action=delete&id=<?php echo $rows['id'] ?>" class="btn btn-danger text-white btn-sm">
                                                       <i class="fa fa-trash"></i></a>
                   
                                                </td>
                                                <?php 
                                                 
                                                } 
                                            }
                                                ?>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
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