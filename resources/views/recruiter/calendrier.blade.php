@extends('layouts.dashboard')
@push('styles')
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Mon Calendrier</h3>
            <div class="text">Simplifiez votre processus de recrutement et accélérez vos embauches</div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                           
                        </div>
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <div id='calendar-item'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar-item');

  // fetch events from a laravel route using ajax
  $.ajax({
    url: "{{ route('getUserEvents') }}",
    type: 'GET',
    dataType: 'json',
    success: function(data) {
    //   calendar.addEventSource(data);
    console.log('Events fetched successfully', data);
    },
    error: function() {
      console.log('Error fetching events');
    }
  })

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    initialDate: '2023-09-07',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    events: [
      {
        title: 'All Day Event',
        start: '2023-09-01'
      },
      {
        title: 'Long Event',
        start: '2023-09-07',
        end: '2023-09-10'
      },
      {
        groupId: '999',
        title: 'Repeating Event',
        start: '2023-09-09T16:00:00'
      },
      {
        groupId: '999',
        title: 'Repeating Event',
        start: '2023-09-16T16:00:00'
      },
      {
        title: 'Conference',
        start: '2023-09-11',
        end: '2023-09-13'
      },
      {
        title: 'Meeting',
        start: '2023-09-12T10:30:00',
        end: '2023-09-12T12:30:00'
      },
      {
        title: 'Lunch',
        start: '2023-09-12T12:00:00'
      },
      {
        title: 'Meeting',
        start: '2023-09-12T14:30:00'
      },
      {
        title: 'Birthday Party',
        start: '2023-09-13T07:00:00'
      },
      {
        title: 'Click for Google',
        url: 'https://google.com/',
        start: '2023-09-28'
      }
    ]
  });

  calendar.render();
});
</script>
@endpush