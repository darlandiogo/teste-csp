@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h2>Contatos</h2>
            <a class="btn btn-primary mb-4" role="button" href="{{route('contact.create')}}">
                <i class="fas fa-plus"></i>
                Adicionar
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end">
            <input type="text" class="form-control" style="width:50%"id="searchTerm" placeholder="Buscar..." value="{{ Request::input('searchTerm') ?? ''}}"/>
            <button type="button" style="margin:0" id="searchTermBtn" class="btn btn-sm btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <br/>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome Completo</th>
                    <th>Telefone</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $item)
                    <tr>
                        <td> {{$item->first_name ?? ''}} {{$item->last_name ?? ''}}</td>
                        <td> {{$item->phone ?? ''}}</td>
                        <td>
                            <div class="d-flex flex-row">
                                <a href="{{route('contact.edit', $item->id)}}" style="margin-right:10px">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="post" action="{{route('contact.destroy', ['id' => $item->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a class="ref-delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Nenhum contato localizado!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination">
            {!! $contacts->links("pagination::bootstrap-4") !!}
        </div>
    </div>
</div>
<script>

    $(document).ready(function(){
        $('#fone').mask('(00) 0000-00009');
        $("#searchTermBtn").click(function(event){
            event.preventDefault();
            value = $("#searchTerm").val();
            if(value != '') {
                window.location = `{{route('contact')}}?search=${value}`
            }
            else {
                window.location = `{{route('contact')}}`;
            }
        });

        $(".ref-delete").click(function(){
            $(this).parent().submit();
        });
    });

</script>
@stop
