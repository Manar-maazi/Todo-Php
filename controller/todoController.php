<?php
require_once('./model/todoModel.php');

// Handle Add Todo
require_once('./views/Add_todo.php');
if (isset($_POST['add'])) {
    add_todo();
}

// Handle Update Todo
if (isset($_POST['update'])) {
    update_todo();
}

// Handle Delete Todo
if (isset($_POST['delete'])) {
    delete_todo();
}

// List todos
$list = list_todo();
require_once('./views/List_todo.php');

// Include form views

require_once('./views/Update_todo.php');
?>
