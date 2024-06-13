<x-layout>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Cadastro de Médico</h3>
                <form action="/medico" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="crm" class="form-label">Número do CRM:</label>
                        <input type="number" class="form-control" id="crm" name="crm" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Número de contato:</label>
                        <input type="text" class="form-control" id="numero" name="numero" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>