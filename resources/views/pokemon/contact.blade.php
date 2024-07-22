@extends('layouts.app')

@section('title', 'Página principal')

@section('content')

<section id="pokémon-contact" class="row">
    <h2>¿Te gustó mi trabajo? ¡Pues no dudes en contactarme!</h2>
    <div class="row">
        <div class="col-md-3 p-5">
            <a href="https://www.linkedin.com/in/erik-de-jes%C3%BAs-camacho-albores-348940102/">
                <img src="/images/linkedin.png" class="img-fluid">
            </a>
        </div>
        <div class="col-md-3 p-4">
            <a href="mailto:erik190794@gmail.com">
                <img src="/images/gmail.png" class="img-fluid">
            </a>
            
        </div>
        <div class="col-md-3 p-5">
            <a href="https://wa.me/528135837408">
                <img src="/images/whatsapp.png" class="img-fluid">
            </a>
        </div>
        <div class="col-md-3 p-5">
            <a href="https://github.com/ecamacho190794">
                <img src="/images/github.png" class="img-fluid">
            </a>
        </div>
    </div>
</section>

@endsection
