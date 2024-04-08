<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Masters</div>
                <a class="nav-link" href="{{route('tags.index')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-tag"></i></div>
                    Tags
                </a>
                <a class="nav-link" href="{{route('categories.index')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gears"></i></div>
                    Categories
                </a>

                <div class="sb-sidenav-menu-heading">Blogs</div>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-rss"></i></div>
                    Posts
                </a>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-trash"></i></div>
                    Trashed Posts
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
@extends('admin-panel.layouts.admin')

@section('admin-content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </main>
@endsection
