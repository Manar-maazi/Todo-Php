<section>
    <div class="m-auto mt-10 border w-3/5  bg-gray-100 shadow-lg ">
        <ul>
            <?php
            foreach ($list as $todo) {
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