@extends('layouts.blank')
@section('content')

    <h1 class="text-center">Libredesk</h1>

    <div class="col-10 offset-1 text-center">
        <p class="lead" style="margin: 1rem;">You have an overdue loan in our system!</p>

        <a href="https://libredesk_local.test/loans"><div class="btn btn-danger">{{ $loan->book->title }}</div></a><br>

        <p class="lead" style="margin: 1rem;">This was due back on {{ $loan->dueDate()->toFormattedDateString() }}</p>
        <p class="lead" style="margin: 1rem">Please return it as quickly as possible</p>
    </div>
@endsection
