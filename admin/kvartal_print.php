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
    if (isset($_POST['kvartal_btn'])) {

        $kvartalSelect = $_POST['kvartalSelect'];
        $kvartalText = $_POST['kvartalText'];
        $query = "SELECT so.idorderclient, w.worker, cl.client, a.model, a.number, a.vin, oc.termorder, GROUP_CONCAT(DISTINCT s.service SEPARATOR '\n') as services, SUM(s.cost) as order_amount FROM serviceorder so INNER JOIN service s ON so.idservice = s.idservice INNER JOIN orderclient oc ON so.idorderclient = oc.idorderclient INNER JOIN worker w ON oc.idworker = w.idworker INNER JOIN auto a ON oc.idauto = a.idauto INNER JOIN client cl ON oc.idclient = cl.idclient INNER JOIN status st ON oc.idstatus = st.idstatus WHERE st.idstatus = 3 AND oc.termorder BETWEEN $kvartalSelect GROUP BY so.idorderclient, oc.termorder, w.worker, a.number, a.model, a.vin, cl.client";
        $query_run = mysqli_query($connection, $query);
        if (mysqli_num_rows($query_run) > 0) {
            $total_price = 0;
    ?>
            <div class="container">
                <div class="text-center py-4 text-dark">
                    <h1>Отчет за <?php echo $kvartalText ?></h1>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-dark">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center align-middle">№</th>
                                <th scope="col" class="text-center align-middle">Клиент</th>
                                <th scope="col" class="text-center align-middle">Работник</th>
                                <th scope="col" class="text-center align-middle">Марка и модель авто</th>
                                <th scope="col" class="text-center align-middle">Номер авто</th>
                                <th scope="col" class="text-center align-middle">Дата заказа</th>
                                <th scope="col" class="text-center align-middle">Сумма заказа</th>
                                <th scope="col" class="text-center align-middle">Услуги</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1; // initialize the counter variable
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                $total_price += $row['order_amount'];
                            ?>
                                <tr>
                                    <td class="text-dark"><?php echo $i ?></td>
                                    <td class="text-dark"><?php echo $row['client'] ?></td>
                                    <td class="text-dark"><?php echo $row['worker'] ?></td>
                                    <td class="text-dark"><?php echo $row['model'] ?></td>
                                    <td class="text-dark"><?php echo $row['number'] ?></td>
                                    <td class="text-dark"><?php echo $row['termorder'] ?></td>
                                    <td class="text-dark"><?php echo $row['order_amount'] . "₽" ?></td>
                                    <td class="text-dark"><?php echo nl2br($row['services'])  ?></td>
                                </tr>
                            <?php
                                $i++; // increment the counter variable
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" class="text-right"><strong>Итоговая прибыль за квартал</strong></td>
                                <td><strong><?php echo $total_price . "₽" ?></strong></td>
                            </tr>
                        </tfoot>
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