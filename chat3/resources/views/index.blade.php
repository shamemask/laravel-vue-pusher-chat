<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat 3.0</title>
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>



    <div class="app">

        <header>
            <h1 class="auth">
                {{-- @guest --}}


                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    <h1 name="username" id="username">{{ Auth::user()->name }}</h1>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                          document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <p hidden name="id" id="id" :value="{{ Auth::user()->id }}" />

                    @else
                    <h1>Let's Talk! </h1>
                    <a href="{{ route('login') }}">Log
                        in</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                    @endif
                    @endauth

                </div>
            </h1>
            @endif
            {{-- @endguest --}}
            <div id="app">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>

        </header>

        <div id="messages"></div>

        <form id="message_form">
            <input type="text" name="message" id="message_input" placeholder="Write a message..." />
            <button type="submit" id="message_send">Send Message</button>
        </form>


    </div>
    <script src="./js/app.js"></script>
</body>

</html>
<style>
.chat {
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li {
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li .chat-body p {
    margin: 0;
    color: #777777;
}

.panel-body {
    overflow-y: scroll;
    height: 350px;
}

::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
    background-color: #555;
}

</style>
