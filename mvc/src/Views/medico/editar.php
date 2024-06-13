<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médico</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Editar Médico</h3>
                <form action="/medico/editar/<?=$medico['id']?>" method="post">
                    <div class="mb-3">
                        <label>Id:</label>
                        <input type="number" class="form-control disabled" value="<?=$medico['id']?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required value="<?=$medico['nome']?>">
                    </div>
                    <div class="mb-3">
                        <label for="crm" class="form-label">Número do CRM:</label>
                        <input type="number" class="form-control" id="crm" name="crm" required value="<?=$medico['crm']?>">
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Número de contato:</label>
                        <input type="text" class="form-control" id="numero" name="numero" required value="<?=$medico['numero']?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <button type="submit" form="delete-form" class="btn btn-danger">Excluir</button>
                </form>
                <form method="POST" action="/medico/deletar/<?=$medico["id"]?>" id="delete-form"></form>
            </div>
        </div>
    </div>
</body>
</html>