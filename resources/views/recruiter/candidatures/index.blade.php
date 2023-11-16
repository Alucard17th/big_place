@extends('layouts.dashboard')
@push('styles')
<link href="{{ asset('plugins/kanban/dist/jkanban.min.css') }}" rel="stylesheet">

<style>
    .kanban-board-header.coming{
        background-color: black;
    }
    .kanban-board-header.refused{
        background-color: red;
    }
    .kanban-board-header.done{
        background-color: green;
    }
    .kanban-board-header.waiting{
        background-color: orange;
    }
    .kanban-board-header.reflection{
        background-color: magenta;
    }

    .kanban-title-board{
        color:#fff;
    }
</style>
@endpush
@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Candidatures</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget py-5">
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title">
                        </div>

                        <div id="demo1" class="py-5" style="overflow-x: auto;"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('plugins/kanban/dist/jkanban.min.js') }}"></script>

<script>
    $(document).ready(function() {
        // get the php array as json data
        const candidature = @json($candidatures);
        console.log(candidature);
        // from this array get objects where status is 'refused'
        const coming = candidature.filter((candidature) => candidature.status === 'coming');
        const refused = candidature.filter((candidature) => candidature.status === 'refused');
        const waiting = candidature.filter((candidature) => candidature.status === 'waiting');
        const reflection = candidature.filter((candidature) => candidature.status === 'reflection');
        const done = candidature.filter((candidature) => candidature.status === 'done');
        console.log(coming);

var kanban1 = new jKanban({
        element:'#demo1',
        boards  :[
            {
                'id' : 'coming',
                'title'  : 'Entretiens à programmer',
                'class' : 'coming',
                'item'  : coming
            },
            {
                'id' : 'done',
                'title'  : 'Entretiens effectués',
                'class' : 'done',
                'item'  : done
            },
            {
                'id' : 'refused',
                'title'  : 'Candidats refusés',
                'class' : 'refused',
                'item'  : refused
            },
            {
                'id' : 'waiting',
                'title'  : 'En attente de validation',
                'class' : 'waiting',
                'item'  : waiting
            },
            {
                'id' : 'reflection',
                'title'  : 'En réflection',
                'class' : 'reflection',
                'item'  : reflection
            }
        ],
        dropEl: function(el, target, source, sibling) {
            var sourceId = $(source).closest("div.kanban-board").attr("data-id"),
                targetId = $(target).closest("div.kanban-board").attr("data-id");
                candidatureId = $(el).attr("data-eid");
            if(source === target) {
                // same column
                console.log('Candidature : ', candidatureId)
                console.log('Target Status : ', targetId)
            } else {
                // different column
                console.log('Candidature : ', candidatureId)
                console.log('Target Status : ', targetId)
            }

            $.ajax({
            url: "{{route('recruiter.candidature.updateStatus')}}",
            type: "POST",
            data: {
                candidatureId: candidatureId,
                status: targetId,
                "_token": "{{ csrf_token() }}",
            },
            success: function(data) {
                $('#email-title').text(data.subject);
                $('#email-content').text(data.message);
            }
        })
        }
    });

})
</script>
@endpush