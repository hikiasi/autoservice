<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="m-0 font-weight-bold text-primary">
                Мастер редактирование
            </h3>
        </div>
    </div>
    <div class="card-body">

    <?php
    if(isset($_POST['worker_data_btn']))
    {
        $id = $_POST['idworker'];

        $query = "SELECT * FROM worker WHERE idworker='$id' ";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $row)
        {
    ?>

        <form action="code.php" method="POST">
            <input type="hidden" name="idworker" value="<?php echo $row['idworker']?>">

            <div class="form-group">
                <label> ФИО Мастера </label>
                <input type="text" name="worker" value="<?php echo $row['worker']?>" class="form-control">
            </div>

            <div class="form-group">
                <label> Номер телефона </label>
                <input type="text" name="phone" value="<?php echo $row['phone']?>" class="form-control">
            </div>

            <a href="rabotnik.php" class="btn btn-danger"> Отменить </a>
            <button type="submit" name="worker_update_btn" class="btn btn-primary"> Обновить </button>
        </form>

    <?php
        }
    }

    ?>
    </div>
</div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>