<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('available') }}
            {{ Form::text('available', $room->available, ['class' => 'form-control' . ($errors->has('available') ? ' is-invalid' : ''), 'placeholder' => 'Available']) }}
            {!! $errors->first('available', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('entry_time') }}
            {{ Form::text('entry_time', $room->entry_time, ['class' => 'form-control' . ($errors->has('entry_time') ? ' is-invalid' : ''), 'placeholder' => 'Entry Time']) }}
            {!! $errors->first('entry_time', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('departure_time') }}
            {{ Form::text('departure_time', $room->departure_time, ['class' => 'form-control' . ($errors->has('departure_time') ? ' is-invalid' : ''), 'placeholder' => 'Departure Time']) }}
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