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
                            <a href="{{ route('candidat.dashboard') }}" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
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
                                <p>Veuillez remplir ce formulaire, pour nous contacter.</p>
                                <form action="{{ route('support.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Sujet:</label>
                                        <input type="text" class="form-control" name="title" id="title" required>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea class="form-control" name="description" id="description" rows="5" required></textarea>
                                    </div>

                                    <button type="submit" class="bg-btn-five">Envoyer</button>
                                </form>
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