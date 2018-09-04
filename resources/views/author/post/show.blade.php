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


            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="card">
                        <div class="header">
                            <h2>
                                {{ $post->title }}
                                <small>Posté par : <strong>{{ $post->user->name }}</strong> à {{ $post->created_at->toFormattedDateString() }}</small>
                            </h2>
                        </div>
                        <div class="body">
                            
                            {!! $post->body !!}
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="card">
                        <div class="header bg-green">
                            <h2>Categories</h2>
                        </div>
                        <div class="body">
                            
                            @foreach($post->categories as $category)
                                <span class="badge bg-cyan">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="card">
                        <div class="header bg-orange">
                            <h2>Tags</h2>
                        </div>
                        <div class="body">
                            
                            @foreach($post->tags as $tag)
                                <span class="badge bg-grey">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="card">
                        <div class="header bg-pink">
                            <h2>Image</h2>
                            <small>Image principale</small>
                        </div>
                        <div class="body">
                            <img width="100%" src="{{ asset('storage/post/'.$post->image) }}">
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
