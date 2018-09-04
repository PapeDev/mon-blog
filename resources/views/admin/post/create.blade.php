@extends('layouts.back.app')

@section('title', 'Creation article')

@push('css')
 <!-- Multi Select Css -->
    <link href="{{ asset('back/plugins/multi-select/css/multi-select.css')}}" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="{{ asset('back/plugins/jquery-spinner/css/bootstrap-spinner.css')}}" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="{{ asset('back/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="{{ asset('back/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="{{ asset('back/plugins/nouislider/nouislider.min.css')}}" rel="stylesheet" />



@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Nouveau article</h1>
            </div>

            <form method="POST" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <div class="card">
                            <div class="body">
                                
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="title">
                                            <label class="form-label">Nom l'article</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                    <input type="checkbox" id="md_checkbox_8" class="chk-col-cyan" name="status">
                                    <label for="md_checkbox_8">Publié</label>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="card">
                            <div class="header">
                                <h2>Categories et Tags</h2>
                            </div>
                            <div class="body">
                                
                                    <div class="form-group form-float">
                                        <div class="form-line {{ $errors->has('categories') ? 'focused error' : '' }}">
                                            <label class="category">Choisir une categorie</label>
                                            <select name="categories[]" id="category" class="form-control show-tick" data-live-search="true" multiple>
                                                @foreach($categories as $key=>$category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="tag">Choisir les tags</label>
                                            <select name="tags[]" id="tag" class="form-control show-tick" data-live-search="true" multiple>
                                                @foreach($tags as $key=>$tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <button class="btn btn-primary waves-effect" type="submit">Publier</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- TinyMCE -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                                <textarea id="tinymce" name="body">
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# TinyMCE -->
            </form>
            <!-- #END# Advanced Validation -->
        </div>
    </section>
@endsection

@push('scripts')
    <!-- Select Plugin Js -->
    <script src="{{ asset('back/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

   

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('back/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    

    <!-- Custom Js -->
    <script src="{{ asset('back/js/admin.js') }}"></script>
    

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


    <script src="{{ asset('back/js/demo.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('back/plugins/tinymce/tinymce.js') }}"></script>

    <script>
       $(function () {
        
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset('back/plugins/tinymce') }}';
        });
    </script>

    

@endpush
