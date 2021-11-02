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
  <h4>SAFE2IOT: AUTOMATED WATER QUALITY FILTRATION SYSTEM USING IOT</h4>
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
                                    <p class="card-category">Total amount of recycled water</p>
                                    <?php if($totalAmountRecycledWater == null): ?>
                                    <p class="card-title">No Record</p>
                                    <?php else: ?>
                                    <p id="total_amount" class="card-title"><?php echo e($totalAmountRecycledWater); ?> mL </p>
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
                                    <p class="card-category">Amount of recycled water this day</p>
                                    <?php if($totalAmountRecycledDay == null): ?>
                                    <p class="card-title">No Record</p>
                                    <?php else: ?>
                                    <p class="card-title"><?php echo e($totalAmountRecycledDay); ?> mL </p>
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
                                    <p class="card-category">Most Recent Recycled Water</p>
                                    <?php if($mostrecentrecycledwater == null): ?>
                                    <p class="card-title">No Record</p>                     
                                    <?php else: ?>
                                    <p class="card-title"><?php echo e($mostrecentrecycledwater->amount); ?> mL </p> 
                                    <p><small id="date_recent_recycled" class="text-muted"><?php echo e($mostrecentrecycledwater->created_at->format('F j, Y h:i:s A')); ?></small></p>
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
                            <h5 class="card-title">Reclaimed water statistics</h5>
                            <p class="card-category">Amount of recycled water collected from start to present</p>
                    </div>

                    <div class="card-body">

                    <canvas id="myChart"></canvas>
                      
                         <!-- <?php echo $chart->container(); ?>

                        <?php echo $chart->script(); ?> -->
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

<div id="content" class="content">
    <div class="row">
             <div class="col-lg-4 col-md-6 col-sm-6">
             <div class="card-header text-info">
                <h4 class="title">Graywater tank info</h4>
                <p class="category">&nbsp;</p>
            </div>
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-tile-56 text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                <p class="card-category">Current amount of water inside tank</p>
                                    <p class="card-title"><?php echo e($graywater_data->graywater_amount); ?> mL</p>
                                </div>
                            </div>
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Available amount of water inside tank</p>
                                    <p class="card-title"><?php echo e($graywatertank_amount); ?> mL</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-6 col-sm-6">
            <div class="card-header text-info">
                <h4 class="title">List of water recycled</h4>
                <p class="category">All reclaimed water records</p>
            </div>
            <div class="table-responsive">
                <table class="table" id="myTable">
                        <thead>
                            <tr>
                            <th scope="col">Amount</th>
                            <th scope="col">Temperature</th>
                            <th scope="col">Turbidity</th>
                            <th scope="col">Ph level</th>
                            <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $reused_water_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reusedWater_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                            <td scope="row"><?php echo e($reusedWater_data->amount); ?> mL</td>
                            <td scope="row"><?php echo e($reusedWater_data->temp_value); ?> C</td>
                            <td scope="row"><?php echo e($reusedWater_data->turbidity_amount); ?> ntu</td>
                            <td scope="row"><?php echo e($reusedWater_data->ph_value); ?></td>
                            <td><?php echo e($reusedWater_data->created_at->format('M j, Y - h:i:s A')); ?></td>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
window.onload = function() {
  var ctx = document.getElementById("myChart");

  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [],
      datasets: [{
        label: 'water amount',
        data: [],
        borderWidth: 1
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




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\safe2iot\resources\views/dashboard.blade.php ENDPATH**/ ?>