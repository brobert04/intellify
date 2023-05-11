@extends('app.index')
@section('title', 'Intellify - Code Generator')
@section('custom-css')
    <style>
        .scroll::-webkit-scrollbar {
            display: none;
        }

        .footer {
            /* border: 1px solid red; */
            height: 50px;
            width: 100% text-align: center;
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
                <div class="input-group mb-2 mt-4" style="align-items: center">
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
                     <img src="{{ asset('../assets/img/preloader.gif') }}" alt="preloader" style="width:30px; height: 30px;margin-left: 10px; display: none" id="preloader">
                    <a style="cursor:pointer; display: none" id="copy">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"  class="bi bi-clipboard ml-3" viewBox="0 0 16 16">
                            <path
                                d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                            <path
                                d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                        </svg>
                    </a>
                </div>
                <div class="input-group">
                    <textarea class="form-control scroll" id="typed" style="resize:none;height: 300px;" name="typed" readonly>
                </textarea>
                </div>
                <div class="footer">

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
            let elem = document.getElementById("typed");
            let formattedData = data.replace(/(?:\r\n|\r|\n)/g, '\n'); // replace newlines with <br> tags
            typeWriter(formattedData, elem);
        }

        function copyText(txt) {
            navigator.clipboard.writeText(txt);
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
            document.querySelector("#typed").innerHTML = '';
            $('#copy').hide();
            $.ajax({
                type: 'POST',
                url: '{{ route('code_translator.store') }}',
                data: {
                    prompt: txt,
                    from: language,
                    to: translate_to
                },
                beforeSend: function() {
                    $('#preloader').show();
                },
                complete: function() {
                    $('#preloader').hide();
                },
                success: function(data) {
                    displayResponse(data);
                    $('#copy').show();
                    $('#copy').click(function() {
                        copyText(data);
                    });
                }
            })
        });
    </script>
@endsection
