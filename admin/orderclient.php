<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="addorderclient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавить новый заказ клиента</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label> Дата начала заказа </label>
                        <input type="date" name="dateorder" class="form-control" value="" required>
                    </div>

                    <?php

                        $status = "SELECT * from status";
                        $status_run = mysqli_query($connection, $status);

                        if(mysqli_num_rows($status_run) > 0)
                        {
                            ?>
                            <div class="form-group">
                                <label> Статус заказа </label>
                                <select name="idstatus" class="form-control" required>
                                    <option value="">Выберите статус заказа</option>
                                        <?php
                                            foreach($status_run as $row)
                                            {
                                        ?>
                                    <option value="<?php echo $row['idstatus']; ?>"><?php echo $row['status']; ?></option>
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
                        <label> Дата закрытия заказа </label>
                        <input type="date" name="termorder" class="form-control" value="">
                    </div>

                    <?php

                        $worker = "SELECT * from worker";
                        $worker_run = mysqli_query($connection, $worker);

                        if(mysqli_num_rows($worker_run) > 0)
                        {
                            ?>
                            <div class="form-group">
                                <label> Мастер </label>
                                <select name="idworker" class="form-control" required>
                                    <option value="">Выберите мастера</option>
                                        <?php
                                            foreach($worker_run as $row)
                                            {
                                        ?>
                                    <option value="<?php echo $row['idworker']; ?>"><?php echo $row['worker']; ?></option>
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

                    $auto = "SELECT * from auto";
                    $auto_run = mysqli_query($connection, $auto);

                    if(mysqli_num_rows($auto_run) > 0)
                    {
                        ?>
                        <div class="form-group">
                            <label> Номер автомобиля </label>
                            <select name="idauto" class="form-control" required>
                                <option value="">Выберите номер автомобиля</option>
                                    <?php
                                        foreach($auto_run as $row)
                                        {
                                    ?>
                                <option value="<?php echo $row['idauto']; ?>"><?php echo $row['number']; ?></option>
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

                    $client = "SELECT * from client";
                    $client_run = mysqli_query($connection, $client);

                    if(mysqli_num_rows($client_run) > 0)
                    {
                        ?>
                        <div class="form-group">
                            <label> Клиент </label>
                            <select name="idclient" class="form-control" required>
                                <option value="">Выберите клиента</option>
                                    <?php
                                        foreach($client_run as $row)
                                        {
                                    ?>
                                <option value="<?php echo $row['idclient']; ?>"><?php echo $row['client']; ?></option>
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
                    <button type="submit" name="add_orderclient"class="btn btn-primary">Добавить</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Заказы клиента
            <button type="button" class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#addorderclient">
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
            
            $query = "SELECT * FROM `orderclient`";
            $query_run = mysqli_query($connection, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                ?>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID заказа клиента</th>
                        <th>Дата открытия</th>
                        <th>Статус заказа</th>
                        <th>Дата закрытия заказа</th>
                        <th>Мастер</th>
                        <th>Автомобиль</th>
                        <th>Клиент</th>
                        <th>Изменить</th>
                        <th>Удалить</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                            $idstatus = $row['idstatus'];
                            $status = "SELECT * FROM status WHERE idstatus='$idstatus' ";
                            $status_run = mysqli_query($connection, $status);

                            $idworker = $row['idworker'];
                            $worker = "SELECT * FROM worker WHERE idworker='$idworker' ";
                            $worker_run = mysqli_query($connection, $worker);

                            $idauto = $row['idauto'];
                            $auto = "SELECT * FROM auto WHERE idauto='$idauto' ";
                            $auto_run = mysqli_query($connection, $auto);

                            $idclient = $row['idclient'];
                            $client = "SELECT * FROM client WHERE idclient='$idclient' ";
                            $client_run = mysqli_query($connection, $client);
                    ?>
                        <tr>
                            <td><?php echo $row['idorderclient'] ?></td>
                            <td><?php echo $row['dateorder'] ?></td>
                            <td>
                                <?php 
                                    foreach($status_run as $status_row)
                                    {
                                        echo $status_row['status'];
                                    } 
                                ?>
                            </td>
                            <td><?php echo $row['termorder'] ?></td>
                            <td>
                                <?php 
                                    foreach($worker_run as $worker_row)
                                    {
                                        echo $worker_row['worker'];
                                    } 
                                ?>
                            </td>
                            <td>
                                <?php 
                                    foreach($auto_run as $auto_row)
                                    {
                                        echo $auto_row['number'];
                                    } 
                                ?>
                            </td>
                            <td>
                                <?php 
                                    foreach($client_run as $client_row)
                                    {
                                        echo $client_row['client'];
                                    } 
                                ?>
                            </td>
                            <td>
                                <form action="orderclient_edit.php" method="POST">
                                    <input type="hidden" name="orderclient_edit_id" value=" <?php echo $row['idorderclient'] ?>" >
                                    <button type="submit" name="orderclient_edit_data_btn" class="btn btn-success">Изменить</button>
                                </form>
                            </td>
                            <td>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="idorderclient_delete_id" value="<?php echo $row['idorderclient'] ?>">
                                    <button type="submit" name="orderclient_delete_btn" class="btn btn-danger">Удалить</button>
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