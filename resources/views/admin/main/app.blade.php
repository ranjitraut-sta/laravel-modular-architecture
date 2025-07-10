<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<!-- Mirrored from codervent.com/syndash/demo/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Jan 2024 06:38:02 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @if (!empty($data['title']))
            {{ $data['title'] }}
        @endif
        {{ !empty($data['header_title']) ? $data['header_title'] : '' }}
    </title>
    <!--favicon-->

    {{-- css --}}
    <link rel="icon" href="{{ asset('admin/assets/images/favicon-32x32.png') }}" type="image/png" />
    <link href="{{ asset('admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('admin/assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('admin/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&amp;family=Roboto&amp;display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/app.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        {{-- Custom css --}}
    <link rel="stylesheet" href="{{ asset('admin/assets/css/custom.css') }}" />
</head>

<body>
    <div class="wrapper">
        @include('admin.main.sidebar')
        @include('admin.main.head')
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('admin.main.footer')
        @stack('scripts')
    </div>

</body>

</html>
