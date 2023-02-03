<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                Автомобиль редактирование
            </h6>
        </div>
    </div>
    <div class="card-body">

    <?php
    if(isset($_POST['avto_edit_data_btn']))
    {
        $idauto = $_POST['avto_edit_id'];

        $query = "SELECT * FROM auto WHERE idauto='$idauto' ";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $row)
        {
?>

        <form action="code.php" method="POST">
            <input type="hidden" name="idauto" value="<?php echo $row['idauto']?>">

            <div class="form-group">
                <label> Номер авто </label>
                <input type="text" name="number" value="<?php echo $row['number']?>" class="form-control">
            </div>
            
            <div class="form-group">
                <label> VIN </label>
                <input type="text" name="VIN" value="<?php echo $row['VIN']?>" class="form-control">
            </div>
            
            <div class="form-group">
                <label> Марка и модель авто </label>
                <input type="text" name="model" value="<?php echo $row['model']?>" class="form-control">
            </div>

            <div class="form-group">
                <label> Год выпуска </label>
                <input type="text" name="year" value="<?php echo $row['year']?>" class="form-control">
            </div>

            <div class="form-group">
                <label> Пробег авто </label>
                <input type="text" name="mileage" value="<?php echo $row['mileage']?>" class="form-control">
            </div>

            <a href="avto.php" class="btn btn-danger"> Отменить </a>
            <button type="submit" name="avto_update_btn" class="btn btn-primary"> Обновить </button>
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