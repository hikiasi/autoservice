<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>



<div class="modal fade" id="addrabotnik" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавить мастера</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label> ФИО мастера </label>
                        <input type="text" name="worker" class="form-control" placeholder="Введите ФИО мастера" required>
                    </div>

                    <div class="form-group">
                        <label> Номер мастера </label>
                        <input type="text" name="phone" class="form-control" placeholder="Введите номер телефона" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="submit" name="add_rabotnik"class="btn btn-primary">Добавить</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Мастера
            <button type="button" class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#addrabotnik">
                Добавить нового мастера
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
            
            $query = "SELECT * FROM `worker`";
            $query_run = mysqli_query($connection, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                ?>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Мастера</th>
                        <th>ФИО мастера</th>
                        <th>Телефон мастера</th>
                        <th>Изменить</th>
                        <th>Удалить</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                    ?>
                        <tr>
                            <td><?php echo $row['idworker'] ?></td>
                            <td><?php echo $row['worker'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td>
                                <form action="rabonik_edit.php" method="POST">
                                    <input type="hidden" name="idworker" value=" <?php echo $row['idworker'] ?>" >
                                    <button type="submit" name="worker_data_btn" class="btn btn-success">Изменить</button>
                                </form>
                            </td>
                            <td>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="worker_delete_id" value="<?php echo $row['idworker'] ?>">
                                    <button type="submit" name="worker_delete_btn" class="btn btn-danger">Удалить</button>
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