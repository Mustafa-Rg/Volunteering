@extends('layouts.post-app')

    @section('title') Submit @endsection
    @section('content')
    <div>
        <table class="table text-center mt-3 mx-3">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Why to apply?</th>
            </thead>
            <tbody>
                @foreach($volunteers as $volunteer)
                    @component('components.submition-component', ['volunteer' => $volunteer])@endcomponent
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection 