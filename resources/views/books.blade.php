@extends('layouts.app)

@section('content')

    <div class="panel-body">
        @include('common.errors')

        <form action="{{ url('books') }}" method="post" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="book" class="col-sm-3 control-label">Book</label>

                <div class="col-sm-6">
                    <input type="text" name="item_name" id="book-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-plus"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection