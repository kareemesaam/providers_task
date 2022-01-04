@extends('layouts.app')

@section('title')
    All Providers
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('All Providers') }}</div>

                    <div class="card-body">
                        <h1>All Providers</h1>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($providers as $provider)
                                <tr>
                                    <th scope="row" class="text-danger">{{ $loop->iteration }}</th>
                                    <td><a href="{{route('provider.domain',$provider->user_name)}}">{{ $provider->name }}</a> </td>
                                    <td>{{ $provider->email }}</td>
                                </tr>
                            @empty
                                <p>No Providers Yet </p>
                            @endforelse
                            </tbody>
                        </table>

                        {{ $providers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
