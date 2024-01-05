@extends('layouts.dashboard')
@push('styles')
<style>
#edit-task-form>div>label,
#edit-task-form>div.row>div>div>label,
#edit-task-form>div>div>label {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 41px;
    color: #202124;
}

#edit-task-btn {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 20px;
}
</style>
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="upper-title-box d-flex justify-content-between align-items-center p-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <h3>Ma Tâche</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="/candidat-tasks" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <div class="widget-content">
                            <form action="{{ route('candidat.task.update') }}" method="POST"
                                enctype="multipart/form-data" id="edit-task-form">
                                @csrf

                                <input type="hidden" name="task_id" value="{{ $task->id }}">

                                <div class="form-group">
                                    <label for="nom_task">Nom tâches</label>
                                    <input type="text" class="form-control" name="nom_task" id="nom_task"
                                        value="{{ $task->title }}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" cols="30"
                                        rows="6">{{ $task->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="status">Statut</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="0" @if($task->completed == '0') selected @endif>En cours</option>
                                        <option value="1" @if($task->completed == '1') selected @endif>Terminée</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="date_debut">Date de début</label>
                                    <input type="date" class="form-control" name="date_debut" id="date_debut"
                                        value="{{ $task->start_date }}">
                                </div>

                                <div class="form-group">
                                    <label for="date_fin">Date de fin</label>
                                    <input type="date" class="form-control" name="date_fin" id="date_fin"
                                        value="{{ $task->due_date }}">
                                </div>

                                <div class="form-group">
                                    <button class="theme-btn btn-style-one" type="submit"
                                        id="edit-task-btn">Enregistrer</button>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById("start_date").min = new Date().toISOString().slice(0, 10);
    document.getElementById("end_date").min = new Date().toISOString().slice(0, 10);
})
</script>
@endpush