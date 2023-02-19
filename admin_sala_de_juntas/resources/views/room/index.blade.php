<?php use Illuminate\Support\Facades\DB;?>
@extends('layouts.app')

@section('template_title')
    Room
@endsection

@section('content')
<head>
    <meta http-equiv="refresh" content="30">
</head>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Room') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('rooms.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Available</th>
										<th>Entry Time</th>
										<th>Departure Time</th>
										<th>Reserve</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rooms as $room)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $room->available }}</td>
											<td>{{ $room->entry_time }}</td>
											<td>{{ $room->departure_time }}</td>
											<td>{{ $room->reserve }}</td>

                                            <td>
                                                <form action="{{ route('rooms.destroy',$room->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('rooms.show',$room->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('rooms.edit',$room->id) }}"><i class="fa fa-fw fa-edit"></i> Reserve</a>
                                                    <a class="btn btn-sm btn-warning" href="{{ route('rooms.drop',$room->id) }}"><i class="fa fa-fw fa-edit"></i> Drop</a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                    
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $rooms->links() !!}
            </div>
        </div>
    </div>
@endsection
@if(session('alert'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif

@section('scripts')
    <script>
        const dropButton = document.getElementById('drop-button');

        dropButton.addEventListener('click', function(event) {
            event.preventDefault(); // prevent the default link behavior

            const roomID = {{ $room->id }}; // get the room ID from the PHP variable

            // send an AJAX request to the server to drop the room
            fetch(`/rooms/${roomID}/drop`, { method: 'POST' })
                .then(response => {
                    if (response.ok) {
                        // reload the page to show the updated room list
                        window.location.reload();
                    } else {
                        throw new Error('Failed to drop the room.');
                    }
                })
                .catch(error => {
                    alert(error.message);
                });
        });
    </script>
@endsection
