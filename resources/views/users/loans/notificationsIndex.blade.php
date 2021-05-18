@extends('layouts.main')
@section('title', 'Notifications')
@section('content')

    <div class="col-10 offset-1" style="margin-top: 2rem">
        <table class="table text-center">
            <thead>
                <th>No</th>
                <th>Notification Type</th>
                <th>Date</th>
                <th>Controls</th>
            </thead>
            <tbody>
                <?php $count = 1 ?>
                @foreach(auth()->user()->unreadNotifications as $notification)
                    <tr id="{{$notification->id}}">
                        <td>
                            {{ $count++ }}
                        </td>
                        <td>
                            {{ explode("\\", $notification->type)[2] }}
                        </td>
                        <td>
                            {{ $notification->created_at->toFormattedDateString() }}
                        </td>
                        <td>
                            <button onclick="read('{{$notification->id}}')" class="btn-primary btn" id="notifRead">Read</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script>
        function read($id) {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open("GET", 'https://libredesk_local.test/api/read/' + $id);
            xmlHttp.send(null)

            $('#'+$id).toggle(400);
        }
    </script>
@endsection
