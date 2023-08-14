<?php
include('security.php');

//Мастер
if(isset($_POST['add_rabotnik']))
{
    $worker = $_POST['worker'];
    $phone = $_POST['phone'];

    $worker_query = "INSERT INTO worker (worker, phone) VALUES ('$worker', '$phone')";
    $worker_query_run = mysqli_query($connection, $worker_query);

    if($worker_query_run)
    {
        $_SESSION['success'] = "Мастер добавлен";
        header('Location: rabotnik.php');
    }
    else
    {
        $_SESSION['status'] = "Мастер не добавлен";
        header('Location: rabotnik.php');
    }
}

if(isset($_POST['worker_update_btn']))
{
    $idworker = $_POST['idworker'];
    $worker = $_POST['worker'];
    $phone = $_POST['phone'];

    $worker_query = "UPDATE worker SET worker='$worker', phone='$phone' WHERE idworker='$idworker' ";
    $worker_query_run = mysqli_query($connection, $worker_query);

    if($worker_query_run)
    {
        $_SESSION['success'] = "Мастер обновлен";
            header('Location: rabotnik.php');
    }
    else
    {
        $_SESSION['status'] = "Мастер не обновлен";
            header('Location: rabotnik.php');
    }
}

if(isset($_POST['worker_delete_btn']))
{
    $id = $_POST['worker_delete_id'];

    $query = "DELETE FROM worker WHERE idworker='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Мастер удален";
        header("Location: rabotnik.php");
    }
    else
    {
        $_SESSION['status'] = "Мастер не удален";
        header("Location: rabotnik.php");
    }
}

//Клиент
if(isset($_POST['add_client']))
{
    $client = $_POST['client'];
    $phone = $_POST['phone'];

    $client_query = "INSERT INTO client (client, phone) VALUES ('$client', '$phone')";
    $client_query_run = mysqli_query($connection, $client_query);

    if($client_query_run)
    {
        $_SESSION['success'] = "Клиент добавлен";
        header('Location: client.php');
    }
    else
    {
        $_SESSION['status'] = "Клиент не добавлен";
        header('Location: client.php');
    }
}

if(isset($_POST['client_update_btn']))
{
    $idclient = $_POST['idclient'];
    $client = $_POST['client'];
    $phone = $_POST['phone'];

    $client_query = "UPDATE client SET client='$client', phone='$phone' WHERE idclient='$idclient' ";
    $client_query_run = mysqli_query($connection, $client_query);

    if($client_query_run)
    {
        $_SESSION['success'] = "Клиент обновлен";
            header('Location: client.php');
    }
    else
    {
        $_SESSION['status'] = "Клиент не обновлен";
            header('Location: client.php');
    }
}

if(isset($_POST['client_delete_btn']))
{
    $id = $_POST['client_delete_id'];

    $query = "DELETE FROM client WHERE idclient='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Клиент удален";
        header("Location: client.php");
    }
    else
    {
        $_SESSION['status'] = "Клиент не удален";
        header("Location: client.php");
    }
}

//Заказ итоговый
if(isset($_POST['add_serviceorder']))
{
    $idorderclient = $_POST['idorderclient'];
    $idservice = $_POST['idservice'];

    $serviceorder_query = "INSERT INTO serviceorder (idorderclient, idservice) VALUES ('$idorderclient', '$idservice')";
    $serviceorder_query_run = mysqli_query($connection, $serviceorder_query);

    if($serviceorder_query_run)
    {
        $_SESSION['success'] = "Новый итоговый заказ добавлен";
        header('Location: serviceorder.php');
    }
    else
    {
        $_SESSION['status'] = "Новый итоговый заказ не добавлен";
        header('Location: serviceorder.php');
    }
}

if(isset($_POST['serviceorder_update_btn']))
{
    $idserviceorder = $_POST['idserviceorder'];
    $idorderclient = $_POST['idorderclient'];
    $idservice = $_POST['idservice'];

    $query = "UPDATE serviceorder SET idorderclient='$idorderclient', idservice='$idservice' WHERE idserviceorder='$idserviceorder' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Итоговый заказ обновлен";
            header('Location: serviceorder.php');
    }
    else
    {
        $_SESSION['status'] = "Итоговый заказ не обновлен";
            header('Location: serviceorder.php');
    }
}

if(isset($_POST['serviceorder_delete_btn']))
{
    $id = $_POST['serviceorder_delete_id'];

    $query = "DELETE FROM serviceorder WHERE idserviceorder ='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Итоговый заказ удален";
        header("Location: serviceorder.php");
    }
    else
    {
        $_SESSION['status'] = "Итоговый заказ не удален";
        header("Location: serviceorder.php");
    }
}


//Заказ клиена
if(isset($_POST['add_orderclient']))
{
    $dateorder = date('Y-m-d', strtotime($_POST['dateorder']));
    $idstatus = $_POST['idstatus'];
    $termorder = date('Y-m-d', strtotime($_POST['termorder']));
    $idworker = $_POST['idworker'];
    $idauto = $_POST['idauto'];
    $idclient = $_POST['idclient'];

    $orderclient_query = "INSERT INTO orderclient (dateorder, idstatus, termorder, idworker, idauto, idclient) VALUES ('$dateorder', '$idstatus', '$termorder', '$idworker', '$idauto', '$idclient')";
    $orderclient_query_run = mysqli_query($connection, $orderclient_query);

    if($orderclient_query_run)
    {
        $_SESSION['success'] = "Новый заказ клиента добавлен";
        header('Location: orderclient.php');
    }
    else
    {
        $_SESSION['status'] = "Новый заказ клиента не добавлен";
        header('Location: orderclient.php');
    }
}

if(isset($_POST['orderclient_update_btn']))
{
    $idorderclient = $_POST['idorderclient'];
    $dateorder = date('Y-m-d', strtotime($_POST['dateorder']));
    $idstatus = $_POST['idstatus'];
    $termorder = date('Y-m-d', strtotime($_POST['termorder']));
    $idworker = $_POST['idworker'];
    $idauto = $_POST['idauto'];
    $idclient = $_POST['idclient'];

    $query = "UPDATE orderclient SET dateorder='$dateorder', idstatus='$idstatus', termorder='$termorder', idworker='$idworker', idauto='$idauto', idclient='$idclient'  WHERE idorderclient='$idorderclient' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Заказ клиента обновлен";
            header('Location: orderclient.php');
    }
    else
    {
        $_SESSION['status'] = "Заказ клиента не обновлен";
            header('Location: orderclient.php');
    }
}

if(isset($_POST['orderclient_delete_btn']))
{
    $id = $_POST['idorderclient_delete_id'];

    $query = "DELETE FROM orderclient WHERE idorderclient ='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Заказ клиента удален";
        header("Location: orderclient.php");
    }
    else
    {
        $_SESSION['status'] = "Заказ клиента не удален";
        header("Location: orderclient.php");
    }
}

//Услуги
if(isset($_POST['add_service']))
{
    $id_type = $_POST['id_type'];
    $service = $_POST['service'];
    $cost = $_POST['cost'];

    $services_query = "INSERT INTO service (id_type, service, cost) VALUES ('$id_type', '$service', '$cost')";
    $services_query_run = mysqli_query($connection, $services_query);

    if($services_query_run)
    {
        $_SESSION['success'] = "Новая услуга добавлена";
        header('Location: services.php');
    }
    else
    {
        $_SESSION['status'] = "Новая услуга не добавлена";
        header('Location: services.php');
    }
}

if(isset($_POST['services_update_btn']))
{
    $idservice = $_POST['idservice'];
    $id_type = $_POST['id_type'];
    $service = $_POST['service'];
    $cost = $_POST['cost'];

    $query = "UPDATE service SET id_type='$id_type', service='$service', cost='$cost'  WHERE idservice='$idservice' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Услуга обновлена";
            header('Location: services.php');
    }
    else
    {
        $_SESSION['status'] = "Усуга не обновлена";
            header('Location: services.php');
    }
}

if(isset($_POST['service_delete_btn']))
{
    $id = $_POST['service_delete_id'];

    $query = "DELETE FROM service WHERE idservice ='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Услуга удалена";
        header("Location: avto.php");
    }
    else
    {
        $_SESSION['status'] = "Услуга не удалена";
        header("Location: avto.php");
    }
}

//Авто
if(isset($_POST['add_avto']))
{
    $number = $_POST['number'];
    $VIN = $_POST['VIN'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $mileage = $_POST['mileage'];

    $avto_query = "INSERT INTO auto (number, VIN, model, year, mileage) VALUES ('$number', '$VIN', '$model', '$year', '$mileage')";
    $avto_query_run = mysqli_query($connection, $avto_query);

    if($avto_query_run)
    {
        $_SESSION['success'] = "Новый автомобиль добавлен";
        header('Location: avto.php');
    }
    else
    {
        $_SESSION['status'] = "Новый автомобиль не добавлен";
        header('Location: avto.php');
    }
}

if(isset($_POST['avto_update_btn']))
{
    $idauto = $_POST['idauto'];
    $number = $_POST['number'];
    $VIN = $_POST['VIN'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $mileage = $_POST['mileage'];

    $query = "UPDATE auto SET number='$number', VIN='$VIN', model='$model', year='$year', mileage='$mileage'  WHERE idauto='$idauto' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Автомобиль обновлен";
            header('Location: avto.php');
    }
    else
    {
        $_SESSION['status'] = "Автомобиль не обновлен";
            header('Location: avto.php');
    }
}

if(isset($_POST['avto_delete_btn']))
{
    $id = $_POST['avto_delete_id'];

    $query = "DELETE FROM auto WHERE idauto='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Автомобиль удален";
        header("Location: avto.php");
    }
    else
    {
        $_SESSION['status'] = "Автомобиль не удален";
        header("Location: avto.php");
    }
}

//Тип услуги
if(isset($_POST['add_servicetype']))
{
    $service_type = $_POST['service_type'];

    $query = "INSERT INTO servicetype (type) VALUES ('$service_type')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Тип услуги добавлен";
        header('Location: servicetype.php');
    }
    else
    {
        $_SESSION['status'] = "Тип услуги не добавлен";
        header('Location: servicetype.php');
    }
}

if(isset($_POST['service_update_btn']))
{
    $edit_id = $_POST['edit_id'];
    $edit_type = $_POST['edit_type'];

    $query = "UPDATE servicetype SET type='$edit_type' WHERE id_type='$edit_id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Тип услуги обновлен";
            header('Location: servicetype.php');
    }
    else
    {
        $_SESSION['status'] = "Тип услуги не обновлен";
            header('Location: servicetype.php');
    }
}

if(isset($_POST['service_delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM servicetype WHERE id_type='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Тип услуги удален";
        header("Location: servicetype.php");
    }
    else
    {
        $_SESSION['status'] = "Тип услуги не удален";
        header("Location: servicetype.php");
    }
}
?>