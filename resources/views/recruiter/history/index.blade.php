@extends('layouts.dashboard')
@push('styles')
<style>
.modal a.custom-close-modal {
    position: absolute;
    top: -12.5px;
    right: -12.5px;
    display: block;
    width: 30px;
    height: 30px;
    text-indent: -9999px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAAXNSR0IArs4c6QAAA3hJREFUaAXlm8+K00Acx7MiCIJH/yw+gA9g25O49SL4AO3Bp1jw5NvktC+wF88qevK4BU97EmzxUBCEolK/n5gp3W6TTJPfpNPNF37MNsl85/vN/DaTmU6PknC4K+pniqeKJ3k8UnkvDxXJzzy+q/yaxxeVHxW/FNHjgRSeKt4rFoplzaAuHHDBGR2eS9G54reirsmienDCTRt7xwsp+KAoEmt9nLaGitZxrBbPFNaGfPloGw2t4JVamSt8xYW6Dg1oCYo3Yv+rCGViV160oMkcd8SYKnYV1Nb1aEOjCe6L5ZOiLfF120EjWhuBu3YIZt1NQmujnk5F4MgOpURzLfAwOBSTmzp3fpDxuI/pabxpqOoz2r2HLAb0GMbZKlNV5/Hg9XJypguryA7lPF5KMdTZQzHjqxNPhWhzIuAruOl1eNqKEx1tSh5rfbxdw7mOxCq4qS68ZTjKS1YVvilu559vWvFHhh4rZrdyZ69Vmpgdj8fJbDZLJpNJ0uv1cnr/gjrUhQMuI+ANjyuwftQ0bbL6Erp0mM/ny8Fg4M3LtdRxgMtKl3jwmIHVxYXChFy94/Rmpa/pTbNUhstKV+4Rr8lLQ9KlUvJKLyG8yvQ2s9SBy1Jb7jV5a0yapfF6apaZLjLLcWtd4sNrmJUMHyM+1xibTjH82Zh01TNlhsrOhdKTe00uAzZQmN6+KW+sDa/JD2PSVQ873m29yf+1Q9VDzfEYlHi1G5LKBBWZbtEsHbFwb1oYDwr1ZiF/2bnCSg1OBE/pfr9/bWx26UxJL3ONPISOLKUvQza0LZUxSKyjpdTGa/vDEr25rddbMM0Q3O6Lx3rqFvU+x6UrRKQY7tyrZecmD9FODy8uLizTmilwNj0kraNcAJhOp5aGVwsAGD5VmJBrWWbJSgWT9zrzWepQF47RaGSiKfeGx6Szi3gzmX/HHbihwBser4B9UJYpFBNX4R6vTn3VQnez0SymnrHQMsRYGTr1dSk34ljRqS/EMd2pLQ8YBp3a1PLfcqCpo8gtHkZFHKkTX6fs3MY0blKnth66rKCnU0VRGu37ONrQaA4eZDFtWAu2fXj9zjFkxTBOo8F7t926gTp/83Kyzzcy2kZD6xiqxTYnHLRFm3vHiRSwNSjkz3hoIzo8lCKWUlg/YtGs7tObunDAZfpDLbfEI15zsEIY3U/x/gHHc/G1zltnAgAAAABJRU5ErkJggg==);
}
</style>
@endpush
@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Historiques des recherches</h3>
            <div class="text">Simplifiez votre processus de recrutement et accélérez vos embauches</div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title">
                           
                        </div>
           
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <table class="default-table manage-job-table table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Lien vers la recherche</th>
                                            <th>Recherche</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($history as $search)
                                        <tr>
                                            <td>
                                                <a href="{{ route('recruiter.cvtheque.search', [
                                                    'metier_recherche' => $search->metier_recherche ? $search->metier_recherche : '',
                                                    'ville_domiciliation' => $search->ville_domiciliation ? $search->ville_domiciliation : '',
                                                    'annees_experience' => $search->annees_experience ? $search->annees_experience : '',
                                                    'niveau_etudes' => $search->niveau_etudes ? $search->niveau_etudes : '',
                                                    'pretentions_salariales' => $search->pretentions_salariales ? $search->pretentions_salariales : '',
                                                    'valeur' => $search->valeurs ? json_decode($search->valeurs) : [], // Assuming $search->valeur is an array
                                                ]) }}">Voir</a>
                                           </td>
                                           <td class="d-flex justify-content-center align-items-start flex-column">
                                                <span class="badge badge-secondary mb-1">Metier :{{$search->metier_recherche}}</span>
                                                <span class="badge badge-secondary mb-1">Années d'expérience :{{$search->annees_experience}}</span>
                                                <span class="badge badge-secondary mb-1">Ville / Département :{{$search->ville_domiciliation}}</span>
                                                <span class="badge badge-secondary mb-1">Niveau d'etudes :{{$search->niveau_etudes}}</span>
                                                <span class="badge badge-secondary">Prétentions salariales :{{$search->pretentions_salariales}}</span>
                                                <span class="badge badge-secondary">Valeurs :
                                                    @if(is_array(json_decode($search->valeurs)))
                                                    @foreach(json_decode($search->valeurs) as $value)
                                                        {{str_replace('1', ".", print_r($value))}}
                                                    @endforeach
                                                    @endif
                                                </span>
                                           </td>
                                        </tr>
                                        @endforeach

                                       
                                    </tbody>
                                </table>
                                <div class="ls-pagination">
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

@endpush