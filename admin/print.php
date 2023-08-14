<?php
include('security.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>МойАвтосервис : Печать заказа</title>
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

        h3 {
            margin: 0;
        }

        .client-data {
            margin: 2em 0 0;
        }

        .order-tasks {
            margin: 1em 0;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 0.2em;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .left {
            text-align: left;
        }

        .bold {
            font-weight: bold;
        }

        .total, .signs {
            font-size: 14px;
            font-weight: bold;
            text-align: right;
            margin: 2em 2em 4em;
        }

        .header {
            margin: 0 auto 4em;
        }

        .logo {
            display: inline-block;
        }

        .title {
            display: inline-block;
            font-size: 24px;
            margin: 0 5px;
            position: absolute;
            top: 6px;
        }

        .details {
            display: inline-block;
            text-align: right;
            float: right;
        }

        .print {
            float: right;
            margin-bottom: 100px;
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
    </style>
</head>
<body style="font-family:sans-serif; font-size: 12px; width: 19cm">
<div class="header">
    <div class="logo">
        <img src="../img/logo.svg" alt="Мой автосервис лого" height="35px">
    </div>
    <?php 
     if(isset($_POST['idorderclient_zakaz_naryad_btn']))
     {
    
    $idorderclient = $_POST['idorderclient_id_print'];
    $query = "SELECT serviceorder.idorderclient, idserviceorder, serviceorder.idservice, service, cost, dateorder, orderclient.idauto, number, VIN, model, year, orderclient.idclient, client, phone from serviceorder, orderclient, service, auto, client WHERE (orderclient.idclient = client.idclient) and (orderclient.idauto = auto.idauto) and (serviceorder.idorderclient = orderclient.idorderclient) and (serviceorder.idservice = service.idservice) and (serviceorder.idorderclient = $idorderclient) LIMIT 1";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        ?>
        <?php 
            while($row = mysqli_fetch_assoc($query_run))
            {
        ?>
    <div class="details">
        ООО «Ремонт-Помогатор»<br>г. Калининград, ул. Гагарина, д. 114 <br>+7 (9999) 99-99-99
    </div>
</div>
<div style="font-size: 26px; text-align: center">Заказ-наряд № <?php echo $row['idorderclient'] ?> от <input readonly="readonly" type="date"
                                                                                        value="<?php echo $row['dateorder'] ?>"
                                                                                        size="7em"
                                                                                        style="font-size: 26px; color: black;" required></div>
<div class="client-data">
    <table>
            <tr>
                <th class="left" style="width: 9em">Заказчик</th>
                <td style="width: 40em"><?php echo $row['client'] ?></td>
            </tr>
            <tr>
                <th class="left">Телефон</th>
                <td><?php echo $row['phone'] ?></td>
            </tr>
            <tr>
                <th class="left">Марка и модель</th>
                <td><?php echo $row['model'] ?></td>
            </tr>
            <tr>
                <th class="left">VIN-код</th>
                <td><?php echo $row['VIN'] ?></td>
            </tr>
            <tr>
                <th class="left">Год выпуска</th>
                <td><?php echo $row['year'] ?></td>
            </tr>
            <tr>
                <th class="left">Гос. номер</th>
                <td><?php echo $row['number'] ?></td>
            </tr>
        <?php        
            }
    }
        ?>
    </table>
    <?php
            }
            else
            {
                echo "Записи не найдены";
            }
            ?>
</div>
<div class="order-tasks">
    <h3>Работы:</h3>
    <?php 
    if(isset($_POST['idorderclient_zakaz_naryad_btn']))
    {
   
    $idorderclient = $_POST['idorderclient_id_print'];
    $query = "SELECT serviceorder.idorderclient, idserviceorder, serviceorder.idservice, service, cost, dateorder, orderclient.idauto, number, VIN, model, year, orderclient.idclient, client, phone from serviceorder, orderclient, service, auto, client WHERE (orderclient.idclient = client.idclient) and (orderclient.idauto = auto.idauto) and (serviceorder.idorderclient = orderclient.idorderclient) and (serviceorder.idservice = service.idservice) and (serviceorder.idorderclient = $idorderclient)";
    
    $query_run = mysqli_query($connection, $query);
    $i = 1;

    if(mysqli_num_rows($query_run)> 0)
    {
        ?>
    <table style="width: 100%">
        <thead>
        <tr>
            <th style="width: 2em">№</th>
            <th style="width: 11em">Код</th>
            <th>Наименование работы</th>
            <th style="width: 10em">Стоимость, руб.</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            while($row = mysqli_fetch_assoc($query_run))
            {
                $total_price += $row['cost'];
        ?>
            <tr>
                <td class="center"><?php echo $i++ ?></td>
                <td><?php echo $row['idservice'] ?></td>
                <td><?php echo $row['service'] ?></td>
                <td class="right"><?php echo $row['cost'] ?></td>
            </tr>
        <?php        
            }
        ?>
        <tr class="bold">
            <td class="right" colspan="3">Итого, стоимость работ, руб.:</td>
            <td class="right">
                <?php echo $total_price ?>
            </td>
        </tr>
        </tbody>
        
    </table>
</div>
<div class="total">
    <p>Общая стоимость: <?php echo $total_price ?> руб.</p>
</div>
<div class="signs">
    <p>Подпись клиента &nbsp;&nbsp;_______________</p>
    <br>
    <p>Подпись менеджера &nbsp;&nbsp;_______________</p>
</div>
<?php
            }
            }
            else
            {
                echo "Записи не найдены";
            }
            ?>
<div class="print">
    <input type="button" class="btn-back" value="Назад" onclick="history.back();">
    <input type="button" class="btn-print" value="Печать" onclick="window.print();">
</div>
</body>
</html>