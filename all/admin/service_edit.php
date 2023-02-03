<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="m-0 font-weight-bold text-primary">
                Услуги редактирование
            </h3>
        </div>
    </div>
    <div class="card-body">

    <?php
    if(isset($_POST['service_edit_data_btn']))
    {
        $idservice = $_POST['service_edit_id'];

        $query = "SELECT * FROM service WHERE idservice='$idservice' ";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $rowediting)
        {
    ?>

        <form action="code.php" method="POST">
            <input type="hidden" name="idservice" value="<?php echo $rowediting['idservice']?>">

            <?php
                        
            $servicetype = "SELECT * from servicetype";
            $servicetype_run = mysqli_query($connection, $servicetype);

            if(mysqli_num_rows($servicetype_run) > 0)
            {
                ?>
                <div class="form-group">
                    <label> Категория услуги </label>
                    <select name="id_type" class="form-control" required>
                        <option value="">Выберите категорию услуг</option>
                            <?php
                                foreach($servicetype_run as $row)
                                {
                            ?>
                        <option value="<?php echo $row['id_type']; ?>"><?php echo $row['type']; ?></option>
                            <?php
                                }
                            ?>
                    </select>
                </div>
                <?php
            }
            else
            {
                echo "Данных не найдено";
            }
            ?>

            <div class="form-group">
                <label> Услуга </label>
                <input type="text" name="service" class="form-control" value="<?php echo $rowediting['service'] ?>" required>
            </div>

            <div class="form-group">
                <label> Стоимость </label>
                <input type="text" name="cost" class="form-control" value="<?php echo $rowediting['cost'] ?>" required>
            </div>
            <a href="services.php" class="btn btn-danger"> Отменить </a>
            <button type="submit" name="services_update_btn" class="btn btn-primary"> Обновить </button>
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