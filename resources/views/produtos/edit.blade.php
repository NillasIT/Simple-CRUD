<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visibilidade</title>

  <!--Para associar o Bootstrap 5 ao documento HTML-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!--O arquivo será carregado depois do carregamento de todos os elementos da página-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
</head>

<body>
    <h1>Cadastro de Produto</h1>

    <div class="mx-3">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>


  <div class="container">
    <a href="{{ route('produto.index') }}" class="btn btn-primary">Listar</a>

    <form action="{{ route('produto.update', ['produto' => $produto -> id]) }}" method="POST">
        @csrf 
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
        </div>
        
        <div class="col-8">
            <input type="text" name="name" class="form-control" placeholder="Digite o nome do Produto" value="{{ old( 'name', $produto -> name) }}">
        </div>

        <div class="my-3">
            <label for="description" class="form-label">Description</label>
        </div>
        
        <div class="col-8">
            <input type="text" name="description" class="form-control" placeholder="Digite a descrição do Produto" value="{{ old( 'name', $produto -> description) }}">
        </div>

        <div class="my-3">
            <label for="category" class="form-label">Category</label>
        </div>
        
        <div class="col-8">
            <input type="text" name="category" class="form-control mb-3" placeholder="Digite a Categoria do Produto" value="{{ old( 'name', $produto -> category) }}"">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
  </div>
</body>
</html>