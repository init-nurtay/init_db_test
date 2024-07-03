@extends('layouts.app')
@section('content')

    <form action="{{route('admin.leads.store')}}" method="post">
        @csrf
        @method('post')
        <input name="phone">
        <button class="btn btn-success">yeah yeah</button>
    </form>


<table class="table">
    <thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>company</th>
        <th>phone</th>
        <th>stage</th>
    </tr>
    </thead>
    <tbody>


    @foreach($leads as $lead)
        <tr>
            <td>
                {{$loop->iteration}}
            </td>
            <td>
                {{$lead->name}}
            </td>
            <td>
                {{$lead->email}}
            </td>
            <td>
                {{$lead->company}}
            </td>
            <td>
                {{$lead->phone}}
            </td>
            <td>
                {{$lead->stage}}
            </td>
            <td>
                <form action="{{route('admin.leads.destroy',$lead->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>



@endsection
