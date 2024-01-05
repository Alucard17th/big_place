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
       
        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget py-5">
                    <div class="upper-title-box d-flex justify-content-between align-items-center p-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <h3>Gestion des candidatures</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('recruiter.dashboard') }}" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div id="demo1" class="py-5" style="overflow-x: auto;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{$candidatures}}
@endsection

@push('scripts')
<script src="{{ asset('plugins/kanban/dist/jkanban.min.js') }}"></script>

<script>
    $(document).ready(function() {
        // get the php array as json data
        const candidature = @json($candidatures);
        console.log(candidature);
        // from this array get objects where status is 'refused'
        // const coming = candidature.filter((candidature) => candidature.status === 'coming');
        const coming = candidature.filter((candidature) => candidature.status === 'coming').map((candidature) => ({
            title: candidature.candidat_name + '<br/>' + candidature.title, // Assuming name is the current title
        }));

        const refused = candidature.filter((candidature) => candidature.status === 'refused').map((candidature) => ({
            title: candidature.candidat_name + '<br/>' + candidature.title, // Assuming name is the current title
        }));

        const waiting = candidature.filter((candidature) => candidature.status === 'waiting').map((candidature) => ({
            title: candidature.candidat_name + '<br/>' + candidature.title, // Assuming name is the current title
        }));

        const reflection = candidature.filter((candidature) => candidature.status === 'reflection').map((candidature) => ({
            title: candidature.candidat_name + '<br/>' + candidature.title, // Assuming name is the current title
        }));

        const done = candidature.filter((candidature) => candidature.status === 'done').map((candidature) => ({
            title: candidature.candidat_name + '<br/>' + candidature.title, // Assuming name is the current title
        }));

    var kanban1 = new jKanban({
        element:'#demo1',
        boards  :[
            {
                'id' : 'coming',
                'title'  : 'Entretiens programmés',
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