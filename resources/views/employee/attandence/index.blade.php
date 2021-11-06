@extends('layouts.employee')
  @section('employee')

  

 
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          	<h5>View Attandence</h5>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin">Dashboard</a></li>
              <li class="breadcrumb-item">View Attandence</li>
            </ol>
          </div>

  <div class="row m-lg-2 mb-3">
    <!-- Total User Card Example -->
   

            <!-- Total Task -->
            <div class="col-xl-12 col-md-10 mb-4">
              <div class="card ">
                 
                <!-- --------------------------- -->
                <form action="{{ url('employee/attandence') }}" method="GET">
                <!-- <form action=" " class=" form" method="GET"> -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <div class="form-group col-md-4 m-auto">
                        <h3>From </h3>
                        <input type="date" name="from_date"  id="from_date" class="form-control"  >
                       </div>
                      <div class="form-group col-md-4 m-auto">
                        <h3>To </h3>
                        <input type="date" name="to_date"    id="to_date" class="form-control"  >
                       </div>
                      <div class="form-group col-md-4 m-auto">
                        <h3>submit </h3>
                         <button class="btn btn-primary form-control  " type="submit">View</button>
                      </div>
                      
                      
                  </div>
                </form>
                <!-- ----------------------------- -->

              </div>
            </div> 



             
            
 
          </div>


      <!-- Pie Chart Card Example -->    
      <div class="container my-4">
        <div class="card h-100">
          <div class="card-body">
            
              <h5>Total Attandence Pie Chart</h5>
              <hr class="my-4">
            <div class="row no-gutters align-items-center">

              <div class="col  col-md-6">
                <canvas id="pieChart" style="max-width: 500px;"></canvas>
              </div>
              <!-- <div class="col  col-md-6">
                <canvas id="pieChart2" style="max-width: 500px;"></canvas>
              </div> -->
            </div>
          </div>
        </div>
      </div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
@endsection




@section('scripts')



 
<!--Attandence Pie Chart Scripts -->
<script type="text/javascript">


  let absent ={{$absent}};

  let present ={{$present}};



      //pie ------------------------------------------
      var ctxP = document.getElementById("pieChart").getContext('2d');
      var myPieCharts = new Chart(ctxP, {
        type: 'pie',
        data: {
          labels: ["Present", "Absent"],
          datasets: [{
            data: [present, absent],
            backgroundColor: ["#46BFBD", "#FDB45C","#F7464A"],
            hoverBackgroundColor: ["#5AD3D1", "#FFC870","#FF5A5E"]
          }]
        },
        options: {
          responsive: true
        }
      });


      //     //pie ----------------------22222--------------------
      //     var ctxP = document.getElementById("pieChart2").getContext('2d');
      // var myPieChart = new Chart(ctxP, {
      //   type: 'line',
      //   data: {
      //     labels: ["Present", "Absent"],
      //     datasets: [{
      //       data: [50, 100],
      //       backgroundColor: ["#46BFBD", "#FDB45C","#F7464A"],
      //       hoverBackgroundColor: ["#5AD3D1", "#FFC870","#FF5A5E"]
      //     }]
      //   },
      //   options: {
      //     responsive: true
      //   }
      // });



 
</script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>

    $("#to_date").flatpickr({
        maxDate: "today"
    });
</script>




<!-- Pie Chart Scripts -->
@endsection
