<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalhes do Produto</title>

    <!--Para associar o Bootstrap 5 ao documento HTML-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--O arquivo será carregado depois do carregamento de todos os elementos da página-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>


</head>

<body>
    <h1>Detalhes do Produto</h1>

    <!--Imprimir mensagem de sucesso de Produto cadastrado-->
    <div class="mx-3">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>

    <div class="container table-responsive"> <!--Tabela responsiava-->
        <table class="table table-striped table-hover align-middle text center caption-top">
            <caption class="text-start"><b>Detalhes do Produto</b></caption>
            <a href="{{ route('produto.index') }}" class="btn btn-primary">Listar</a>

            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Categoria</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                    <tr>
                        <td>{{ $produto -> id }}</td>
                        <td>{{ $produto -> name }}</td>
                        <td class="text-truncate" style="max-width: 450px; word-wrap: break-word; white-space: normal; overflow-wrap: break-word;">{{ $produto -> description }}</td>
                        <td>{{ $produto -> category}}</td>
                    </tr>  
            </tbody>
        </table>
    </div>
</body>
</html>