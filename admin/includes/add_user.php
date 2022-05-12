<?php

if(isset($_POST['create_user'])){
    //$user_id = $_POST['user_id'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname =$_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    //This gets the name of the file that has been chosen;
//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];

    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role) VALUES('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}', '{$user_role}')";

    $user_query = mysqli_query($connection, $query);

    confirm($user_query);
    echo "User Created: "." "."<a href='users.php'>View Users</a>";

}

?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="user_firstname" />
    </div>
    <div class="form-group">
        <label for="post_status">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" />
    </div>

    <div class="form-group">
        <select name="user_role" id="">
            <option value="subscriber">Select Options</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>

    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="username" />
    </div>

    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>
</form>