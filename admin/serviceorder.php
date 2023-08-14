<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="addserviceorder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавить новый итоговый заказ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">

                <div class="modal-body">

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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="submit" name="add_serviceorder"class="btn btn-primary">Добавить</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Итоговые заказы
            <button type="button" class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#addserviceorder">
                Добавить новый заказ
            </button> 
            </h3>
        </div>
    </div>
    
    <div class="card-body">
    <?php
    if(isset($_SESSION['success']) && $_SESSION['success'] !='')
    {
        echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].' </h2>';
        unset($_SESSION['success']);
    }

    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
        unset($_SESSION['status']);
    }

    ?>
        <div class="table-responsive">
            <?php
            
            $query = "SELECT * FROM `serviceorder`";
            $query_run = mysqli_query($connection, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                ?>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID итогового заказа</th>
                        <th>ID заказа клиента</th>
                        <th>Услуга</th>
                        <th>Изменить</th>
                        <th>Удалить</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                            $idorderclient = $row['idorderclient'];
                            $orderclient = "SELECT * FROM orderclient WHERE idorderclient='$idorderclient' ";
                            $orderclient_run = mysqli_query($connection, $orderclient);

                            $idservice = $row['idservice'];
                            $service = "SELECT * FROM service WHERE idservice='$idservice' ";
                            $service_run = mysqli_query($connection, $service);
                    ?>
                        <tr>
                            <td><?php echo $row['idserviceorder'] ?></td>
                            <td>
                                <?php 
                                    foreach($orderclient_run as $orderclient_row)
                                    {
                                        echo $orderclient_row['idorderclient'];
                                    } 
                                ?>
                            </td>
                            <td>
                                <?php 
                                    foreach($service_run as $service_row)
                                    {
                                        echo $service_row['service'];
                                    } 
                                ?>
                            </td>
                            <td>
                                <form action="serviceorder_edit.php" method="POST">
                                    <input type="hidden" name="serviceorder_edit_id" value=" <?php echo $row['idserviceorder'] ?>" >
                                    <button type="submit" name="serviceorder_edit_data_btn" class="btn btn-success">Изменить</button>
                                </form>
                            </td>
                            <td>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="serviceorder_delete_id" value="<?php echo $row['idserviceorder'] ?>">
                                    <button type="submit" name="serviceorder_delete_btn" class="btn btn-danger">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    <?php        
                        }
                    ?>
                </tbody>
            </table>
            <?php
            }
            else
            {
                echo "Записи не найдены";
            }
            ?>
        </div>
    </div>
    </div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>