@extends('admin.master')
@section('content')

            <div class="card m-3 p-3">


                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div><br />
                @endif

<div class="container">
    <a href="{{route('people.create')}}" class="btn btn-primary">Fuqaro Qo'shish</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ismi</th>
            <th scope="col">Familiyasi</th>
            <th scope="col">Otasining Ismi</th>
            <th scope="col">Tug'ilgan yili</th>
            <th scope="col">Passport</th>
            <th scope="col">Amallar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($peoples as $key=>$people)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$people->firstname}}</td>
            <td>{{$people->lastname}}</td>
            <td>{{$people->fathername}}</td>
            <td>{{$people->birthdate}}</td>
            <td>{{$people->passport}}</td>
            <td class="">


                <form action="{{route('people.destroy', $people->id)}}" class="d-flex" method="post">
                    <a href="{{route('people.show',$people->id)}}" class="btn btn-info m-1"> <i class="fa fa-eye"></i></a>
                    <a href="{{route('people.edit',$people->id)}}" class="btn btn-info m-1"> <i class="fa fa-pen"></i></a>
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger m-1 show_confirm"><i
                                class="fa fa-trash"></i></button>
                </form>

            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
    </div>
@endsection
<script src="">

</script>