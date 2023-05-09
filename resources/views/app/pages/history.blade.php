@extends('app.index')
@section('title', 'Intellify - Usage History')
@section('content')
    <main>
        <div class="container mt-5">
            <div class="page-banner">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-md-6">
                        <h1 class="text-center">Hello, {{ auth()->user()->name }}!</h1>
                        <p class="text-center">This is the usage history of our services</h1>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-section">
            <div class="container text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-calendar2-x-fill" viewBox="0 0 16 16" style="color:#6C55F9">
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-6.6 5.146a.5.5 0 1 0-.708.708L7.293 10l-1.147 1.146a.5.5 0 0 0 .708.708L8 10.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 10l1.147-1.146a.5.5 0 0 0-.708-.708L8 9.293 6.854 8.146z"/>
                </svg>
                <p class="subhead mt-4">Whoops... Looks like you have not used our tools yet</p>
            </div>
        </div>
    </main>
@endsection
