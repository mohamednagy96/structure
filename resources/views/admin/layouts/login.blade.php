
<!DOCTYPE html>
<html>

    @include('admin.includes.head')

    <body class="hold-transition login-page">

        @yield('content')

        <script src="{{ asset('js/admin_main.js?'.rand()) }}"></script>

<!-- @section('scripts')
<script>
const messaging = firebase.messaging();
messaging.usePublicVapidKey("BFMhRQBJacJfQYsuUKm4suvBpIn9za8tEtpkM1JPqJC49IxpJX687Y5JeHVm6XlrrBCiRwSJwwOoC_nGUJUfYlw");

    axios.post('/api/seve_token',  {
        test:'test'

    }).then(res => {
   console.log(res)
    });



</script>
@endsection -->

    </body>

</html>
