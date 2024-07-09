<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Todo List</title>
</head>

<body>
    <?php
    require_once("database.php");

    // Fetch data from the database
    $sql = "SELECT * FROM listtodo";
    $data = $connection->query($sql);
    $List_todo = $data->fetchAll(PDO::FETCH_OBJ);

    // Add todo
    if (isset($_POST['add'])) {
        $sql = "INSERT INTO listtodo (todo) VALUES (?)";
        $dataAdd = $connection->prepare($sql);
        $dataAdd->execute([htmlspecialchars($_POST["todo"])]);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    // Delete todo
    if (isset($_POST['delete'])) {
        $sql = "DELETE FROM listtodo WHERE id=?";
        $dataDelete = $connection->prepare($sql);
        $dataDelete->execute([htmlspecialchars($_POST["id"])]);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    // Update todo
    if (isset($_POST['update'])) {
        $sql = "UPDATE listtodo SET todo=? WHERE id=?";
        $dataUpdate = $connection->prepare($sql);
        $dataUpdate->execute([htmlspecialchars($_POST["todo"]), htmlspecialchars($_POST["id"])]);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    ?>
    <?php
    include_once("header.php");
    ?>
    <main>
        <section>
            <form method="POST" class="text-center w-1/2 m-auto mt-5 bg-gray-100  p-8">
                <input type="text" name="todo" class="w-3/5 rounded-sm my-2 m-auto border border-gray-200 p-1 hover:border-violet-500" placeholder="List todo">
                <button name="add" class="bg-violet-700 text-white px-5 rounded-sm block m-auto my-5 hover:bg-violet-900 py-2">Add</button>
            </form>
        </section>

        <section>
            <div class="m-auto mt-10 border w-3/5  bg-gray-100 shadow-lg ">
                <ul>
                    <?php
                    foreach ($List_todo as $todo) {
                    ?>
                        <li class="p-2 bg-gray-50 hover:bg-gray-100 flex justify-between">
                            <p class="text-gray-500"><?= htmlspecialchars($todo->todo) ?></p>
                            <div class="flex gap-2">
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($todo->id) ?>" />
                                    <input type="hidden" name="todo" value="<?= htmlspecialchars($todo->todo) ?>" />
                                    <button class="text-gray-500 hover:text-yellow-400 text-xl" name="edit"><i class="fa fa-pencil"></i></button>
                                    <button class="text-gray-500 hover:text-red-700 text-xl" name="delete"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </section>

        <?php
        if (isset($_POST['edit'])) {
            ?>
            <section>
                <form method="POST" class="text-center w-1/2 m-auto mt-5 bg-gray-100 shadow-lg shadow-gray-500/50 p-8">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($_POST['id']) ?>">
                    <input type="text" name="todo" class="w-3/5 rounded-sm my-2 m-auto border border-gray-200 p-1 hover:border-violet-500" value="<?= htmlspecialchars($_POST['todo']) ?>">
                    <button name="update" class="bg-violet-700 text-white px-5 rounded-sm block m-auto my-5 hover:bg-violet-900 py-2">Update</button>
                </form>
            </section>
            <?php
        }
        ?>
    </main>
</body>

</html>
