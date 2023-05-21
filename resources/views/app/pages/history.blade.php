@extends('app.index')
@section('title', 'Intellify - Usage History')
@section('custom-css')
<style>
     .scroll::-webkit-scrollbar {
            display: none;
        }

</style>
@endsection
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
                    <table class="table">
                        <tbody>
                            <thead>
                                <tr>
                                    <th scope="col">Section</th>
                                    <th scope="col">Prompt</th>
                                    <th scope="col">Response</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>

                            @foreach ($responses as $r)
                                <tr>
                                    <td>{{ $r->section }}</td>
                                    <td
                                        style="  max-width: 200px;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;text-transform: capitalize">
                                        {{ $r->prompt }}</td>
                                    <td
                                        style="  max-width: 200px;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;">
                                        {{ $r->response }}</td>
                                    <td>{{ \Carbon\Carbon::parse($r->created_at)->format('d/m/Y') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModalCenter{{ $r->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                              </svg>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter{{ $r->id }}" tabindex="-2"
                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">{{ $r->prompt }} <br> <span style="font-size: 15px; color:grey">{{ \Carbon\Carbon::parse($r->created_at)->format('d/m/Y') }}</span></h5>
                                                <p></p>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <textarea class="modal-body scroll" style="height:200px;border: none;resize:none" readonly>
                                                {{ $r->response }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                        <tfoot>
                            {{ $responses->links() }}
                        </tfoot>
                    </table>
                </div>
            </div>
        @endif


    @endsection
    @section('custom-js')
    @endsection
