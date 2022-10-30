<?php

    include('db.php');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['description'];
            $task_id = $row['id'];
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id"; 

        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Task Updated Succesfully';
        $_SESSION['message_type'] = 'warning';
        header("Location: index.php");
    }

?>

<?php include('includes/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto mt-5">
            <div class="card card-body">
                <form method="POST" action="edit.php?id=<?php echo $task_id; ?>">

                    <div class="form-group">
                        <input class="form-control" type="text" name="title" value="<?php echo $title; ?>" placeholder="Update Title">
                    </div>
                    <div class="form-group mt-2">
                        <textarea class="form-control" name="description" rows="2" placeholder="Update Description"><?php echo $description; ?></textarea>
                    </div>

                    <button class="btn btn-success mt-2" name="update">
                        Update
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>