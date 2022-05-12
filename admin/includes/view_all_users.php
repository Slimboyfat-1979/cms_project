
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Email</th>
        <th>Role</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM users";
    $select_users = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_users,MYSQLI_ASSOC)){
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];


        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td>$username</td>";
        echo "<td>$user_firstname</td>";
        echo "<td>$user_lastname</td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_role</td>";


          echo "<td><a href='users.php?change_to_admin=$user_id'>Admin</a></td>";
          echo "<td><a href='users.php?change_to_sub=$user_id'>Subscriber</a></td>";
          echo "<td><a href='users.php?source=edit_user&edit_user=$user_id'>Edit</a>";
          echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
//        echo "</tr>";
    }
    ?>
    </tr>
    </tbody>
</table>

<?php

//if(isset($_GET['approve'])){
//    $the_comment_id = $_GET['approve'];
//    $query = "UPDATE comments SET comment_status='approved' WHERE comment_id='{$the_comment_id}'";
//    $approve_comment_query = mysqli_query($connection, $query);
//    header("Location: comments.php");
//}

if(isset($_GET['change_to_admin'])){
    $the_user_id = $_GET['change_to_admin'];
    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = {$the_user_id}";
    $change_admin_query = mysqli_query($connection, $query);
    header("Location: users.php");
}

if(isset($_GET['change_to_sub'])){
    $the_user_id = $_GET['change_to_sub'];
    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$the_user_id}";
    $change_subscriber_query = mysqli_query($connection, $query);
    header("Location: users.php");
}

//
//if(isset($_GET['unapprove'])){
//    $the_comment_id = $_GET['unapprove'];
//    $query = "UPDATE comments SET comment_status ='unapproved' WHERE comment_id={$the_comment_id}";
//    $unapprove_comment_query = mysqli_query($connection, $query);
//    header("Location: comments.php");
//}

if(isset($_GET['delete'])){
    $the_user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
    $result = mysqli_query($connection, $query);
    header("Location: users.php");
}
?>