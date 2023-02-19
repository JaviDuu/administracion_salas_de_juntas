@extends('layouts.app')

@section('template_title')
    Update Room
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Room</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('rooms.updateDrop', $room->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        {{ Form::label('available') }}
                                        {{ Form::text('available', 'Available', ['class' => 'form-control' . ($errors->has('available') ? ' is-invalid' : ''), 'placeholder' => 'Available']) }}
                                        {!! $errors->first('available', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('entry_time') }}
                                        {{ Form::text('entry_time', Carbon\Carbon::now('America/Mexico_City'), ['class' => 'form-control' . ($errors->has('entry_time') ? ' is-invalid' : ''), 'placeholder' => 'Entry Time']) }}
                                        {!! $errors->first('entry_time', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('departure_time') }}
                                        {{ Form::text('departure_time', Carbon\Carbon::now('America/Mexico_City'), ['class' => 'form-control' . ($errors->has('departure_time') ? ' is-invalid' : ''), 'placeholder' => 'Departure Time']) }}
                                        {!! $errors->first('departure_time', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('reserve') }}
                                        {{ Form::text('reserve', $room->reserve, ['class' => 'form-control' . ($errors->has('reserve') ? ' is-invalid' : ''), 'placeholder' => 'Reserve']) }}
                                        {!! $errors->first('reserve', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                            
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
