<?php
include ('../includes/header.php');
include ('includes/admin_header.php');
include ('../includes/db_connection.php');
include ('functions.php');
ob_start();

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users where username='{$username}'";
    $get_user = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($get_user, MYSQLI_ASSOC)){
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }
}

if(isset($_POST['edit_user'])){

    $username = $_POST['username'];
    $first_name = $_POST['user_firstname'];
    $last_name = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];


    $update_profile_query = "UPDATE users SET user_firstname = '{$first_name}', user_lastname='{$last_name}', 
                             user_role='{$user_role}', username='{$username}', user_email='{$user_email}', user_password='{$user_password}' 
                             WHERE username = '{$_SESSION['username']}'";

    $result_update_profile = mysqli_query($connection, $update_profile_query);
    confirm($result_update_profile);
}



?>
    <div id="wrapper">
<?php include ('includes/navigation.php'); ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small><?php echo $username; ?></small>
                    </h1>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">First Name</label>
                            <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="post_status">Last Name</label>
                            <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>" />
                        </div>


                        <div class="form-group">
                            <select name="user_role" id="">
                                <option value="subscriber"><?php echo $user_role; ?></option>
                                <?php
                                if($user_role == 'admin'){
                                    echo "<option value='subscriber'>subscriber</option>";
                                }else{
                                    echo "<option value='admin'>admin</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post_tags">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" />
                        </div>

                        <div class="form-group">
                            <label for="post_content">Email</label>
                            <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
                        </div>

                        <div class="form-group">
                            <label for="post_content">Password</label>
                            <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="edit_user" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include ('includes/footer.php'); ?>