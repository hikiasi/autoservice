    <?php
    include('security.php');
    $status_category = mysqli_query($connection, "SELECT orderclient.idorderclient, orderclient.idstatus, status FROM orderclient, status where (orderclient.idstatus = status.idstatus) GROUP BY status;");
    $status_amt = mysqli_query($connection, "SELECT orderclient.idorderclient, count(orderclient.idstatus), status FROM orderclient, status where (orderclient.idstatus = status.idstatus) GROUP BY status;");

    $exp_date_line = mysqli_query($connection, "SELECT dateorder, idstatus FROM orderclient where idstatus = '3'  GROUP BY dateorder");
    $exp_cost_line = mysqli_query($connection, "SELECT orderclient.idorderclient, serviceorder.idservice, sum(cost), dateorder, idstatus FROM serviceorder, orderclient, service where (idstatus = '3') and (serviceorder.idorderclient = orderclient.idorderclient) and (serviceorder.idservice = service.idservice) GROUP BY dateorder;");
    ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>

    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- <script src="js/demo/chart-area-demo.js"></script> -->
    <!-- <script src="js/demo/chart-pie-demo.js"></script> -->

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                language: {
                    "processing": "Подождите...",
                    "search": "Поиск:",
                    "lengthMenu": "Показать _MENU_ записей",
                    "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                    "infoEmpty": "Записи с 0 до 0 из 0 записей",
                    "infoFiltered": "(отфильтровано из _MAX_ записей)",
                    "loadingRecords": "Загрузка записей...",
                    "zeroRecords": "Записи отсутствуют.",
                    "emptyTable": "В таблице отсутствуют данные",
                    "paginate": {
                        "first": "Первая",
                        "previous": "Предыдущая",
                        "next": "Следующая",
                        "last": "Последняя"
                    },
                    "aria": {
                        "sortAscending": ": активировать для сортировки столбца по возрастанию",
                        "sortDescending": ": активировать для сортировки столбца по убыванию"
                    },
                    "select": {
                        "rows": {
                            "_": "Выбрано записей: %d",
                            "1": "Выбрана одна запись"
                        },
                        "cells": {
                            "1": "1 ячейка выбрана",
                            "_": "Выбрано %d ячеек"
                        },
                        "columns": {
                            "1": "1 столбец выбран",
                            "_": "%d столбцов выбрано"
                        }
                    },
                    "searchBuilder": {
                        "conditions": {
                            "string": {
                                "startsWith": "Начинается с",
                                "contains": "Содержит",
                                "empty": "Пусто",
                                "endsWith": "Заканчивается на",
                                "equals": "Равно",
                                "not": "Не",
                                "notEmpty": "Не пусто",
                                "notContains": "Не содержит",
                                "notStarts": "Не начинается на",
                                "notEnds": "Не заканчивается на"
                            },
                            "date": {
                                "after": "После",
                                "before": "До",
                                "between": "Между",
                                "empty": "Пусто",
                                "equals": "Равно",
                                "not": "Не",
                                "notBetween": "Не между",
                                "notEmpty": "Не пусто"
                            },
                            "number": {
                                "empty": "Пусто",
                                "equals": "Равно",
                                "gt": "Больше чем",
                                "gte": "Больше, чем равно",
                                "lt": "Меньше чем",
                                "lte": "Меньше, чем равно",
                                "not": "Не",
                                "notEmpty": "Не пусто",
                                "between": "Между",
                                "notBetween": "Не между ними"
                            },
                            "array": {
                                "equals": "Равно",
                                "empty": "Пусто",
                                "contains": "Содержит",
                                "not": "Не равно",
                                "notEmpty": "Не пусто",
                                "without": "Без"
                            }
                        },
                        "data": "Данные",
                        "deleteTitle": "Удалить условие фильтрации",
                        "logicAnd": "И",
                        "logicOr": "Или",
                        "title": {
                            "0": "Конструктор поиска",
                            "_": "Конструктор поиска (%d)"
                        },
                        "value": "Значение",
                        "add": "Добавить условие",
                        "button": {
                            "0": "Конструктор поиска",
                            "_": "Конструктор поиска (%d)"
                        },
                        "clearAll": "Очистить всё",
                        "condition": "Условие",
                        "leftTitle": "Превосходные критерии",
                        "rightTitle": "Критерии отступа"
                    },
                    "searchPanes": {
                        "clearMessage": "Очистить всё",
                        "collapse": {
                            "0": "Панели поиска",
                            "_": "Панели поиска (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Нет панелей поиска",
                        "loadMessage": "Загрузка панелей поиска",
                        "title": "Фильтры активны - %d",
                        "showMessage": "Показать все",
                        "collapseMessage": "Скрыть все"
                    },
                    "thousands": ",",
                    "buttons": {
                        "pageLength": {
                            "_": "Показать 10 строк",
                            "-1": "Показать все ряды"
                        },
                        "pdf": "PDF",
                        "print": "Печать",
                        "collection": "Коллекция <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                        "colvis": "Видимость столбцов",
                        "colvisRestore": "Восстановить видимость",
                        "copy": "Копировать",
                        "copyKeys": "Нажмите ctrl or u2318 + C, чтобы скопировать данные таблицы в буфер обмена.  Для отмены, щелкните по сообщению или нажмите escape.",
                        "copySuccess": {
                            "1": "Скопирована 1 ряд в буфер обмена",
                            "_": "Скопировано %ds рядов в буфер обмена"
                        },
                        "copyTitle": "Скопировать в буфер обмена",
                        "csv": "CSV",
                        "excel": "Excel"
                    },
                    "decimal": ".",
                    "infoThousands": ",",
                    "autoFill": {
                        "cancel": "Отменить",
                        "fill": "Заполнить все ячейки <i>%d<i><\/i><\/i>",
                        "fillHorizontal": "Заполнить ячейки по горизонтали",
                        "fillVertical": "Заполнить ячейки по вертикали"
                    },
                    "datetime": {
                        "previous": "Предыдущий",
                        "next": "Следующий",
                        "hours": "Часы",
                        "minutes": "Минуты",
                        "seconds": "Секунды",
                        "unknown": "Неизвестный",
                        "amPm": [
                            "AM",
                            "PM"
                        ],
                        "months": {
                            "0": "Январь",
                            "1": "Февраль",
                            "10": "Ноябрь",
                            "11": "Декабрь",
                            "2": "Март",
                            "3": "Апрель",
                            "4": "Май",
                            "5": "Июнь",
                            "6": "Июль",
                            "7": "Август",
                            "8": "Сентябрь",
                            "9": "Октябрь"
                        },
                        "weekdays": [
                            "Вс",
                            "Пн",
                            "Вт",
                            "Ср",
                            "Чт",
                            "Пт",
                            "Сб"
                        ]
                    },
                    "editor": {
                        "close": "Закрыть",
                        "create": {
                            "button": "Новый",
                            "title": "Создать новую запись",
                            "submit": "Создать"
                        },
                        "edit": {
                            "button": "Изменить",
                            "title": "Изменить запись",
                            "submit": "Изменить"
                        },
                        "remove": {
                            "button": "Удалить",
                            "title": "Удалить",
                            "submit": "Удалить",
                            "confirm": {
                                "_": "Вы точно хотите удалить %d строк?",
                                "1": "Вы точно хотите удалить 1 строку?"
                            }
                        },
                        "multi": {
                            "restore": "Отменить изменения",
                            "title": "Несколько значений",
                            "noMulti": "Это поле должно редактироватся отдельно, а не как часть групы"
                        },
                        "error": {
                            "system": "Возникла системная ошибка (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Подробнее<\/a>)"
                        }
                    },
                    "searchPlaceholder": "Что ищете?"
                }
            });
        });
    </script>

    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        (Chart.defaults.global.defaultFontFamily = "Nunito"),
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = "#858796";

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + "").replace(",", "").replace(" ", "");
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
                dec = typeof dec_point === "undefined" ? "." : dec_point,
                s = "",
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return "" + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || "").length < prec) {
                s[1] = s[1] || "";
                s[1] += new Array(prec - s[1].length + 1).join("0");
            }
            return s.join(dec);
        }

        const colors = {
            purple: {
                default: "rgba(254, 95, 117, 1)",
                half: "rgba(254, 95, 117, 0.5)",
                quarter: "rgba(254, 95, 117, 0.25)",
                zero: "rgb(254, 95, 117, 0)",
            },
            indigo: {
                default: "rgba(80, 102, 120, 1)",
                quarter: "rgba(80, 102, 120, 0.25)",
            },
        };
        // Area Chart Example
        var ctx = document.getElementById("myAreaChart").getContext('2d');
        gradient = ctx.createLinearGradient(0, 25, 0, 300);
        gradient.addColorStop(0, colors.purple.half);
        gradient.addColorStop(0.35, colors.purple.quarter);
        gradient.addColorStop(1, colors.purple.zero);
        var myLineChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: [<?php while ($c = mysqli_fetch_array($exp_date_line)) {
                                echo '"' . $c['dateorder'] . '",';
                            } ?>],
                datasets: [{
                    label: "Выручка",
                    lineTension: 0.3,
                    backgroundColor: gradient,
                    borderColor: "rgba(78, 115, 223, 1)",
                    borderColor: colors.purple.default,
                    pointRadius: 3,
                    pointBackgroundColor: colors.purple.default,
                    pointBorderColor: colors.purple.default,
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: colors.purple.default,
                    pointHoverBorderColor: colors.purple.default,
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    borderWidth: 2,
                    fill: true,
                    data: [<?php while ($d = mysqli_fetch_array($exp_cost_line)) {
                                echo '"' . $d['sum(cost)'] . '",';
                            } ?>],
                }, ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0,
                    },
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: "date",
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            maxTicksLimit: 7,
                        },
                    }, ],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value) + "₽" ;
                            },
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2],
                        },
                    }, ],
                },
                legend: {
                    display: false,
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: "#6e707e",
                    titleFontSize: 14,
                    borderColor: "#dddfeb",
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: "index",
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel =
                                chart.datasets[tooltipItem.datasetIndex].label || "";
                            return datasetLabel + ": "+ number_format(tooltipItem.yLabel) + "₽";
                        },
                    },
                },
            },
        });
    </script>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> -->