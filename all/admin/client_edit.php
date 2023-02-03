<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="m-0 font-weight-bold text-primary">
                Клиент редактирование
            </h3>
        </div>
    </div>
    <div class="card-body">

    <?php
    if(isset($_POST['client_data_btn']))
    {
        $id = $_POST['client_id'];

        $query = "SELECT * FROM client WHERE idclient='$id' ";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $row)
        {
    ?>

        <form action="code.php" method="POST">
            <input type="hidden" name="idclient" value="<?php echo $row['idclient']?>">

            <div class="form-group">
                <label> ФИО Клиента </label>
                <input type="text" name="client" value="<?php echo $row['client']?>" class="form-control">
            </div>

            <div class="form-group">
                <label> Номер телефона </label>
                <input type="text" name="phone" value="<?php echo $row['phone']?>" class="form-control">
            </div>

            <a href="client.php" class="btn btn-danger"> Отменить </a>
            <button type="submit" name="client_update_btn" class="btn btn-primary"> Обновить </button>
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