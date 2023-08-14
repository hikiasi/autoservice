<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="m-0 font-weight-bold text-primary">
                Заказ клиента редактирование
            </h3>
        </div>
    </div>
    <div class="card-body">

    <?php
    if(isset($_POST['orderclient_edit_data_btn']))
    {
        $idorderclient = $_POST['orderclient_edit_id'];

        $query = "SELECT * FROM orderclient WHERE idorderclient='$idorderclient' ";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $rowediting)
        {
    ?>

        <form action="code.php" method="POST">
            <input type="hidden" name="idorderclient" value="<?php echo $rowediting['idorderclient']?>">

            <div class="form-group">
                <label> Дата начала заказа </label>
                <input type="date" name="dateorder" class="form-control" value="<?php echo $rowediting['dateorder']; ?>" required>
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
                <input type="date" name="termorder" class="form-control" value="<?php echo $rowediting['termorder']; ?>">
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

            <a href="orderclient.php" class="btn btn-danger"> Отменить </a>
            <button type="submit" name="orderclient_update_btn" class="btn btn-primary"> Обновить </button>
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