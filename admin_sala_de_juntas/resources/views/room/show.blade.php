@extends('layouts.app')

@section('template_title')
    {{ $room->name ?? 'Show Room' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Room</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('rooms.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Available:</strong>
                            {{ $room->available }}
                        </div>
                        <div class="form-group">
                            <strong>Entry Time:</strong>
                            {{ $room->entry_time }}
                        </div>
                        <div class="form-group">
                            <strong>Departure Time:</strong>
                            {{ $room->departure_time }}
                        </div>
                        <div class="form-group">
                            <strong>Reserve:</strong>
                            {{ $room->reserve }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
