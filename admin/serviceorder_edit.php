<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="m-0 font-weight-bold text-primary">
                Итоговый заказ редактирование
            </h3>
        </div>
    </div>
    <div class="card-body">

    <?php
    if(isset($_POST['serviceorder_edit_data_btn']))
    {
        $idserviceorder = $_POST['serviceorder_edit_id'];

        $query = "SELECT * FROM serviceorder WHERE idserviceorder='$idserviceorder' ";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $rowediting)
        {
    ?>

        <form action="code.php" method="POST">
            <input type="hidden" name="idserviceorder" value="<?php echo $rowediting['idserviceorder']?>">

            <?php

            $orderclient = "SELECT * from orderclient";
            $orderclient_run = mysqli_query($connection, $orderclient);

            if(mysqli_num_rows($orderclient_run) > 0)
            {
                ?>
                <div class="form-group">
                    <label> ID заказ клиента </label>
                    <select name="idorderclient" class="form-control" required>
                        <option value="">Выберите ID заказа</option>
                            <?php
                                foreach($orderclient_run as $row)
                                {
                            ?>
                        <option value="<?php echo $row['idorderclient']; ?>"><?php echo $row['idorderclient']; ?></option>
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

            <?php

            $service = "SELECT * from service";
            $service_run = mysqli_query($connection, $service);

            if(mysqli_num_rows($service_run) > 0)
            {
                ?>
                <div class="form-group">
                    <label> Услуга </label>
                    <select name="idservice" class="form-control" required>
                        <option value="">Выберите услугу</option>
                            <?php
                                foreach($service_run as $row)
                                {
                            ?>
                        <option value="<?php echo $row['idservice']; ?>"><?php echo $row['service']; ?></option>
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

            <a href="serviceorder.php" class="btn btn-danger"> Отменить </a>
            <button type="submit" name="serviceorder_update_btn" class="btn btn-primary"> Обновить </button>
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