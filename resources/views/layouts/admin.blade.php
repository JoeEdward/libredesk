<DOCTYPE! html>
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
<div class="row" style="margin-top: 4%;">
    <div class="col-md-3 container sidebar-admin" style="overflow: scroll">
        <ul class="menu-list" style="margin-top: 3%">
            <li>Menu</li>
            <ul class="menu-list">
                <li><a href="/books/add">Add New Book</a></li>
                <li>Create Report</li>
                <li>Create New Guide</li>
                <li>Create New Tag</li>
                <li><a href="/books/">Modify Books</a></li>
                <li>Modify Authors</li>
            </ul>
            <hr class="menu-separator">
            <li><a href="/admin/users/index">Users</a></li>
            <ul class="menu-list">
                <li><a href="/admin/users/add">Add Users</a></li>
                <li><a href="/admin/users/index">Modify Users</a></li>
            </ul>
            <hr class="menu-separator">
            <li>Content</li>
            <ul class="menu-list">
                <li>Guides</li>
                <li>Tags</li>
            </ul>
            <hr class="menu-separator">
            <li>Authors</li>
            <ul class="menu-list">
                <li>Add new author</li>
                <li>Modify Authors</li>
            </ul>
            <hr class="menu-separator">
            <li><a href="/books/">Books</a></li>
            <ul class="menu-list">
                <li><a href="/books/add">Add New Book</a></li>
                <li><a href="/books/">Modify Books</a></li>
            </ul>
            <hr class="menu-separator">
            <li>Stock</li>
            <ul class="menu-list">
                <li>Stock checker</li>
                <li>Modify stock</li>
            </ul>
        </ul>
        <br>
    </div>
    <div class="col-md-9 offset-3">
        @yield('content')
    </div>
</div>
</body>

