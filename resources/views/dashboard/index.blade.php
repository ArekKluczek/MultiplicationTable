@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center flex-column">
        <form action="{{ route('dashboard.generate') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="size">Size of Multiplication Table:</label>
                <input type="number" class="form-control" id="size" name="size" value="10" min="1" max="100">
            </div>
            <button type="submit" class="btn btn-primary">Generate Table</button>
        </form>
    </div>
@endsection
