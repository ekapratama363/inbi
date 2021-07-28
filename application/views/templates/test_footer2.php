<?php
    $this->db->select("id_user,grup_user");
    $dataChart = $this->db->get("users")->result();

    foreach($dataChart as $k => $v)
    {
        $arrChart[] = ['label' => $v->id_user, 'y' => $v->grup_user];
       // print_r(json_encode($arrChart, JSON_NUMERIC_CHECK));die();
    }
?>

<script src="<?= base_url('assets2/');?>vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('assets2/');?>vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url('assets2/');?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets2/');?>assets/js/main.js"></script>
    <!--  Chart js -->
    <script src="<?= base_url('assets2/');?>vendors/chart.js/dist/Chart.bundle.min.js"></script>
    
    <script type="text/javascript">
            //Team chart
            var ctx = document.getElementById( "team-chart" );
            ctx.height = 150;
            var myChart = new Chart( ctx, {
                type: 'line',
                data: {
                    labels: [ <?= json_encode($dataChart, JSON_NUMERIC_CHECK) ;?> ],
                    type: 'line',
                    defaultFontFamily: 'Montserrat',
                    datasets: [ {
                        data: [ 0, 7, 3, 5, 2, 10, 7 ],
                        label: "Expense",
                        backgroundColor: 'rgba(0,103,255,.15)',
                        borderColor: 'rgba(0,103,255,0.5)',
                        borderWidth: 3.5,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointBorderColor: 'transparent',
                        pointBackgroundColor: 'rgba(0,103,255,0.5)',
                            }, ]
                },
                options: {
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                        titleFontSize: 12,
                        titleFontColor: '#000',
                        bodyFontColor: '#000',
                        backgroundColor: '#fff',
                        titleFontFamily: 'Montserrat',
                        bodyFontFamily: 'Montserrat',
                        cornerRadius: 3,
                        intersect: false,
                    },
                    legend: {
                        display: false,
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            fontFamily: 'Montserrat',
                        },


                    },
                    scales: {
                        xAxes: [ {
                            display: true,
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            scaleLabel: {
                                display: false,
                                labelString: 'Month'
                            }
                                } ],
                        yAxes: [ {
                            display: true,
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Value'
                            }
                                } ]
                    },
                    title: {
                        display: false,
                    }
                }
            } );
    </script>

</body>

</html>
