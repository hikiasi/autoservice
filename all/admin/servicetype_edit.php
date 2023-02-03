<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="m-0 font-weight-bold text-primary">
                Тип услуги редактирование
            </h3>
        </div>
    </div>
    <div class="card-body">

    <?php
    if(isset($_POST['edit_data_btn']))
    {
        $id = $_POST['edit_id'];

        $query = "SELECT * FROM servicetype WHERE id_type='$id' ";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $row)
        {
?>

        <form action="code.php" method="POST">
            <input type="hidden" name="edit_id" value="<?php echo $row['id_type']?>">

            <div class="form-group">
                <label> Тип услуги </label>
                <input type="text" name="edit_type" value="<?php echo $row['type']?>" class="form-control">
            </div>

            <a href="servicetype.php" class="btn btn-danger"> Отменить </a>
            <button type="submit" name="service_update_btn" class="btn btn-primary"> Обновить </button>
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