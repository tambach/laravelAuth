@extends('layouts.app')

@section('content')
    <h3 class="text-center py-3">List of candidates</h3>
    @if(count($data) > 0)
        <table class="table table-md">
            <thead>
            <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
            <tr>
                <td class="text-center">{{$item->name}}</td>
                <td class="text-center">{{$item->email}}</td>
                <td class="text-center">{{$item->phone}}</td>
                <td class="text-center"><a class="btn btn-success btn-md" href="{{url('/qualify/'.$item->id)}}" role="button">qualify</a> </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center py-3">No active candidates</p>
    @endif
@endsection
