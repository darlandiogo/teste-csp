@extends('layouts.app')
@section('content')
<br/>
<a  href="{{route('contact')}}"> <i class="fas fa-arrow-left"></i> </a>

<h2>Contato</h2>

<br/>
<br/>
<form method="POST" action="{{isset($contact) ? route('contact.update', $contact->id) : route('contact.store')}}">
    @csrf
    @if(isset($contact))
        @method('PUT')
    @endif
    <div class="form-row">
        <div class="col">
            <label>Nome</label>
            <input class="form-control" type="text" name="first_name" value="{{$contact->first_name ?? ''}}" required/>
        </div>
        <div class="col">
            <label>Sobrenome</label>
            <input class="form-control form-control" type="text" name="last_name" value="{{$contact->last_name ?? ''}}" required/>
        </div>
    </div>
    <br/>
    <div class="form-group">
        <label>E-mail</label>
        <input class="form-control" type="mail" name="email" value="{{$contact->email ?? ''}}" required/>
    </div>

    <div class="form-group">
        <label>Telefone</label>
        <input class="form-control" type="text" name="phone" value="{{$contact->phone ?? ''}}" required/>
    </div>

    <button class="btn btn-primary"> Salvar</button>

</form>
@stop
