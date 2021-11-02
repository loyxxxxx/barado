<style>

#date_recent_recycled
{
    font-size: 10px;
}
#content
{
    width: 90%;
    margin: auto;
}
</style>
<?php $__env->startSection('content'); ?>
<div class="content text-center">
  <h4>BARADO: MONITORING SYSTEM</h4>
</div>


    <div class="container">
    <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-chart-bar-32 text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Total Trash Collected</p>
                                    <?php if($totalWaterLevelValue == null): ?>
                                    <p class="card-title">No Record</p>
                                    <?php else: ?>
                                    <p id="total_amount" class="card-title"><?php echo e(round($totalWaterLevelValue,2)); ?> kg </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-chart-bar-32 text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Current Trash Weight</p>
                                    <?php if($totalAmountThisDay == null): ?>
                                    <p class="card-title">No Record</p>	
                                    <?php else: ?>
                                    <p class="card-title"><?php echo e($totalAmountThisDay->loadcell_value); ?> kg </p>
                                    <p><small id="date_recent_recycled" class="text-muted"><?php echo e($mostrecentwaterlevelvalue->created_at->format('F j, Y h:i:s A')); ?></small></p>
                                    <?php endif; ?>	
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6"	>
            	<?php if($mostrecentwaterlevelvalue->water_level_value<500): ?>
                <div class="card card-stats" style="background-color: green">
                <?php elseif($mostrecentwaterlevelvalue->water_level_value>=500 && $mostrecentwaterlevelvalue->water_level_value<=1000): ?>
                <div class="card card-stats" style="background-color: yellow">
                <?php else: ?>
                <div class="card card-stats" style="background-color: red">
                <?php endif; ?>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-chart-bar-32 text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8" >
                                <div class="numbers">
                                    <p class="card-category">Current Water Level</p>
                                    <?php if($mostrecentwaterlevelvalue == null): ?>
                                    <p class="card-title">No Record</p>                     
                                    <?php else: ?>
                                    <p class="card-title"><?php echo e($mostrecentwaterlevelvalue->water_level_value); ?> m </p> 
                                    <p><small id="date_recent_recycled" class="text-muted"><?php echo e($mostrecentwaterlevelvalue->created_at->format('F j, Y h:i:s A')); ?></small></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-md-12">
            <div class="card card-chart">
                    <div class="card-header">
                            <h5 class="card-title">Water level statistics</h5>
                            <p class="card-category">Amount of water collected from start to present</p>
                    </div>

                    <div class="card-body">

                    <canvas id="myChart"></canvas>
                      
                       
                    </div>

                    <div class="card-footer">
                        <!-- <div class="chart-legend">
                                <i class="fa fa-circle text-info"></i> tubig init xd
                                <i class="fa fa-circle text-warning"></i> tubig bugnaw xd
                        </div> -->
                        <hr />
                            <div class="card-stats">
                                <i class="fa fa-check"></i> Information accumulated from database
                            </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-md-12">
            <div class="card card-chart">
                    <div class="card-header">
                            <h5 class="card-title">Load Cell statistics</h5>
                            <p class="card-category">Load Cell   from start to present</p>
                    </div>

                    <div class="card-body">

                    <canvas id="myChart2"></canvas>
                      
                       
                    </div>

                    <div class="card-footer">
                        <!-- <div class="chart-legend">
                                <i class="fa fa-circle text-info"></i> tubig init xd
                                <i class="fa fa-circle text-warning"></i> tubig bugnaw xd
                        </div> -->
                        <hr />
                            <div class="card-stats">
                                <i class="fa fa-check"></i> Information accumulated from database
                            </div>
                    </div>
            </div>
        </div>
    </div>

<div class="container">
        <div class="col-md-12">
            <div class="card card-chart">
            <div class="card-header text-info">
                <h4 class="title">List of water data</h4>
                <p class="category">All water data records</p>
            </div>
            <div class="table-responsive">
                <table class="table" id="myTable">
                        <thead>
                            <tr>
                            <th scope="col">water level value</th>
                            <th scope="col">load cell value</th>
                            <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $all_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                            <td scope="row"><?php echo e($data->water_level_value); ?> mL</td>
                            <td scope="row"><?php echo e($data->loadcell_value); ?></td>
                            <td><?php echo e($data->created_at->format('M j, Y - h:i:s A')); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                 </table>
            </div>
            </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
    $('#myTable').DataTable(
        {
        });
    
    } );
    </script>

<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
window.onload = function() {
  var ctx = document.getElementById("myChart");
  var ctx2 = document.getElementById("myChart2");

  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [],
      datasets: [{
        label: 'water amount',
        data: [],
        borderWidth: 1,
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
      }]
    },
    options: {
      scales: {
        xAxes: [],
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });

  var myChart2 = new Chart(ctx2, {
    type: 'line',
    data: {
      labels: [],
      datasets: [{
        label: 'water amount',
        data: [],
        borderWidth: 1,
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
      }]
    },
    options: {
      scales: {
        xAxes: [],
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
  
var updateChart = function() {
    $.ajax({
      url: "<?php echo e(route('api.chart')); ?>",
      type: 'GET',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        
        myChart.data.labels = data.labels;
        myChart.data.datasets[0].data = data.data;
        myChart.update();

        myChart2.data.labels = data.labels;
        myChart2.data.datasets[0].data = data.data2;
        myChart2.update();

      },
      error: function(data){
        console.log(data);
      }
    });
  }
  
  updateChart();
  setInterval(() => {
    updateChart();
  }, 1000);
}

</script>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp 7.2\htdocs\safe2iot\resources\views/dashboard.blade.php ENDPATH**/ ?>