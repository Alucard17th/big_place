@extends('layouts.dashboard')
@push('styles')
<style>
/* SCROLLBAR - START - */
/* width */
.fc-scroller::-webkit-scrollbar {
     width: 10px;
 }
 /* Track */
.fc-scroller::-webkit-scrollbar-track {
     border-radius: 0px;
 }
/* Handle */
.fc-scroller::-webkit-scrollbar-thumb {
     background: #ff8b00; 
 }
/* Handle on hover */
.fc-scroller::-webkit-scrollbar-thumb:hover {
     background: #ff8b00; 
 }
/* Firefox Integration */
.fc-scroller{
     scrollbar-color: #ff8b00 #fff;
 }
 /* SCROLLBAR - END - */

/* MONTH CALENDAR VIEW */
#calendar-item > div.fc-view-harness.fc-view-harness-active > div > table > tbody > tr > td > div > div > div > table{
    width: 100% !important;
}
#calendar-item > div.fc-view-harness.fc-view-harness-active > div > table > tbody > tr{
    display: table-row !important;
}

.custom-tooltip{
    font-size: 14px !important;
    color: #000 !important;
    line-height: 1.5 !important;
    background-color: #fff !important;
 }
</style>
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Mon Calendrier</h3>
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
                                <div id='calendar-item' ></div>
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
            let rdvType = event.is_type_presentiel ? 'Présentiel' : 'Distanciel';
            let candidatId = event.candidat_it
            rdvs.push({
                title: 'Rendez vous le : ' + event.date,
                start: event.date + 'T' + event.heure,
                backgroundColor: '#e7f6fd',
                borderColor: '#e7f6fd',
                textColor: '#0369A1',
                classNames: ['event-visio'],
                extendedProps: {
                    description: 'Type : ' + rdvType,
                    candidat_id: candidatId
                }
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
                extendedProps: {
                    description: 'Poste proposé : ' + event.job_position
                }
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
                backgroundColor: 'blue',
                borderColor: 'blue',
                extendedProps: {
                    description: event.job_title
                }
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
        height: '860px',
        width: '100%',
        // slotMinTime: "06:00:00",
        // slotMaxTime: "19:00:00",
        initialView: 'timeGridWeek',
        initialDate: today,
        headerToolbar: {
            left: 'today',
            right: 'title,prev,next',
            center: 'timeGridDay,timeGridWeek,dayGridMonth' 
        },
        events : rdvs,
        locale: initialLocaleCode,
        eventClick: function(info) {
            // alert('Event: ' + info.event.title);
            // alert('Coordinates: ' + info.jsEvent.pageX + '<br>' + info.jsEvent.pageY);
            // alert('View: ' + info.view.type);
        },
        eventMouseEnter: async function(info) {
            var tooltip = document.getElementById('custom-tooltip');

            if (!tooltip) {
                tooltip = document.createElement('div');
                tooltip.id = 'custom-tooltip';
                tooltip.className = 'custom-tooltip';
                document.body.appendChild(tooltip);
            }

            if(info.event.extendedProps.candidat_id != null){
                await $.ajax({
                    url: "/getUserById" + '/' + info.event.extendedProps.candidat_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log('Candidat fetched successfully', data.avatar);
                        const imgString = `<img src="${data.avatar.replace('public', 'storage')}" style="border-radius: 50%;width: 50px;height: 50px;height: 50px;">`;

                        tooltip.innerHTML += imgString + '  <h5>' + data.name + '</h5><br>' +
                        'Email : ' + data.email + '<br>' +
                        info.event.title + '<br>' +
                        info.event.extendedProps.description;
                    },
                    error: function() {
                        console.log('Error fetching User');
                    }
                })
            }else{
                tooltip.innerHTML += info.event.title + '<br>' +
                        info.event.extendedProps.description;
            }

            tooltip.style.display = 'block';
            tooltip.style.position = 'absolute';
            tooltip.style.zIndex =9;

            var x = info.jsEvent.pageX;
            var y = info.jsEvent.pageY;

            tooltip.style.left = x + 'px';
            tooltip.style.top = y + 'px';
        },
        eventMouseLeave: function(info) {
            $(this).css('z-index', 8);
            $('#custom-tooltip').remove();
        },
        titleFormat: {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
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