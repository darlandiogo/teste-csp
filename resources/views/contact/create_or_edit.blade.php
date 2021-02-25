@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-start">
            <a href="{{route('contact')}}" class="btn btn-primary mb-4">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
            <h2 style="margin-left:2%">Contato</h2>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{isset($contact) ? route('contact.update', $contact->id) : route('contact.store')}}">
            @csrf
            @if(isset($contact))
                @method('PUT')
            @endif
            <div class="form-row">
                <div class="col">
                    <label>Nome</label>
                    <input class="form-control" type="text" id="first_name" name="first_name" value="{{$contact->first_name ?? ''}}" required/>
                </div>
                <div class="col">
                    <label>Sobrenome</label>
                    <input class="form-control form-control" type="text" id="last_name" name="last_name" value="{{$contact->last_name ?? ''}}" required/>
                </div>
            </div>
            <br/>
            <div class="form-group">
                <label>E-mail</label>
                <input class="form-control" type="mail" id="email" name="email" value="{{$contact->email ?? ''}}" required/>
            </div>

            <div class="form-group">
                <label>Telefone</label>
                <input class="form-control" type="text" id="phone" name="phone" maxlength="13" value="{{$contact->phone ?? ''}}" required/>
            </div>

            <button class="btn btn-primary"> <i class="fas fa-save"></i> Salvar</button>

        </form>
    </div>
</div>
<script>
  $(document).ready(function(){
    $('#phone').mask('(00) 0000-00009');
    $('#phone').blur(function(event) {
        if($(this).val().length == 15){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
            $('#phone').mask('(00) 00000-0009');
        } else {
            $('#phone').mask('(00) 0000-00009');
        }
    });
  });
</script>
@stop
