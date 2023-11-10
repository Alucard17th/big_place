@extends('layouts.dashboard')
@push('styles')
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Ma Tâche</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-content">
                            <form action="{{ route('recruiter.task.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="task_id" value="{{ $task->id }}">

                                <div class="form-group">
                                    <label for="nom_task">Nom tâches</label>
                                    <input type="text" class="form-control" name="nom_task" id="nom_task"
                                        value="{{ $task->title }}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="6">{{ $task->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="0" @if($task->completed == '0') selected @endif>En cours</option>
                                            <option value="1" @if($task->completed == '1') selected @endif>Terminée</option>
                                        </select>
                                </div>

                                <div class="form-group">
                                    <label for="date_fin">Date de fin</label>
                                    <input type="date" class="form-control" name="date_fin" id="date_fin"
                                        value="{{ $task->due_date }}">
                                </div>

                                <div class="form-group">
                                    <button class="theme-btn btn-style-one" type="submit">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush