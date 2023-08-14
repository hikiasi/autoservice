<script>
    (Chart.defaults.global.defaultFontFamily = "Nunito"),
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = "#858796";

    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [<?php while ($a = mysqli_fetch_array($status_category)) {
                echo '"' . $a['status'] . '",';
              } ?>],
            datasets: [{
                data: [<?php while ($b = mysqli_fetch_array($status_amt)) {
                echo '"' . $b['count(orderclient.idstatus)'] . '",';
              } ?>],
                backgroundColor: ['#fe5f75', '#6886fd', '#5ffe98', '#985ffe'],
                hoverBackgroundColor: ['#fe5f75cc', '#6886fdcc', '#5ffe98cc', '#985ffecc'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>