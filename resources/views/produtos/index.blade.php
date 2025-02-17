<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem de Produtos</title>

    <!--Para associar o Bootstrap 5 ao documento HTML-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--O arquivo será carregado depois do carregamento de todos os elementos da página-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>

    <!-- Link para Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
    <h1>Listagem de produtos</h1>

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
            <caption class="text-start"><b>Listagem de Produtos</b></caption>
            <a href="{{ route('produto.create') }}" class="btn btn-primary">Add</a>

            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Categoria</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                @forelse ($produtos as $produto)
                    <tr>
                        <td>{{ $produto -> id }}</td>
                        <td>{{ $produto -> name }}</td>
                        <td class="text-truncate" style="max-width: 450px">{{ $produto -> description }}</td>
                        <td>{{ $produto -> category}}</td>

                        <td style="padding-right: 1px">
                            <a href="{{ route('produto.show', ['produto' => $produto]) }}" class="btn btn-success" style="width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;">
                              <i class="bi bi-eye"></i>
                            </a>
                        </td>
                        
                        <td>
                            <a href="{{ route('produto.edit', ['produto' => $produto]) }}" class="btn btn-warning" style="width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;">
                              <i class="bi bi-pencil"></i>
                            </a>
                        </td>

                        <td >
                            <form method= "POST" action="{{ route('produto.destroy', ['produto' => $produto]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" style="width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Nenhum produto cadastrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>