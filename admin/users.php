<?php
include ('../includes/header.php');
include ('includes/admin_header.php');
include ('../includes/db_connection.php');
include ('functions.php');
ob_start();
?>
    <div id="wrapper">
<?php include ('includes/navigation.php'); ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>Author</small>
                    </h1>
                    <?php
                    if(isset($_GET['source'])){
                        $source = $_GET['source'];
                    }else{
                        $source = '';
                    }
                    switch($source){
                        case 'add_user':
                            include ('includes/add_user.php');
                            break;
                        case'edit_user':
                            include ('includes/edit_user.php');
                            break;
                        default:
                            include ('includes/view_all_users.php');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php include ('includes/footer.php'); ?>