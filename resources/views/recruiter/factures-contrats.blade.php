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

#data-table-facture_paginate {
    text-align: left !important;
}

#data-table-contrat_paginate {
    text-align: left !important;
}

#data-table-facture_paginate span {
    margin-right: 10px;
    margin-left: 10px;
}

#data-table-facture_previous {
    margin-right: 10px;
}

#data-table-facture_next {
    margin-left: 10px;
}

#data-table-contrat_paginate span {
    margin-right: 10px;
    margin-left: 10px;
}

#data-table-contrat_previous {
    margin-right: 10px;
}

#data-table-contrat_next {
    margin-left: 10px;
}

.paginate_button {
    margin-left: 10px;
}
</style>
@endpush
@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="upper-title-box d-flex justify-content-between align-items-center p-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <h3>Mes Factures et Contrats</h3>
                        </div>
                        <div class="d-flex align-items-center">
                        
                            <a href="{{ route('recruiter.dashboard') }}" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                            <button type="button" class="bg-btn-six" id="download-all-factures">Exporter toutes les factures</button>
                        </div>
                    </div>
                    <div class="tabs-box">
                    <h3 class="text-dark p-2 mb-3">Mes factures</h3>
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <table class="table table-sm table-bordered" id="data-table-facture">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Crée le</th>
                                            <th>Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($documents as $document)
                                        @if($document->type == 'facture')
                                        <tr>
                                            <td class="text-left">{{$document->name}}</td>
                                            <td class="text-left" data-order="{{ $document->created_at }}">
                                                {{ \Carbon\Carbon::parse($document->created_at)->formatLocalized('%d-%m-%Y') }}
                                            </td>
                                            <td class="text-left">{{$document->type}}</td>
                                            <td class="text-left">
                                                <a type="button" class="bg-btn-three" target="_blank"
                                                    href="{{route('contract.stream', $document->id)}}">
                                                    <i class="las la-eye mr-2"></i>Consulter PDF
                                                </a>
                                                <a type="button" class="bg-btn-five"
                                                    href="{{route('contract.download', $document->id)}}"
                                                    download>
                                                    <i class="las la-download mr-2"></i>Télécharger
                                                </a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title d-flex justify-content-between">
                            <h3 class="text-dark">Mes contrats</h3>
                            <button type="button" class="bg-btn-six" id="download-all-contrats">Exporter tous les contrats</button>
                        </div>
                        <!-- <button type="button" class="btn btn-primary ml-2 mb-2 add-doc">Ajouter un Document</button> -->
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">

                                <table class="table table-sm table-bordered" id="data-table-contrat">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Réf.</th>
                                            <th>Crée le</th>
                                            <th>Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($documents as $document)
                                        @if($document->type == 'contrat')
                                        <tr>
                                            <td class="text-left">{{$document->name}}</td>
                                            <td class="text-left">{{$document->id}}</td>
                                            <td class="text-left" data-order="{{ $document->created_at }}">
                                                {{ \Carbon\Carbon::parse($document->created_at)->formatLocalized('%d-%m-%Y') }}
                                            </td>
                                            <td class="text-left">{{$document->type}}</td>
                                            <td class="text-left">
                                                <a type="button" class="bg-btn-three" target="_blank"
                                                    href="{{route('contract.stream', $document->id)}}">
                                                    <i class="las la-eye mr-2"></i>Consulter PDF
                                                </a>
                                                <a type="button" class="bg-btn-five"
                                                    href="{{route('contract.download', $document->id)}}"
                                                    download>
                                                    <i class="las la-download mr-2"></i>Télécharger
                                                </a>
                                            </td>
                                        </tr>
                                        @endif
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" integrity="sha512-XMVd28F1oH/O71fzwBnV7HucLxVwtxf26XV8P4wPk26EDxuGZ91N8bsOttmnomcCD3CS5ZMRL50H0GgOHvegtg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip-utils/0.1.0/jszip-utils.min.js" integrity="sha512-3WaCYjK/lQuL0dVIRt1thLXr84Z/4Yppka6u40yEJT1QulYm9pCxguF6r8V84ndP5K03koI9hV1+zo/bUbgMtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    $('#data-table-facture').DataTable({
        "info": false, // Hide "Showing X to Y of Z entries"
        "searching": true,
        "language": {
            "lengthMenu": "Afficher _MENU_ entrées", // Edit this line to customize the text
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "paginate": {
                "first": "Premier",
                "last": "Dernier",
                "next": "Suivant",
                "previous": "Précédent",
            },
            "search": "",
            "searchPlaceholder": "Rechercher...",
            // Add other language customization options if needed
        },
        // "pagingType": "full_numbers",
    });

    $('#data-table-facture_filter input').before(
        '<i class="las la-search" style="padding: 10px; min-width: 40px; position: absolute;"></i>');

    $('#data-table-contrat').DataTable({
        "info": false, // Hide "Showing X to Y of Z entries"
        "searching": true,
        "language": {
            "lengthMenu": "Afficher _MENU_ entrées", // Edit this line to customize the text
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "paginate": {
                "first": "Premier",
                "last": "Dernier",
                "next": "Suivant",
                "previous": "Précédent",
            },
            "search": "",
            "searchPlaceholder": "Rechercher...",
            // Add other language customization options if needed
        },
        // "pagingType": "full_numbers",
    });

    $('#data-table-contrat_filter input').before(
        '<i class="las la-search" style="padding: 10px; min-width: 40px; position: absolute;"></i>');


    const currentDateTime = new Date().toLocaleString('en-US', {
        year: 'numeric',
        month: '2-digit',
        day: '2-digit',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    }).replace(/:/g, '-');

    document.getElementById('download-all-factures').addEventListener('click', function() {
        // Get file URLs
        var fileUrls = [];
        document.querySelectorAll('#data-table-facture tbody tr').forEach(function(row) {
            var fileUrl = row.querySelector('a[download]').href;
            if (fileUrl) {
                fileUrls.push(fileUrl);
            }

            console.log('FILE URL : ' , fileUrl)
        });

        downloadAllFiles(fileUrls, 'factures_'+currentDateTime+'.zip');
    });

    document.getElementById('download-all-contrats').addEventListener('click', function() {
        // Get file URLs
        var fileUrls = [];
        document.querySelectorAll('#data-table-contrat tbody tr').forEach(function(row) {
            var fileUrl = row.querySelector('a[download]').href;
            if (fileUrl) {
                fileUrls.push(fileUrl);
            }

            console.log('FILE URL : ' , fileUrl)
        });

        downloadAllFiles(fileUrls, 'contrats_'+currentDateTime+'.zip');
    });

    function downloadAllFiles(fileUrls, archiveName) {
        const zip = new JSZip();

        // Fetch each file and add it to the zip
        const fetchPromises = fileUrls.map(url => {
            return fetch(url)
                .then(response => response.blob())
                .then(blob => {
                    const fileName = getFileNameFromUrl(url);
                    zip.file(fileName, blob);
                });
        });

        // Wait for all fetches to complete
        Promise.all(fetchPromises)
            .then(() => {
                // Generate the zip file
                return zip.generateAsync({ type: 'blob' });
            })
            .then(blob => {
                // Trigger the download
                const zipFileName = archiveName;
                downloadBlob(blob, zipFileName);
            })
            .catch(error => {
                console.error('Error downloading files:', error);
            });
    }

    function getFileNameFromUrl(url) {
        const parts = url.split('/');
        return parts[parts.length - 1];
    }

    function downloadBlob(blob, fileName) {
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = fileName;

        document.body.appendChild(link);
        link.click();

        document.body.removeChild(link);
        URL.revokeObjectURL(link.href);
    }

});
</script>
@endpush