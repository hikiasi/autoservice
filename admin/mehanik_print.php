<?php
include('security.php');
include('includes/header.php');
?>
<style>
@media print {
    input {
        border: none;
        outline: none;
    }

    .print {
        display: none;
    }
}

.print {
    margin-bottom: 30px;
}

.btn-back {
    font-size: 16px;
    padding: 7px 16px;
    background-color: #6c757d;
    border-color: #6c757d;
    color: #fff;
    cursor: pointer;
    border-radius: 0.25rem;
    margin-right: 10px;
}

.btn-print {
    font-size: 16px;
    padding: 7px 16px;
    background-color: #0d6efd;
    border-color: #0d6efd;
    color: #fff;
    cursor: pointer;
    border-radius: 0.25rem;
}

h1 {
    font-weight: 800;
}

.signs {
    display: flex;
    justify-content: flex-end;
    
    font-size: 14px;
    font-weight: bold;
    text-align: right;
    margin: 2em 0em 4em;
}

</style>

<body>
    <?php
    if (isset($_POST['mehanik_btn'])) {

        $idworker = $_POST['idworker'];
        $mehanikText = $_POST['mehanikText'];

        $query = "SELECT orderclient.idorderclient, orderclient.idworker, worker.worker, worker.phone, dateorder, orderclient.idstatus, status.status, termorder, orderclient.idauto, auto.number, auto.vin, auto.model, auto.year, auto.mileage, orderclient.idclient, client.client FROM orderclient INNER JOIN status ON orderclient.idstatus = status.idstatus INNER JOIN worker ON orderclient.idworker = worker.idworker INNER JOIN auto ON orderclient.idauto = auto.idauto INNER JOIN client ON orderclient.idclient = client.idclient where orderclient.idworker = $idworker ORDER BY orderclient.idorderclient ASC";
        $query_run = mysqli_query($connection, $query);

        $queryLimit = "SELECT orderclient.idorderclient, orderclient.idworker, worker.worker, worker.phone, dateorder, orderclient.idstatus, status.status, termorder, orderclient.idauto, auto.number, auto.vin, auto.model, auto.year, auto.mileage, orderclient.idclient, client.client FROM orderclient INNER JOIN status ON orderclient.idstatus = status.idstatus INNER JOIN worker ON orderclient.idworker = worker.idworker INNER JOIN auto ON orderclient.idauto = auto.idauto INNER JOIN client ON orderclient.idclient = client.idclient where orderclient.idworker = $idworker ORDER BY orderclient.idorderclient ASC LIMIT 1";
        $query_run_limit = mysqli_query($connection, $queryLimit);

        $rowLimit = mysqli_fetch_assoc($query_run_limit);

        if (mysqli_num_rows($query_run) > 0) {
    ?>
            <div class="container">
                <div class="text-center py-4 text-dark">
                    <h1>Заказы механика <?php echo $rowLimit['worker'] ?></h1>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-dark">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center align-middle">№</th>
                                <th scope="col" class="text-center align-middle">Дата начала заказа</th>
                                <th scope="col" class="text-center align-middle">Статус заказа</th>
                                <th scope="col" class="text-center align-middle">Дата окончания заказа</th>
                                <th scope="col" class="text-center align-middle">Модель и марка авто</th>
                                <th scope="col" class="text-center align-middle">Номер</th>
                                <th scope="col" class="text-center align-middle">Год авто</th>
                                <th scope="col" class="text-center align-middle">Пробег</th>
                                <th scope="col" class="text-center align-middle">Клиент</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1; // initialize the counter variable
                            while ($row = mysqli_fetch_assoc($query_run)) {
                            ?>
                                <tr>
                                    <td class="text-dark"><?php echo $i ?></td>
                                    <td class="text-dark"><?php echo $row['dateorder'] ?></td>
                                    <td class="text-dark"><?php echo $row['status'] ?></td>
                                    <td class="text-dark"><?php echo $row['termorder'] ?></td>
                                    <td class="text-dark"><?php echo $row['model'] ?></td>
                                    <td class="text-dark"><?php echo $row['number'] ?></td>
                                    <td class="text-dark"><?php echo $row['year'] ?></td>
                                    <td class="text-dark"><?php echo $row['mileage'] ?></td>
                                    <td class="text-dark"><?php echo $row['client'] ?></td>
                                </tr>
                            <?php
                                $i++; // increment the counter variable
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="signs">
                    <p class="text-dark">Подпись менеджера &nbsp;&nbsp;_______________</p>
                </div>
            </div>
            <div class="print">
                <input type="button" class="btn-back" value="Назад" onclick="history.back();">
                <input type="button" class="btn-print" value="Печать" onclick="window.print();">
            </div>
    <?php
        } else {
            echo "Записи не найдены";
        }
    }
    ?>