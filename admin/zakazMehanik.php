<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>



<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Заказы механика
            </h3>
        </div>
    </div>

    <div class="card-body">
        <?php
        if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
            echo '<h2 class="bg-primary text-white"> ' . $_SESSION['success'] . ' </h2>';
            unset($_SESSION['success']);
        }

        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
            echo '<h2 class="bg-danger text-white"> ' . $_SESSION['status'] . ' </h2>';
            unset($_SESSION['status']);
        }

        ?>

        <form action="mehanik_print.php" method="POST">
            <?php

            $worker = "SELECT * from worker";
            $worker_run = mysqli_query($connection, $worker);

            if (mysqli_num_rows($worker_run) > 0) {
            ?>
                <div class="form-group">
                    <label> Механик </label>
                    <select name="idworker" class="form-control" required>
                        <option value="">Выберите механика</option>
                        <?php
                        foreach ($worker_run as $row) {
                        ?>
                            <option value="<?php echo $row['idworker']; ?>"><?php echo $row['worker']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="modal-footer">
                        <button type="submit" name="mehanik_btn" class="btn btn-primary">Сформировать отчет</button>
                    </div>
                </div>
            <?php
            } else {
                echo "Данных не найдено";
            }
            ?>
        </form>

    </div>
</div>
</div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>