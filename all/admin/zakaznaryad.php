<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>



<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Заказ-наряд
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
                        <th>Сформировать заказ наряд</th>
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
                                <form action="print.php" method="POST">
                                    <input type="hidden" name="idorderclient_id_print" value="<?php echo $row['idorderclient'] ?>">
                                    <button type="submit" name="idorderclient_zakaz_naryad_btn" class="btn btn-info">Заказ-наряд</button>
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