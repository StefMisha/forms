<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title> @section('title') ФОРМА @show </title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href= "{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/clean-blog.min.css')}}" rel="stylesheet">

</head>
<header class="masthead" style="background-image: url('/assets/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    {{--                    <h2>{{ $form -> name }}</h2>--}}
                    <span class="subheading"> @section('header') @show</span>
                </div>
            </div>
        </div>
    </div>
</header>
<body>

<!-- Navigation -->

<x-navbar></x-navbar>

<!-- Page Header -->

{{--<x-header></x-header>--}}

<!-- Main Content -->
<div class="container">

    @yield('content') {{--вывод контента index.bl...php--}}

</div>

<hr>
<!-- Footer -->
<x-footer></x-footer>

