<!DOCTYPE html>
<head>
    <title>LibreDesk - @yield('title')</title>

    <link rel="stylesheet" href="/css/app.css">

    <!-- Bootstrap CDN Import -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

    <!-- JQUery Import -->
    <script   src="https://code.jquery.com/jquery-3.5.1.js"   integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="   crossorigin="anonymous"></script>
</head>

<body>
@include('layouts.navbar')
<div class="row" style="margin-top: 3%;">
    <div class="col-md-3 container sidebar-admin" style="overflow: scroll">
        <ul class="menu-list" style="margin-top: 2rem">
            <li><a href="/admin/home">Menu</a></li>
            <ul class="menu-list">
                <li><a href="/books/add">Add New Book</a></li>
                <li><a href="/admin/guides">Create New Guide</a></li>
                <li><a href="/admin/tags">Create New Tags</a></li>
                <li><a href="/books/">Modify Books</a></li>
                <li><a href="/authors">Modify Authors</a></li>
            </ul>
            <hr class="menu-separator">
            <li><a href="/admin/users/index">Users</a></li>
            <ul class="menu-list">
                <li><a href="/admin/users/add">Add Users</a></li>
                <li><a href="/admin/users/index">Modify Users</a></li>
                <li><a href="/admin/motd">MOTD</a></li>
            </ul>
            <hr class="menu-separator">
            <li><a href="/admin/guides">Content</a></li>
            <ul class="menu-list">
                <li><a href="/admin/guides">Guides</a></li>
                <li><a href="/admin/tags">Tags</a></li>
            </ul>
            <hr class="menu-separator">
            <li><a href="/authors">Authors</a></li>
            <ul class="menu-list">
                <li><a href="/authors">Modify Authors</a></li>
            </ul>
            <hr class="menu-separator">
            <li><a href="/books/">Books</a></li>
            <ul class="menu-list">
                <li><a href="/books/add">Add New Book</a></li>
                <li><a href="/books/">Modify Books</a></li>
            </ul>
            <hr class="menu-separator">
            <li><a class="/stock">Stock</a></li>
            <ul class="menu-list">
                <li><a href="/stock">Stock checker</a></li>
                <li><a href="/books/">Modify stock</a></li>
            </ul>
        </ul>
        <br>
    </div>
    <div class="col-md-9 offset-3">
        @yield('content')
    </div>
</div>
</body>

