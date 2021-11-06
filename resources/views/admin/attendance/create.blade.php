@extends('layouts.admin')
  @section('main')
{{-- <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"> --}}
{{-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> --}}

<!-- Add Attendance Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Add Attendance</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Attendance</li>
                    <li class="breadcrumb-item active" aria-current="page">Add Attendance</li>
                </ol>
            </div>

            <div class="row">
              <!--Add Attendance DataTable with Hover Section-->
              <div class="col-lg-12 text-center">

                <!-- --------------------------- -->
                <form action="{{ url('admin/attendance') }}" method="POST">
                <!-- <form action=" " class=" form" method="GET"> -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <div class="form-group col-md-6 m-auto">
                        <h3>Pick an attendance date {{ $att_date ?? '' }}</h3>
                        <input type="date" name="date" value="{{ $att_date ?? '' }}" id="date" class="form-control" required>
                        <!-- <button class="btn btn-primary form-control mt-3" type="submit">View</button> -->
                      </div>
                      
                  </div>
                <!-- </form> -->
                <!-- ----------------------------- -->

 
                        @csrf
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        {{-- <a href="#"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addAttendance"id="#addAttendanceBoard"><i class="fas fa-user-edit">Add Attendance</i></button></a> --}}
                    </div>


                      <div class="card mb-4">

                        <div class="table-responsive p-3">
                          <table class="table align-items-center table-flush table-hover">
                            <thead class="thead-light">
                              <tr>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>Department</th>
                                <th>User Type</th>
                                <th>Present</th> 
                              </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <input type="hidden" name="user_id[]" value="{{ $user->id }}">
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->department }}</td>
                                    <td>{{ $user->type }}</td>
                    
                                    <td>
                                        <div class="form-control">
                                      
                                        <label for="Present[{{ $user->id }}]">Present :</label> <input checked type="radio" name="attendance[{{ $user->id }}]" value="Present" id="Present[{{ $user->id }}]" class="form-aa mr-3" >

                                        <label for="Absent[{{ $user->id }}]">Absent :</label> <input type="radio" name="attendance[{{ $user->id }}]" value="Absent" id="Absent[{{ $user->id }}]" class="form-contaaarol" >
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="5">
                                            <h4>No Active User Found!</h4>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                          </table>
                        </div>
                      </div>
                  @empty(!$users)
                    <button type="submit" class="btn btn-primary">Take Todays Attendance</button>
                  @endempty
                </form>
              </div>
            </div>

<!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>

    $("#date").flatpickr({
        maxDate: "today"
    });
</script>

@endsection
