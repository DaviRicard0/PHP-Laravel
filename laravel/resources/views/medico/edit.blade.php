<x-layout>
    <x-layout>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h3>Editar Médico</h3>
                    <form action="/medico/{{$medico->id}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="id" class="form-label">Id:</label>
                            <input type="text" class="form-control" readonly id="id" name="id" value="{{$medico->id}}">
                        </div>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{$medico->nome}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="crm" class="form-label">Número do CRM:</label>
                            <input type="number" class="form-control" id="crm" name="crm" value="{{$medico->crm}}" required>
                        </div>  
                        <div class="mb-3">
                            <label for="numero" class="form-label">Número de contato:</label>
                            <input type="text" class="form-control" id="numero" name="numero" value="{{$medico->numero}}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <button type="submit" form="delete-form" class="btn btn-danger">Excluir</button>
                    </form>
                    <form method="POST" action="/medico/{{$medico->id}}" id="delete-form">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </x-layout>
</x-layout>