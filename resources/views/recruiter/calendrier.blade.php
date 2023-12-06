@extends('layouts.dashboard')
@push('styles')
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Calendrier</h3>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.1/lang-all.js"></script>
<script src="{{asset('plugins/js/locales-all.global.min.js')}}"></script>

<script>
// document.addEventListener('DOMContentLoaded', async function() {
//   var calendarEl = document.getElementById('calendar-item');

//   let rdvs = [];
//   // fetch events from a laravel route using ajax
//   await $.ajax({
//     url: "{{ route('getUserRdvs') }}",
//     type: 'GET',
//     dataType: 'json',
//     success: function(data) {
//     console.log('RDVS fetched successfully', data);
//         data.forEach(function(event) {
//             rdvs.push({
//                 title: 'Rendez vous le : ' + event.date,
//                 start: event.date + 'T' + event.heure,
//                 backgroundColor: 'pink',
//                 borderColor: 'pink',
//             });
//         })
//     },
//     error: function() {
//       console.log('Error fetching events');
//     }
//   })

//   await $.ajax({
//     url: "{{ route('getUserEvents') }}",
//     type: 'GET',
//     dataType: 'json',
//     success: function(data) {
//     console.log('EVENTS fetched successfully', data);
//         data.forEach(function(event) {
//             rdvs.push({
//                 title: 'Evènement le : ' + event.event_date,
//                 start: event.event_date + 'T' + event.event_hour,
//                 backgroundColor: 'red',
//                 borderColor: 'red',
//             });
//         })
//     },
//     error: function() {
//       console.log('Error fetching events');
//     }
//   })

//   await $.ajax({
//     url: "{{ route('getUserFormations') }}",
//     type: 'GET',
//     dataType: 'json',
//     success: function(data) {
//     console.log('Formations fetched successfully', data);
//         data.forEach(function(event) {
//             rdvs.push({
//                 title: 'Formation le : ' + event.start_date,
//                 start: event.start_date,
//                 backgroundColor: 'green',
//                 borderColor: 'green',
//             });
//         })
//     },
//     error: function() {
//       console.log('Error fetching events');
//     }
//   })

  

//   console.log('Events', rdvs);
//   var today = new Date(); // Get current date
//     var dd = String(today.getDate()).padStart(2, '0');
//     var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
//     var yyyy = today.getFullYear();

//     today = yyyy + '-' + mm + '-' + dd;
//   var initialLocaleCode = 'fr';
//   var calendar = new FullCalendar.Calendar(calendarEl, {
//     initialView: 'dayGridMonth',
//     initialDate: today,
//     headerToolbar: {
//       left: 'prev,next today',
//       center: 'title',
//       right: 'dayGridMonth,timeGridWeek,timeGridDay'
//     },
//     locale: initialLocaleCode,
//     events : rdvs,
//     // events: [
//     //   {
//     //     title: 'All Day Event',
//     //     start: '2023-09-01'
//     //   },
//     //   {
//     //     title: 'Long Event',
//     //     start: '2023-09-07',
//     //     end: '2023-09-10'
//     //   },
//     //   {
//     //     groupId: '999',
//     //     title: 'Repeating Event',
//     //     start: '2023-09-09T16:00:00'
//     //   },
//     //   {
//     //     groupId: '999',
//     //     title: 'Repeating Event',
//     //     start: '2023-09-16T16:00:00'
//     //   },
//     //   {
//     //     title: 'Conference',
//     //     start: '2023-09-11',
//     //     end: '2023-09-13'
//     //   },
//     //   {
//     //     title: 'Meeting',
//     //     start: '2023-09-12T10:30:00',
//     //     end: '2023-09-12T12:30:00'
//     //   },
//     //   {
//     //     title: 'Lunch',
//     //     start: '2023-09-12T12:00:00'
//     //   },
//     //   {
//     //     title: 'Meeting',
//     //     start: '2023-09-12T14:30:00'
//     //   },
//     //   {
//     //     title: 'Birthday Party',
//     //     start: '2023-09-13T07:00:00'
//     //   },
//     //   {
//     //     title: 'Click for Google',
//     //     url: 'https://google.com/',
//     //     start: '2023-09-28'
//     //   }
//     // ],
//     eventClick: function(info) {
//         alert('Event: ' + info.event.title);
//         alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
//         alert('View: ' + info.view.type);

//         // change the border color just for fun
//         // info.el.style.borderColor = 'red';
//     }
//   });

//   calendar.render();
// });
document.addEventListener('DOMContentLoaded', async function() {
  var calendarEl = document.getElementById('calendar-item');
  let rdvs = [];
  // fetch events from a laravel route using ajax
  await $.ajax({
    url: "{{ route('getUserRdvs') }}",
    type: 'GET',
    dataType: 'json',
    success: function(data) {
    console.log('RDVS fetched successfully', data);
        data.forEach(function(event) {
            rdvs.push({
                title: 'Rendez vous le : ' + event.date,
                start: event.date + 'T' + event.heure,
                backgroundColor: '#e7f6fd',
                borderColor: '#e7f6fd',
                textColor: '#0369A1',
                classNames: ['event-visio']
            });
        })
    },
    error: function() {
      console.log('Error fetching events');
    }
  })

  await $.ajax({
    url: "{{ route('getUserEvents') }}",
    type: 'GET',
    dataType: 'json',
    success: function(data) {
    console.log('EVENTS fetched successfully', data);
        data.forEach(function(event) {
            rdvs.push({
                title: 'Evènement le : ' + event.event_date,
                start: event.event_date + 'T' + event.event_hour,
                backgroundColor: 'red',
                borderColor: 'red',
            });
        })
    },
    error: function() {
      console.log('Error fetching events');
    }
  })

  await $.ajax({
    url: "{{ route('getUserFormations') }}",
    type: 'GET',
    dataType: 'json',
    success: function(data) {
    console.log('Formations fetched successfully', data);
        data.forEach(function(event) {
            rdvs.push({
                title: 'Formation le : ' + event.start_date,
                start: event.start_date,
                backgroundColor: 'green',
                borderColor: 'green',
            });
        })
    },
    error: function() {
      console.log('Error fetching events');
    }
  })

    var today = new Date(); // Get current date
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    var initialLocaleCode = 'fr';
    var calendar = new FullCalendar.Calendar(calendarEl, {
    height: '100vh',
    width: '100%',
    initialView: 'timeGridWeek',
    initialDate: today,
    headerToolbar: {
      left: 'prev,today,next',
      right: '',
      center: 'timeGridDay,timeGridWeek' 
    },
    events : rdvs,
    locale: initialLocaleCode,
    eventClick: function(info) {
        alert('Event: ' + info.event.title);
        alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
        alert('View: ' + info.view.type);
    },
    slotLabelFormat: {
        hour: 'numeric',
        minute: '2-digit',
        omitZeroMinute: false,
        hour12: false // Change to true if you want 12-hour format
    }
  });

  calendar.render();
});
</script>
@endpush