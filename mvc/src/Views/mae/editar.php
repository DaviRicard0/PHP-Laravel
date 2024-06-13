<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mãe</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Editar Mãe</h3>
                <form action="/mae/editar/<?=$mae['id']?>" method="post">
                    <div class="mb-3">
                        <label>Id:</label>
                        <input type="number" class="form-control disabled" value="<?=$mae['id']?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required value="<?=$mae['nome']?>">
                    </div>
                    <div class="mb-3">
                        <label for="idade" class="form-label">Idade:</label>
                        <input type="number" class="form-control" id="idade" name="idade" required value="<?=$mae['idade']?>">
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Número de contato:</label>
                        <input type="text" class="form-control" id="numero" name="numero" required value="<?=$mae['numero']?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <button type="submit" form="delete-form" class="btn btn-danger">Excluir</button>
                </form>
                <form method="POST" action="/mae/deletar/<?=$mae["id"]?>" id="delete-form"></form>
            </div>
        </div>
    </div>
</body>
</html>