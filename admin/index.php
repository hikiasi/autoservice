<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
$status_category = mysqli_query($connection, "SELECT status FROM orderclient, status where (orderclient.idstatus = status.idstatus) GROUP BY status;");
$status_amt = mysqli_query($connection, "SELECT count(orderclient.idstatus), status FROM orderclient, status where (orderclient.idstatus = status.idstatus) GROUP BY status;");

$exp_date_line = mysqli_query($connection, "SELECT dateorder, idstatus FROM orderclient where idstatus = '3'  GROUP BY dateorder");
$exp_cost_line = mysqli_query($connection, "SELECT sum(cost), orderclient.dateorder, orderclient.idstatus FROM serviceorder, orderclient, service WHERE (idstatus = '3') and (serviceorder.idorderclient = orderclient.idorderclient) and (serviceorder.idservice = service.idservice) GROUP BY dateorder;");
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>


            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">


                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
                        <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Выход
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Панель управления</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Прибыль (за месяц)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        require 'security.php';

                                        $query_all_month = "SELECT orderclient.idorderclient, SUM(cost) as totalcost, dateorder, idstatus FROM serviceorder, orderclient, service WHERE (dateorder BETWEEN DATE_FORMAT(NOW(), \"%Y-%m-01\") AND LAST_DAY(NOW())) AND (idstatus = '3') AND (serviceorder.idorderclient = orderclient.idorderclient) AND (serviceorder.idservice = service.idservice) GROUP BY orderclient.idorderclient, dateorder, idstatus";
                                        $query_all_month_run = mysqli_query($connection, $query_all_month);

                                        $num_rows = mysqli_num_rows($query_all_month_run);

                                        if ($num_rows > 0) {
                                            $row = mysqli_fetch_all($query_all_month_run, MYSQLI_ASSOC);
                                            foreach ($row as $rows) {
                                                echo $rows['totalcost'] . "₽";
                                            }
                                        } else {
                                            echo "0₽";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Прибыль (за все время)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        require 'security.php';

                                        $query_all = "SELECT sum(cost) as SUMCOST FROM serviceorder, orderclient, service where (serviceorder.idorderclient = orderclient.idorderclient) and (serviceorder.idservice = service.idservice) and (idstatus = '3')";
                                        $query_all_run = mysqli_query($connection, $query_all);

                                        $row = mysqli_fetch_all($query_all_run, MYSQLI_ASSOC);

                                        foreach ($row as $rows) {

                                            echo $rows['SUMCOST'] . "₽";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Текущих заказов</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        require 'security.php';

                                        $query = "SELECT * FROM `orderclient` where `idstatus` NOT IN (3,4)";
                                        $query_run = mysqli_query($connection, $query);

                                        $row = mysqli_num_rows($query_run);

                                        echo $row;
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Прибыль по месяцам (за весь год)</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Статистика заказов</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-one"></i> В работе
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-two"></i> Новый
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-three"></i> Завершен
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-four"></i> Отменен
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


    <?php
    include('includes/scripts.php');
    include('includes/chart-area.php');
    include('includes/chart-pie.php');
    include('includes/footer.php');
    ?>