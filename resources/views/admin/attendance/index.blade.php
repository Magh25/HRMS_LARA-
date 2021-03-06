@extends('layouts.admin')
  @section('main')
{{-- <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"> --}}
{{-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> --}}

<!-- Add attendance Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">View attendance</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View attendance</li>
                    <li class="breadcrumb-item active" aria-current="page">Add attendance</li>
                </ol>
            </div>

            <div class="row">
                <!--Add attendance DataTable with Hover Section-->
                <div class="col-lg-12 text-center">
                    <form action="{{ url('admin/attendance') }}" method="GET">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <div class="form-group col-6 m-auto">
                                <h3>Pick an attendance date {{ $att_date ?? '' }}</h3>
                                <input type="date" name="date" value="{{ $att_date ?? '' }}" id="date" class="form-control" required>
                                <button class="btn btn-primary" type="submit">View</button>
                            </div>
                        </div>
                     </form>
              <div class="card mb-4">
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Department</th>
                        <th>Attendance</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($attendances ?? '' as $attendance)
                            <tr>
                            <td>{{ $attendance->user_id }}</td>
                            <td>{{ $attendance->user->name }}</td>
                            <td>{{ $attendance->user->department }}</td>
                            <td>{{ $attendance->attendance }}</td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <h3>No attendance Found</h3>

                                </td>
                           </tr>
                        @endforelse

                    </tbody>
                </table>
                </div>
              </div>
              @if($attendances ?? '')
                <a href="{{ url('admin/attendance/'.$att_date.'/edit') }}" class="btn btn-primary">Edit attendance</a>
              @endif
        </div>
    </div>
  <!--Add attendance Modal Center -->
  <div class="modal fade" id="addattendance" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
          <div class="modal-content">

             <div class="modal-header">
                  <h5 class="modal-title" id="addattendanceBoard">Add attendance</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
              </div>

                <div class="modal-body">
                    <label class="mb-3 font-weight-bold">Add attendance Date</label>
                    <input class="form-control  mb-3" type="date" placeholder="Update attendance Date">
                </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <a href="#"><button type="button" class="btn btn-warning">Add</button></a>

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
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>

    $("#date").flatpickr({
        maxDate: "today"
    });
</script>

@endsection

