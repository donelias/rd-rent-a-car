@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register Reservacion</div>
                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => 'reservations.store']) !!}}

                        {!! Field::text('no_reservation') !!}

                        {!! Field::text('date_in') !!}

                        {!! Field::text('date_out') !!}


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reservar
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
