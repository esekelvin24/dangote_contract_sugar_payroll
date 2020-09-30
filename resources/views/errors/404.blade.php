@extends('layouts.appE')

@section('content')

     <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1>404</h1>
                <h3 class="text-uppercase">Where Are You Going?? !</h3>
                <p class="text-muted m-t-30 m-b-30">PAGE NOT FOUND</p>
                <a href="{{ url('/main') }}" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Back to home</a> </div>
            <footer class="footer text-center">© {{ date('Y') }} </footer>
        </div>
    </section>

@endsection