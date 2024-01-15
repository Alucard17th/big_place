@extends('layouts.dashboard')
@push('styles')
<style>

</style>
@endpush
@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box d-flex justify-content-between align-items-center">

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="upper-title-box d-flex justify-content-between align-items-center p-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <h3>Support</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="/support" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content" id="toggleElement-1">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <div class="row">
                                    <div class="col-12">
                                        Sujet : {{ $ticket->title }}
                                    </div>
                                    <div class="col-12">
                                        Description : {{ $ticket->description }}
                                    </div>
                                    <div class="col-12">
                                        Statut : <span class="badge @if($ticket->status == 'Ouvert') badge-success @else badge-danger @endif">
                                                    {{$ticket->status}}
                                                </span>
                                    </div>
                                    <div class="col-12">
                                        Date : {{ $ticket->created_at }}
                                    </div>
                                </div>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
   

})
</script>
@endpush