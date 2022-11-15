@extends('admin.master')
@section('content')
    <div class="card m-3 p-3">

<div class="container">
    <form   action="{{route('people.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>

        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>

        </div>
        <div class="mb-3">
            <label for="fathername" class="form-label">father Name</label>
            <input type="text" class="form-control" id="fathername" name="fathername" required>

        </div>
        <div class="mb-3">
            <label for="birthdate" class="form-label">Birthdate</label>
            <input type="date" class="form-control"  id="birthdate" name="birthdate" required>

        </div>

        <div class="mb-3">
            <label for="passport" class="form-label">Passport</label>
            <input type="text" class="form-control" id="passport" name="passport" required>

        </div>

        <div class="mb-3">
            @foreach($status as $value)
                <input type="checkbox" class="form-check-inline" id="checkbox{{ $value['id'] }}" name="status[]" value="{{ $value['id'] }}">
                <label for="checkbox{{ $value['id'] }}" class="form-label">{{ $value['status'] }}</label>
                <br>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
    </div>

@endsection
