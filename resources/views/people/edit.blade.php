@extends('admin.master')
@section('content')
    <div class="card m-3 p-3">

        <div class="container">
            <form   action="{{route('people.update',$people->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="firstname" class="form-label">Ism</label>
                    <input type="text" class="form-control" id="firstname" value="{{$people->firstname}}" name="firstname" required>

                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Familiyasi</label>
                    <input type="text" class="form-control" id="lastname" value="{{$people->lastname}}" name="lastname" required>

                </div>
                <div class="mb-3">
                    <label for="fathername" class="form-label">Otasining Ismi</label>
                    <input type="text" class="form-control" id="fathername" value="{{$people->fathername}}" name="fathername" required>

                </div>
                <div class="mb-3">
                    <label for="birthdate" class="form-label">Tug'ilgan yili</label>
                    <input type="date" class="form-control"  id="birthdate" value="{{$people->birthdate}}"  name="birthdate" required>

                </div>

                <div class="mb-3">
                    <label for="passport" class="form-label">Passport</label>
                    <input type="text" class="form-control" id="passport" value="{{$people->passport}}" name="passport" required>

                </div>

                <div class="mb-3">
                    @foreach($status as $value)
                        <input type="checkbox" @if(in_array($value['id'], $array)) checked @endif class="form-check-inline" id="checkbox{{ $value['status'] }}" name="status[]" value="{{ $value['id'] }}">
                        <label for="checkbox{{ $value['id'] }}" class="form-label">{{ $value['status'] }}</label>
                        <br>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Saqlash</button>
            </form>
        </div>
    </div>

@endsection
