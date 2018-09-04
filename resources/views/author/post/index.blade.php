@extends('layouts.back.app')

@section('title', 'Gestion des articles')

@push('css')

    <!-- JQuery DataTable Css -->
    <link href="{{ asset('back/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <a href="{{ route('author.post.create') }}" class="btn btn-primary waves-effect">
                    <i class="material-icons">add</i>
                    <span>Ajouter un nouveau article</span>
                </a>
                
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h1>
                                Mes articles
                                <span class="badge bg-blue">{{ $posts->count() }}</span>
                            </h1>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Titre</th>
                                        <th>Auteur</th>
                                        <th><i class="material-icons">visibility</i></th>
                                        <th>Statut</th>
                                        <th>Est approuvé</th>
                                        <th>Date de création</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Titre</th>
                                        <th>Auteur</th>
                                        <th><i class="material-icons">visibility</i></th>
                                        <th>Statut</th>
                                        <th>Est approuvé</th>
                                        <th>Date de création</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($posts as $key=>$post)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ str_limit($post->title, '10') }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->view_count }}</td>
                                            <td>
                                                @if($post->status == true)
                                                    <span class="badge bg-blue">En ligne</span>
                                                @else
                                                    <span class="badge bg-pink">En cours</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($post->is_approved == true)
                                                    <span class="badge bg-blue">Approuvé</span>
                                                @else
                                                    <span class="badge bg-pink">En cours</span>
                                                @endif
                                            </td>
                                            <td>{{ $post->created_at }}</td>
                                            <td>
                                                <a href="{{ route('author.post.show', $post->id) }}" class="btn btn-success waves-effect btn-sm"> <i class="material-icons">visibility</i></a>
                                                <a href="{{ route('author.post.edit', $post->id) }}" class="btn btn-info waves-effect btn-sm"> <i class="material-icons">edit</i></a>
                                                
                                                <form id="delete-form-{{ $post->id }}" action="{{ route('author.post.destroy', $post->id) }}" method="post" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <span>
                                                    <button type="button" class="btn btn-danger btn-sm waves-effect" onclick="if(confirm('Êtes-vous sur')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $post->id }}').submit();
                                                }
                                                else{
                                                        event.preventDefault();
                                                    }
                                                        ">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                </span>
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
    </section>
@endsection

@push('scripts')
    <!-- Select Plugin Js -->
    <script src="{{ asset('back/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('back/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('back/plugins/node-waves/waves.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('back/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset('back/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('back/plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ asset('back/plugins/chartjs/Chart.bundle.js') }}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{ asset('back/plugins/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{ asset('back/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('back/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('back/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('back/plugins/flot-charts/jquery.flot.time.js') }}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset('back/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>


    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('back/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('back/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{ asset('back/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('back/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('back/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('back/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('back/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('back/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('back/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('back/js/admin.js') }}"></script>
    <script src="{{ asset('back/js/pages/tables/jquery-datatable.js') }}"></script>

    <script type="text/javascript">
    </script>
@endpush
