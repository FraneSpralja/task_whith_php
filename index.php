<?php include("db.php") ?>


<?php include("includes/header.php") ?>
    <div class="container p-4">
    <div class="row">
        <div class="col-md-4">

        <?php if(isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?=$_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="save_task.php" method="POST">

                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="task title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control mt-2" placeholder="task description"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block mt-2" name="save_task" value="Save Task" style="width:100%">
                </form>
            </div>

        </div>
        <div class="col-md-8">
            <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <th>
                            Title
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Created at
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_tasks)) { ?>
                        <tr>
                            <td class="align-middle"><?php echo $row['title']?></td>
                            <td class="align-middle"><?php echo $row['description']?></td>
                            <td class="align-middle"><?php echo $row['created_at']?></td>
                            <td class="text-center align-middle">
                                <a href="edit.php?id=<?php echo $row['id'];?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="delete_task.php?id=<?php echo $row['id'];?>" class="text-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
<?php include("includes/footer.php") ?>