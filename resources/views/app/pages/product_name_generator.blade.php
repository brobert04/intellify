@extends('app.index')
@section('title', 'Intellify - Code Generator')
@section('custom-css')
    <style>
        .browser-mockup {
            border-top: 2em solid rgba(230, 230, 230, 0.7);
            box-shadow: 0 0.1em 1em 0 rgba(0, 0, 0, 0.4);
            position: relative;
            border-radius: 15px;
            min-height: 400px;
            height: auto;
            padding: 25px;
            margin-top: 50px;
            word-wrap: break-word;
        }

        .browser-mockup:before {
            display: block;
            position: absolute;
            content: '';
            top: -1.25em;
            left: 1em;
            width: 0.5em;
            height: 0.5em;
            border-radius: 50%;
            background-color: #f44;
            box-shadow: 0 0 0 2px #f44, 1.5em 0 0 2px #9b3, 3em 0 0 2px #fb5;
        }

        .browser-mockup>* {
            display: block;
        }

        
        .scroll::-webkit-scrollbar {
            display: none;
        }
    </style>
@endsection
@section('content')
    <main style="margin-top: 100px" class="wow fadeInUp">
        <div class="page-section">
            <div class="container">
                <div class="text-center">
                    <h2 class="title-section"><span class="marked">Product name</span> Generator</h2>
                    <div class="divider mx-auto"></div>
                    <div class="subhead">Do you have a business idea in your head but you don't know where to start? You know what you'd like it to be about, but you don't know how to name your business/website? Using our AI model, you can generate name ideas for your business using just a few keywords.</div>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <button id="convert" type="button" class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-mic" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5z" />
                                <path
                                    d="M10 8a2 2 0 1 1-4    0V3a2 2 0 1 1 4 0v5zM8 0a3 3 0 0 0-3 3v5a3 3 0 0 0 6 0V3a3 3 0 0 0-3-3z" />
                            </svg>
                        </button>
                    </div>
                    <input class="form-control" id="prompt" name="prompt" placeholder="Enter the keywords">
                </div>
                <div class="form-group text-center mt-3">
                    <button type="button" class="btn btn-primary" id="btn">Generate</button>
                </div>
                <div class="browser-mockup">
                    <textarea class="form-control scroll" id="typed"
                        name="restypedult"style="border:none; position:absolute; top:0; left:0; right:0; bottom:0; resize:none;height: auto;"
                        readonly>
                    </textarea>
                </div>
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
            document.querySelector("#typed").innerHTML = '';
            $.ajax({
                type: 'POST',
                url: '{{ route('product_name_generator.store') }}',
                data: {
                    prompt: txt
                },
                success: function(data) {
                    displayResponse(data);
                }
            })
        });
    </script>
    <script></script>
@endsection
