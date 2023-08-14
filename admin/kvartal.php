<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>



<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Квартал
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

        <form action="kvartal_print.php" method="POST">

            <div class="form-group">
                <label> Квартал </label>
                <select name="kvartalSelect" class="form-control" required>
                    <option value="">Выберите квартал</option>
                    <option value="DATE_FORMAT(NOW(), '%Y-01-01') AND DATE_FORMAT(NOW(), '%Y-03-31')" class="firstKv">1-ый квартал</option>
                    <option value="DATE_FORMAT(NOW(), '%Y-04-01') AND DATE_FORMAT(NOW(), '%Y-06-30')" class="secondKv">2-ой квартал</option>
                    <option value="DATE_FORMAT(NOW(), '%Y-07-01') AND DATE_FORMAT(NOW(), '%Y-09-30')" class="thirdKv">3-ый квартал</option>
                    <option value="DATE_FORMAT(NOW(), '%Y-10-01') AND DATE_FORMAT(NOW(), '%Y-12-31')" class="fourthKv">4-ый квартал</option>
                </select>
                <div class="modal-footer">
                    <button type="submit" name="kvartal_btn" class="btn btn-primary">Сформировать отчет</button>
                </div>
            </div>
            <input type="hidden" name="kvartalText" id="kvartalText">
        </form>

    </div>
    </form>
</div>
</div>
</div>
<script>
    const kvartalSelect = document.querySelector('select[name="kvartalSelect"]');
    const kvartalText = document.querySelector('#kvartalText');

    kvartalSelect.addEventListener('change', () => {
        const selectedOption = kvartalSelect.options[kvartalSelect.selectedIndex];
        kvartalText.value = selectedOption.text;
    });
</script>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>