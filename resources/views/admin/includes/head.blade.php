<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


    <link rel="stylesheet" href="{{ asset('css/adminlte.css?'.rand()) }}">



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
