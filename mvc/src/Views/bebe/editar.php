<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebê</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Editar Bebê</h3>
                <form action="/bebe/editar/<?=$bebe['id']?>" method="post">
                    <div class="mb-3">
                        <label>Id:</label>
                        <input type="number" class="form-control disabled" value="<?=$bebe['id']?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required value="<?=$bebe['nome']?>">
                    </div>
                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso:</label>
                        <input type="number" class="form-control" step="0.01" value="<?=$bebe['peso']?>" name="peso" id="peso" required>
                    </div>
                    <div class="mb-3">
                        <label for="sexo" class="form-label">Sexo:</label>
                        <select id="sexo" name="sexo" class="form-control" required>
                            <option value="1" value="<?=$bebe['sexo'] === "1" ? "selected" : ""?>">Masculino</option>
                            <option value="2" value="<?=$bebe['sexo'] === "2" ? "selected" : ""?>">Feminino</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <button type="submit" form="delete-form" class="btn btn-danger">Excluir</button>
                </form>
                <form method="POST" action="/bebe/deletar/<?=$bebe["id"]?>" id="delete-form"></form>
            </div>
        </div>
    </div>
</body>
</html>