<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    <link rel="stylesheet" href="{{ asset('css/adminlte.css?'.rand()) }}">

    {{-- cdn jquery yo use pusher must be put before push js --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    {{-- pusher with realtime to make import pusher--}}
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>

     {{-- Enable pusher logging - don't include this in production --}}    
     <script>   
         Pusher.logToConsole = true;

        var pusher = new Pusher('f4059aac666a677a7b9e', {
            cluster: 'mt1'
            });
    </script>
    <script src="{{asset('js/pusherNotification.js')}}"></script>
    {{-- <!-- FireBase-->
    <script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-messaging.js"></script> --}}


    {{-- <script>
        // Your web app's Firebase configuration
var firebaseConfig = {
apiKey: "AIzaSyAVi2Q8GFEYCnvRP1BEBA7kovUdND_P_-8",
authDomain: "basic-website-cc3a0.firebaseapp.com",
databaseURL: "https://basic-website-cc3a0.firebaseio.com",
projectId: "basic-website-cc3a0",
storageBucket: "basic-website-cc3a0.appspot.com",
messagingSenderId: "28209079997",
appId: "1:28209079997:web:2890530285c2b7692b79d4",
measurementId: "G-WG6P5MJ917"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
    </script> --}}


    {{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}

    <!-- FireBase-------------------------------->

      

</head>
