@extends('layouts.app')
@section('content')
    <br/>
    <h2>Contatos</h2>
    <a class="btn btn-primary" href="{{route('contact.create')}}">Adicionar</a>
    <br/>
    <br/>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contacts as $item)
                <tr>
                    <td> {{$item->first_name ?? ''}}</td>
                    <td> {{$item->last_name ?? ''}}</td>
                    <td> {{$item->email ?? ''}}</td>
                    <td> {{$item->phone ?? ''}}</td>
                    <td>
                        <div class="d-flex flex-row">
                            <a href="{{route('contact.edit', $item->id)}}" style="margin-right:10px">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="post" class="form-delete" action="{{route('contact.destroy', ['id' => $item->id]) }}">
                                @csrf
                                @method('DELETE')
                                <a class="checklist-delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Nenhum contato localizado!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@stop
