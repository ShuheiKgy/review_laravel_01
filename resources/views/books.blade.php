@extends('layouts.app)

@section('content')

    <div class="panel-body">
        @include('common.errors')

        <form action="{{ url('books') }}" method="post">
            
        </form>
    </div>