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
                    <h2 class="title-section"><span class="marked">Code</span> Generator</h2>
                    <div class="divider mx-auto"></div>
                    <div class="subhead">Our AI model is at your disposal and helps you whenever you need. If you have any
                        doubts about the code you wrote, or you simply don't know how to do a certain task, just ask it a
                        question and it will help you.</div>
                </div>
                <form action="#" class="mt-3">
                    <div class="input-group mb-3">
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
                        <input class="form-control" id="prompt" name="prompt" placeholder="Enter your prompt...">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="btn">Button</button>
                    </div>
                </form>
                <div class="browser-mockup">
                    <p id="typed"></p>
                </div>
            </div> <!-- .container -->
        </div>
    </main>
@endsection

@section('custom-js')
    <script>
        document.querySelector('#convert').addEventListener('click', () => {
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

        document.querySelector('#btn').addEventListener('click', () => {
            let txt = document.querySelector('#prompt').value;
            let elem = document.getElementById("typed");
            typeWriter(txt, elem);
        });
    </script>
@endsection
