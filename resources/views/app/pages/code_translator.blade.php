@extends('app.index')
@section('title', 'Intellify - Code Generator')
@section('custom-css')
    <style>
        .browser-mockup {
            border-top: 2em solid rgba(230, 230, 230, 0.7);
            box-shadow: 0 0.1em 1em 0 rgba(0, 0, 0, 0.4);
            position: relative;
            border-radius: 15px;
            min-height: 300px;
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

        .line-1 {
            position: relative;
            top: 50%;
            width: 100%;
            margin: 0 auto;
            border-right: 2px solid rgba(255, 255, 255, .75);
            font-size: 20px;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            transform: translateY(-50%);
        }

        /* Animation */
        .anim-typewriter {
            animation: typewriter 3s steps(100) 1s 1 normal both,
                blinkTextCursor 500ms steps(44) infinite normal;
        }

        @keyframes typewriter {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes blinkTextCursor {
            from {
                border-right-color: rgba(255, 255, 255, .75);
            }

            to {
                border-right-color: transparent;
            }
        }
    </style>
@endsection
@section('content')
    <main style="margin-top: 100px" class="wow fadeInUp">
        <div class="page-section">
            <div class="container">
                <div class="text-center">
                    <h2 class="title-section"><span class="marked">Code</span> Translator</h2>
                    <div class="divider mx-auto"></div>
                    <div class="subhead">You can use our AI model to translate your code from one programming languange to
                        antoher with just two clicks</div>
                </div>
                <div class="input-group mb-2 mt-4">
                    <select class="form-control col-lg-2" id="language" name="language">
                        <option value="Javascript">Javascript</option>
                        <option value="Python">Python</option>
                        <option value="Java">Java</option>
                        <option value="C++">C++</option>
                        <option value="C#">C#</option>
                        <option value="PHP">PHP</option>
                        <option value="Ruby">Ruby</option>
                        <option value="Swift">Swift</option>
                        <option value="Kotlin">Kotlin</option>
                        <option value="Go">Go</option>
                    </select>
                </div>
                <div class="input-group mb-2">
                    <textarea class="form-control" id="prompt" name="prompt" placeholder="Enter your code..." rows="5"
                        cols="30"></textarea>
                </div>
                <div class="form-group text-center mt-3">
                    <button type="button" class="btn btn-primary" id="btn">Translate</button>
                </div>
                <div class="input-group mb-2 mt-4">
                    <select class="form-control col-lg-2" id="translate_to" name="translate_to">
                        <option value="Javascript">Javascript</option>
                        <option value="Python">Python</option>
                        <option value="Java">Java</option>
                        <option value="C++">C++</option>
                        <option value="C#">C#</option>
                        <option value="PHP">PHP</option>
                        <option value="Ruby">Ruby</option>
                        <option value="Swift">Swift</option>
                        <option value="Kotlin">Kotlin</option>
                        <option value="Go">Go</option>
                    </select>
                </div>
                <div class="input-group mb-2">
                    <textarea class="form-control" id="result" name="result" placeholder="Your translated code will appear here" rows="5"
                        cols="30"></textarea>
                </div>
                
            </div> <!-- .container -->
        </div>
    </main>
@endsection

@section('custom-js')
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
            let elem = document.getElementById("result");
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
            let language = document.querySelector('#language').value;
            let translate_to = document.querySelector('#translate_to').value;
            $.ajax({
                type: 'POST',
                url: '{{ route('code_translator.store') }}',
                data: {
                    prompt: txt,
                    from: language,
                    to: translate_to
                },
                success: function(data) {
                    let elem = document.getElementById("result");
                    elem.innerHTML = '';
                    displayResponse(data);
                }
            })
        });
    </script>
@endsection
