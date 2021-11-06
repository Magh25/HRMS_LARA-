<?php $__env->startSection('main'); ?>

        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addEvent"
                    id="#addEventCalendar">Add Event</button>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin">Dashboard</a></li>
              <li class="breadcrumb-item">Event</li>
            </ol>
          </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <script src="<?php echo e(asset('/js/sweetalert.min.js')); ?>"></script>

<!--Event Page Index-->
  <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
          <div class="container" style="background-color: #D8BFD8;">
        <h3 class="far fa-calendar-check" style="color:black;"> Event Calendar</h3>
        <div id='calendar' style="font-size: 20px;color:black;"></div>
    </div>
      </div>
  </div>
    </div>

    <!--Add Event Modal Center -->
<div class="modal fade" id="addEvent" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="addEventCalendar">Add Event</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <form action="<?php echo e(url('admin/events')); ?>" method="post">
            <?php echo csrf_field(); ?>

            <div class="form-group col-md-8 col-md-offset-2">
                <label for="name">Enter Start Date:</label>
                <input type="date" class="form-control" name="start" class="date"/>
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                <label for="name">Enter End Date:</label>
                <input type="date" class="form-control" name="end" class="date"/>
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                <label for="name">Enter Event:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Event" required autofocus>
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" placeholder="Event Description" required></textarea>
            </div>

            <div class="form-group col-md-2 col-md-offset-2">
                <label for="backgroundColor">Select Color</label>
                <input type="color" class="form-control" name="backgroundColor" required>
            </div>

            <div class="form-group col-md-8 col-md-offset-2">
                <button type="submit" class="btn btn-primary btn-lg">Save</button>
            </div>

        </form>

              </div>
            </div>
          </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!-- Scripts -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

<script>
    $(document).ready(function() {

        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({

            //Put your options and callbacks here
            //Make the event dragable, resizabe, change opacity
            editable: true,
            dragOpacity: .60,
            eventTextColor: '#000000',
            events : [

                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                {
                    id : '<?php echo e($event->id); ?>',
                    title : "<?php echo $event->title; ?>",
                    start : "<?php echo $event->start; ?>",
                    end : '<?php echo e($event->end); ?>',
                    backgroundColor : '<?php echo e($event->backgroundColor); ?>',
                    url : '<?php echo e(route('events.edit', $event->id)); ?>',
                    eurl : '<?php echo e(url('/admin/events/update')); ?>',
                    ajax : true,
                },
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            //Show the event entry form when a day is clicked
            
            eventClick: function(event, jsEvent, view) {
                $(this).css('background-color', '#ff0000');
            },
            eventDragStart: function(event, jsEvent, view) {
                $(this).css('background-color', '#00ff00');
            },
            // drop on a new date and submit to database
            eventDrop: function(event, delta, revertFunc, jsEvent, view) {

                swal({
                    title: "You moved the event. Save it?",
                    text: "You can move it as mush as you want.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then(function(willDelete){
                    if (willDelete) {
                        swal("Moved. Your event has been rescheduled.", {
                        icon: "success",
                        });

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: 'json',
                            type:'POST',
                            url: event.eurl,
                            data:{
                                    id:event.id,
                                    start:event.start.format(),
                                    end:event.end.format(),
                                },
                            success: function(data){
                            },
                        });
                    } else {
                        swal("Your event has not been rescheduled.");
                        revertFunc();
                    }
                });
            },
            eventResize: function(event, delta, revertFunc){
                swal({
                    title: "Changed Timeline. Save it?",
                    text: "You can expand it as far as you need to.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then(function(willDelete){
                    if (willDelete) {
                        swal("Moved! Your event has been rescheduled!", {
                        icon: "success",
                        });

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: 'json',
                            type:'POST',
                            url: event.eurl,
                            data:{
                                    id:event.id,
                                    start:event.start.format(),
                                    end:event.end.format()
                                },
                            success: function(data){
                            },
                        });

                    } else {
                        swal("Your event has not been rescheduled.");
                        revertFunc();                                                                                                                                                                        nv
                    }
                });
            },
        })
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohammed/WEB/laravel/blockgem/Laravel_HRM-master/resources/views/admin/events/index.blade.php ENDPATH**/ ?>