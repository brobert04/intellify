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
        @if ($responses->count() <= 0)
            <div class="page-section">
                <div class="container text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor"
                        class="bi bi-calendar2-x-fill" viewBox="0 0 16 16" style="color:#6C55F9">
                        <path
                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-6.6 5.146a.5.5 0 1 0-.708.708L7.293 10l-1.147 1.146a.5.5 0 0 0 .708.708L8 10.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 10l1.147-1.146a.5.5 0 0 0-.708-.708L8 9.293 6.854 8.146z" />
                    </svg>
                    <p class="subhead mt-4">Whoops... Looks like you have not used our tools yet</p>
                </div>
            </div>
        @else
            <div class="page-section">
                <div class="container">
                    <div class="row">
                        @foreach ($responses as $r)
                            <div class="col-md-6 col-lg-4 py-3">
                                <div class="card-blog">
                                    <div class="header">
                                        <div class="entry-footer">
                                            <div class="post-author">{{ $r->section }}</div>
                                            <a href="#"
                                                class="post-date">{{ \Carbon\Carbon::parse($r->created_at)->format('d/m/Y') }}</a>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="post-title"><a href="blog-single.html"
                                                style="text-transform: capitalize">{{ $r->prompt }}</a></div>
                                        <div class="post-excerpt">{{ $r->response }}</div>
                                    </div>
                                    {{-- <div class="footer">
                                        <a id="copy">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                                <path
                                                    d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                                <path
                                                    d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                            </svg></a>
                                    </div> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </main>
@endsection
@section('custom-js')
<script>
    document.querySelector('')
</script>
@endsection
