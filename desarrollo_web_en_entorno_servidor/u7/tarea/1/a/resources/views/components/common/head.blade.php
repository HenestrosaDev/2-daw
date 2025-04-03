@props(['title'])

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="José Carlos López Henestrosa">
<meta name="description" content="Tarea 07 de DWES">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@isset($title){{ $title }} |@endisset DWES 07</title>

{{-- Favicon --}}
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('site.webmanifest') }}">
<link rel="mask-icon" href="{{ asset('images/favicon/safari-pinned-tab.svg') }}" color="#DBDBDB">
<meta name="apple-mobile-web-app-title" content="DWES7-1">
<meta name="application-name" content="DWES7-1">
<meta name="theme-color" content="#DBDBDB">

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
<script src="{{ asset("js/app.js") }}" async defer></script>