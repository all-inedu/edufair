<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin/template/header'); ?>
</head>

<body class="sb-nav-fixed">
    <?php $this->load->view('admin/template/navbar'); ?>
    <div id="layoutSidenav">
        <?php $this->load->view('admin/template/sidebar'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">
                                    Student
                                    <div class="float-right badge badge-warning px-3 py-1">
                                        <span id="stCount"></span>
                                        <span id="stPercent"></span>
                                    </div>
                                </div>
                                <div class=" card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link"
                                        href="<?=base_url('dashboard/admin/user/student');?>">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">
                                    Parent
                                    <div class="float-right badge badge-warning px-3 py-1">
                                        <span id="prCount"></span>
                                        <span id="prPercent"></span>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link"
                                        href="<?=base_url('dashboard/admin/user/parent');?>">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body">
                                    Teacher/Counselor
                                    <div class="float-right badge badge-warning px-3 py-1">
                                        <span id="tcCount"></span>
                                        <span id="tcPercent"></span>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link"
                                        href="<?=base_url('dashboard/admin/user/teacher');?>">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area mr-1"></i>
                                    Registrant
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar mr-1"></i>
                                    Lead
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar mr-1"></i>
                                    Booking Topic
                                </div>
                                <div class="card-body"><canvas id="topicChart" width="100%" height="40"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar mr-1"></i>
                                    Booking Consultation
                                </div>
                                <div class="m-2">
                                    <select name="uni_id" id="uniConsult" class="form-control form-control-sm">
                                        <option value="" selected disabled>Select University Name</option>
                                        <?php foreach ($uni as $u):?>
                                        <option value="<?=$u['uni_id'];?>"><?=$u['uni_name'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="card-body"><canvas id="consultChart" width="100%" height="31"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php $this->load->view('admin/template/footer'); ?>
</body>
<script>
// student 
$.ajax({
    type: 'get',
    dataType: "json",
    url: "<?=base_url('api/participant/student');?>",
    success: function(datas) {
        $('#stCount').html(datas.status);
        $('#stPercent').html("(" + datas.percentage + ")");
    }
});

// parent 
$.ajax({
    type: 'get',
    dataType: "json",
    url: "<?=base_url('api/participant/parent');?>",
    success: function(datas) {
        $('#prCount').html(datas.status);
        $('#prPercent').html("(" + datas.percentage + ")");
    }
});

// teacher 
$.ajax({
    type: 'get',
    dataType: "json",
    url: "<?=base_url('api/participant/teacher');?>",
    success: function(datas) {
        $('#tcCount').html(datas.status);
        $('#tcPercent').html("(" + datas.percentage + ")");
    }
});


// Registrant 
let tot = []
let date = []
$.ajax({
    type: 'get',
    dataType: "json",
    url: "<?=base_url('api/registrant');?>",
    success: function(datas) {
        $.each(datas, function(index, data) {
            tot.push(data.tot)
            date.push(data.date)
        });

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily =
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: date,
                datasets: [{
                    label: "Registrant",
                    lineTension: 0.3,
                    backgroundColor: "rgba(2,117,216,0.2)",
                    borderColor: "rgba(2,117,216,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    pointHitRadius: 50,
                    pointBorderWidth: 2,
                    data: tot,
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            maxTicksLimit: 7,
                            fontSize: 10,
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            display: true,
                            precision: 0,
                            beginAtZero: true
                        },
                        gridLines: {
                            color: "rgba(0, 0, 0, .125)",
                        }
                    }],
                },
                legend: {
                    display: false
                }
            }
        });
    }
});

let userTot = [];
let userLead = [];
$.ajax({
    type: 'get',
    dataType: "json",
    url: "<?=base_url('api/user/lead');?>",
    success: function(datas) {
        $.each(datas, function(index, data) {
            userTot.push(data.tot)
            userLead.push(data.user_know_from)
        });

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily =
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        // Bar Chart Example
        var ctx = document.getElementById("myBarChart");
        var myLineChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
                labels: userLead,
                datasets: [{
                    label: "User",
                    backgroundColor: "rgba(2,117,216,1)",
                    borderColor: "rgba(2,117,216,1)",
                    data: userTot,
                }],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            fontSize: 10,
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            display: true,
                            precision: 0,
                            beginAtZero: true
                        }
                    }],
                },
                legend: {
                    display: false,
                }
            }
        });

    }
});


// User Booking Topic 
let userJoinTopic = []
let userCancelTopic = []
let userTopic = []
$.ajax({
    type: 'get',
    dataType: "json",
    url: "<?=base_url('api/user/topic');?>",
    success: function(datas) {
        // console.log(datas)
        $.each(datas, function(index, data) {
            userTopic.push(data.topic_name)
            $.each(data.join, function(index, j) {
                userJoinTopic.push(j.tot)
            });
            $.each(data.cancel, function(index, c) {
                userCancelTopic.push(c.tot)
            });
        });

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily =
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        // Bar Chart Example
        var ctx = document.getElementById("topicChart");
        var myLineChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
                labels: userTopic,
                datasets: [{
                        label: "Join",
                        backgroundColor: "rgb(61, 173, 13)",
                        borderColor: "rgb(61, 173, 13)",
                        data: userJoinTopic,
                    },
                    {
                        label: "Cancel",
                        backgroundColor: "rgb(137, 28, 6)",
                        borderColor: "rgb(137, 28, 6)",
                        data: userCancelTopic,
                    }
                ],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            fontSize: 10,
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            display: true,
                            precision: 0,
                            beginAtZero: true
                        }
                    }],
                },
                legend: {
                    display: false,
                }
            }
        });

    }
});

// Booking Consult 

$('#uniConsult').change(function() {
    let uniId = $(this).val();
    console.log(uniId)
    let userConsult = [];
    $.ajax({
        type: 'get',
        dataType: "json",
        url: "<?=base_url('api/user/consult/');?>" + uniId,
        success: function(datas) {
            $.each(datas.join, function(index, j) {
                userConsult.push(j.tot)
            });
            $.each(datas.cancel, function(index, c) {
                userConsult.push(c.tot)
            });

            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily =
                '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';

            // Pie Chart Example
            var ctx = document.getElementById("consultChart");
            var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Join", "Cancel"],
                    datasets: [{
                        data: userConsult,
                        backgroundColor: ['#007bff', '#dc3545', '#ffc107',
                            '#28a745'
                        ],
                    }],
                },
            });
        }
    });
});
</script>

</html>