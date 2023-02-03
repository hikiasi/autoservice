<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="addservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавить новую услугу</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">

                <div class="modal-body">

                    <?php
                    
                        $servicetype = "SELECT * from servicetype";
                        $servicetype_run = mysqli_query($connection, $servicetype);

                        if(mysqli_num_rows($servicetype_run) > 0)
                        {
                            ?>
                            <div class="form-group">
                                <label> Категория услуги </label>
                                <select name="id_type" class="form-control" required>
                                    <option value="">Выберите категорию услуг</option>
                                        <?php
                                            foreach($servicetype_run as $row)
                                            {
                                        ?>
                                    <option value="<?php echo $row['id_type']; ?>"><?php echo $row['type']; ?></option>
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
                        <label> Услуга </label>
                        <input type="text" name="service" class="form-control" placeholder="Введите название услуги" required>
                    </div>

                    <div class="form-group">
                        <label> Стоимость </label>
                        <input type="text" name="cost" class="form-control" placeholder="Введите стоимость услуги" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="submit" name="add_service"class="btn btn-primary">Добавить</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Услуги
            <button type="button" class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#addservice">
                Добавить новую услугу
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
            
            $query = "SELECT * FROM `service`";
            $query_run = mysqli_query($connection, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                ?>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID услуги</th>
                        <th>Категория услуги</th>
                        <th>Услуга</th>
                        <th>Стоимость, руб.</th>
                        <th>Изменить</th>
                        <th>Удалить</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                            $id_type = $row['id_type'];
                            $type = "SELECT * FROM servicetype WHERE id_type='$id_type' ";
                            $type_run = mysqli_query($connection, $type);
                    ?>
                        <tr>
                            <td><?php echo $row['idservice'] ?></td>
                            <td>
                                <?php 
                                    foreach($type_run as $type_row)
                                    {
                                        echo $type_row['type'];
                                    } 
                                ?>
                            </td>
                            <td><?php echo $row['service'] ?></td>
                            <td><?php echo $row['cost'] ?></td>
                            <td>
                                <form action="service_edit.php" method="POST">
                                    <input type="hidden" name="service_edit_id" value=" <?php echo $row['idservice'] ?>" >
                                    <button type="submit" name="service_edit_data_btn" class="btn btn-success">Изменить</button>
                                </form>
                            </td>
                            <td>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="service_delete_id" value="<?php echo $row['idservice'] ?>">
                                    <button type="submit" name="service_delete_btn" class="btn btn-danger">Удалить</button>
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