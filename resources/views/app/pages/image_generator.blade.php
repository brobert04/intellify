@extends('app.index')
@section('title', 'Intellify - Code Generator')
@section('custom-css')

@endsection
@section('content')
    <main style="margin-top: 100px" class="wow fadeInUp">
        <div class="page-section">
            <div class="container">
                <div class="text-center">
                    <h2 class="title-section"><span class="marked">Image</span> Generator</h2>
                    <div class="divider mx-auto"></div>
                    <div class="subhead">Have you ever wanted your ideas to come true? Using our AI model, you can turn any
                        idea or thought into a suggestive photo.</div>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <button id="convert" type="button" class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-mic" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5z" />
                                <path
                                    d="M10 8a2 2 0 1 1-4 0V3a2 2 0 1 1 4 0v5zM8 0a3 3 0 0 0-3 3v5a3 3 0 0 0 6 0V3a3 3 0 0 0-3-3z" />
                            </svg>
                        </button>
                    </div>
                    <input class="form-control" id="prompt" name="prompt" placeholder="Enter your idea...">
                </div>
                <div class="form-group text-center mt-3">
                    <button type="button" class="btn btn-primary" id="btn">Generate</button>
                </div>
                <div class="page-section">
                    <div class="container">
                        <div class="text-center wow fadeInUp">
                            <h2 class="title-section">Your<span class="marked"> Results</span></h2>
                            <div class="divider mx-auto"></div>
                            <img src="{{ asset('../assets/img/preloader.gif') }}" alt="preloader" style="margin: 0 auto;display: none" id="preloader">
                        </div>
                        <div class="row my-5 card-blog-row" id="result">
                        </div>
                    </div> <!-- .container -->
                </div> <!-- .page-section -->
            </div> <!-- .container -->
        </div>
    </main>
@endsection

@section('custom-js')
    <script>
        document.querySelector('#convert').addEventListener('click', () => {
            document.querySelector('#prompt').value = '';
            let speech = true;
            window.SpeechRecognition = window.webkitSpeechRecognition;
            const recognition = new SpeechRecognition();
            recognition.interimResults = true;
            recognition.continuous = true;

            recognition.addEventListener('result', e => {
                const transcript = Array.from(e.results)
                    .map(result => result[0])
                    .map(result => result
                        .transcript);
                document.querySelector('#prompt').value = transcript;
            })

            if (speech) {
                recognition.start();
            }
        });
    </script>
    <script>
        var speed = 20;

        function typeWriter(txt, elem) {
            let i = 0;

            function type() {
                if (i < txt.length) {
                    elem.innerHTML += txt.charAt(i);
                    i++;
                    setTimeout(type, speed);
                }
            }
            type();
        }

        function displayResponse(data) {
            let elem = document.getElementById("typed");
            let formattedData = data.replace(/(?:\r\n|\r|\n)/g, '\n'); // replace newlines with <br> tags
            typeWriter(formattedData, elem);
        }
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        document.querySelector('#btn').addEventListener('click', () => {
            let txt = document.querySelector('#prompt').value;
            document.querySelector('#result').innerHTML = '';
            $.ajax({
                type: 'POST',
                url: '{{ route('image_generator.store') }}',
                data: {
                    prompt: txt
                },
                beforeSend: function() {
                    $('#preloader').show();
                },
                complete: function() {
                    $('#preloader').hide();
                },
                success: function(data) {
                    var imageUrls = data.imageUrls;
                    for (var i = 0; i < imageUrls.length; i++) {
                        var div = $('<div>').addClass('col-md-6 col-lg-3 py-3 wow fadeInUp');
                        var img = $('<img>').css({
                            width: '100%',
                            height: '100%',
                            boxShadow: '0 0 10px rgba(0, 0, 0, 0.3)',
                            
                        });
                        div.append(img);
                        img.attr('src', imageUrls[i]);
                        $('#result').append(div);
                    }

                }
            })
        });
    </script>
    <script></script>
@endsection
