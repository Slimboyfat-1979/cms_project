<?php

function confirm($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED ").mysqli_error($connection);
    }
}

function insert_categories(){
    global $connection;
    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];
        if($cat_title == "" || empty($cat_title)){
            echo "This field should not be empty";
        }else{
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUES('{$cat_title}')";

            $create_cat_query = mysqli_query($connection, $query);
            if(!$create_cat_query){
                die('QUERY FAILED').mysqli_error($connection);
            }
        }
    }
}

function find_all_categories(){
    global $connection;
    $query = "SELECT * FROM categories";
    $result = mysqli_query($connection, $query);
    ?>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Category Title</th>
        </tr>
        </thead>
        <tbody>
    <?php
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a>";
        echo "</tr>";
    }
}

function delete_categories(){
    global $connection;
    if(isset($_GET['delete'])){
        $get_cat_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE ";
        $query .= "cat_id={$get_cat_id}";
        $result = mysqli_query($connection, $query);
        header('Location: categories.php');
    }
}


