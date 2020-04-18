@extends('layouts.app')

@section('content')

    @if(!empty($message))
        <div class="alert alert-success">{{$message}}</div>
    @endif
    <h3 class="text-center py-3">List of employees</h3>
    @if(count($data) > 0)
        <table class="table table-md">
            <thead>
            <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td class="text-center">{{$item->name}}</td>
                    <td class="text-center">{{$item->email}}</td>
                    <td class="text-center">{{$item->phone}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center">No active Employees</p>
    @endif
@endsection
