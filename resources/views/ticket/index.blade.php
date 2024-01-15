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
                            <h3>Mes tickets de support</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <!-- <a href="{{ route('candidat.dashboard') }}" class="bg-back-btn mr-2">
                                Retour
                            </a> -->
                            <a href="{{route('support.create')}}" class="theme-btn btn-style-one bg-header-btn">+ Créer un ticket</a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title d-flex justify-content-between">

                        </div>
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content" id="toggleElement-1">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <table class="table table-sm table-bordered" id="data-table-deleted">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Sujet</th>
                                            <th>Description</th>
                                            <th>Statut</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tickets as $ticket)
                                        <tr>
                                            <td>{{$ticket->title}}</td>
                                            <td>{{$ticket->description}}</td>
                                            <td>
                                                <span class="badge @if($ticket->status == 'Ouvert') badge-success @else badge-danger @endif">
                                                    {{$ticket->status}}
                                                </span>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($ticket->created_at)->formatLocalized('%d-%m-%Y') }}
                                            </td>
                                            <td>
                                                <a href="{{route('support.show', $ticket)}}"
                                                    class="bg-btn-five">
                                                    Consulter
                                                </a>
                                                <!-- <a href=""
                                                    class="bg-btn-four ml-2"
                                                    onclick="return confirm('Etes-vous sur de vouloir supprimer ce ticket ?');">
                                                    Supprimer
                                                </a> -->
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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