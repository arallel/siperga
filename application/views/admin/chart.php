<?php
$golput = $this->db->query("SELECT COUNT(id) id FROM user WHERE status='0' AND level='user'")->result_array();
$paslon1 = $this->db->query("SELECT pemilih id FROM paslon WHERE no_kandidat='1'")->result_array();
$paslon2 = $this->db->query("SELECT pemilih id FROM paslon WHERE no_kandidat='2'")->result_array();
$paslon3 = $this->db->query("SELECT pemilih id FROM paslon WHERE no_kandidat='3'")->result_array();

?>

<script>
    "use strict";
    var golput = <?php echo $golput[0]['id']?>;
    var paslon1 = <?php if($paslon1 == null){ echo "0"; }else{ echo $paslon1[0]['id']; } ?>;
    var paslon2 = <?php if($paslon2 == null){ echo "0"; }else{ echo $paslon2[0]['id']; } ?>;
    var paslon3 = <?php if($paslon3 == null){ echo "0"; }else{ echo $paslon3[0]['id']; } ?>;
    var total = paslon1 + paslon2 + paslon3;

    var ctx = document.getElementById("chart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Mencoblos", "Golput"],
            datasets: [{
                label: ' Jumlah memilih',
                data: [total, golput],
                borderWidth: 2,
                backgroundColor: ['#e63946', '#1d3557'],
                borderColor: ['#e63946', '#1d3557'],
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        drawBorder: false,
                        color: '#f2f2f2',
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: 100
                    }
                }],
                xAxes: [{
                    ticks: {
                        display: false
                    },
                    gridLines: {
                        display: false
                    }
                }]
            },
        }
    });

    var ctx = document.getElementById("chart2").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    paslon1,
                    paslon2, 
                    paslon3
                ],
                backgroundColor: [
                    '#191d21',
                    '#63ed7a',
                    '#ffa426',
                ],
                label: 'Dataset 1'
            }],
            labels: [
                'Kandidat 1',
                'Kandidat 2',
                'Kandidat 3'
            ],
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            },
        }
    });
</script>


