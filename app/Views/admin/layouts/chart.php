<style>
    .card-title,li,p{
        color: white;
    }
</style>
<div style="background-color: rgb(71,79,87)" class="card">
    <div class="card-header">
        <h3 class="card-title">Thống kê</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <!--<button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>-->
        </div>
    </div>

    <div class="card-body" style="background-color: #f4f6f9">
        <div class="row">
            <p style="color: black">Hợp đồng</p>
            <div class="col-md-4">
                <div class="chart-responsive"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="pieChart" ></canvas>
                </div>

            </div>
        </div>
        <div class="row">

        </div>
    </div>

</div>

<?php
$working =  \Utils\Util::countHopDongDangThucHien();
$done =  \Utils\Util::countHopDongHoanThanh();
$notWorking =  \Utils\Util::countHopDongChuaThucHien();
$admin =  \Utils\Util::countUserAdmin();
$manager =  \Utils\Util::countUserManager();
$user =  \Utils\Util::countUsers();
?>
<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Chart.js code to create a pie chart
    var ctx = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Đã Hoàn Thành', 'Đang Thực Hiện', 'Tạm Dừng'],
            datasets: [{
                data: [<?php echo $done?>, <?php echo $working?>, <?php echo $notWorking ?> ], // Example data, you should replace it with your actual data
                backgroundColor: [
                    'rgba(0, 255, 0, 0.6)',
                    'rgba(255, 255, 0, 0.6)',
                    'rgba(255, 0, 0, 0.6)',
                ]
            }]
        },
        options: {
            responsive: true,
            cutoutPercentage: 70, // Adjust the cutoutPercentage value to control the size of the hole
            // You can also customize other options as needed
        }
    });

    // CSS style to change label color to white
    var legendItems = document.querySelectorAll('#pieChart .chartjs-render-monitor ul li span');
    for (var i = 0; i < legendItems.length; i++) {
        legendItems[i].style.color = 'white';
    }
</script>


<script>
    // Chart.js code to create a pie chart
    var ctx = document.getElementById('Chart').getContext('2d');
    var Chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Admin', 'Manager', 'User'],
            datasets: [{
                data: [<?php echo $admin?>, <?php echo $manager?>, <?php echo $user ?> ], // Example data, you should replace it with your actual data
                backgroundColor: [
                    'rgba(0, 255, 0, 0.6)',
                    'rgba(255, 255, 0, 0.6)',
                    'rgba(255, 0, 0, 0.6)',
                ]
            }]
        },
        options: {
            responsive: true,
            cutoutPercentage: 70, // Adjust the cutoutPercentage value to control the size of the hole
            // You can also customize other options as needed
        }
    });
</script>