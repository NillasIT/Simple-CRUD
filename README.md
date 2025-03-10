## Requisitos

* PHP 8.4
* Composer

## Sequência para criar o Projecto
Criar o Projecto com Laravel
...

composer create-project laravel/laravel
...

Iniciar o Projecto criado com  o Laravel
...
php artisan serve

Acessar o contéudo padrão do Projecto
http://127.0.0.1:8000
...

Criar uma Routa de acesso de requisições GET, direccionando a um Controller, no caso aqui UserController, referenciando o metodo index e usando um nome para acessar a routa

Route::get('/', [UserController::class, 'index']) -> name('user.index');
...


Criar um controller UserController

php artisan make:controller UserController
...


Dentro do meu UserController, preciso criar um método index que foi referenciado na routa user.index, carregando uma view

public function index() {
        //Carregar a view
        return view("users.index");
    }
}
...


Criar a view 'users.index', nesse index vamos trabalhar com o bootstrap

php artisan make:view 'users.index'
...


Em seguida vamos trabalhar com o Banco de Dados
Primeiro devemos configurar o novo arquivo .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Celke
DB_USERNAME=root
DB_PASSWORD=nillas
...


A seguir criamos uma migration
Executar as migration
php artisan make:migration
...


Criar uma model para mapear uma tabela

php artisan make:model User
...

Preencher o model
...


Agora ir no nosso arquivo de routas web.php, indicando que pretendo carregar um arquivo que vai ter um formulário, routa para criação de usuários

Route::get('/create-user', [UserController::class, 'create']) -> name('user.create');
...


Após criar a routa, vou agora criar uma função para retornar uma view 'users.create'

Depois, crio a própria view 'users.create'

php artisan make:view users.create
...

Crio links de navegação entre as páginas

<a href="{{ route('user.create') }}">Novo Usuário</a>
<a href="{{ route('user.index') }}">Voltar</a>
...


Em seguida crio um formulário na view create.blade.php
no formulário eu indico o methodo que será usado, no caso será o POST, e também os dados seráo enviados para a seguinte página 'user.store'


<form action="{{ route('user.store')}}" method="POST">
        @csrf <!-- token de segurança -->
        @method('POST')

        <label for="" class="mb-3">Nome</label>
        <input type="text" name="name" placeholder="Digite seu nome completo"><b><br>

        <label for="" class="mb-3">E-mail</label>
        <input type="email" name="email" placeholder="Digite seu E-mail"><b><br>

        <label for="" class="mb-3">Senha</label>
        <input type="password" name="password" placeholder="Digite a sua palavra-passe"><b><br>

        <button type="submit">Cadastrar</button>
</form>
...


Depois vou no meu user Controller, implemento o método store
Dentro da Store, é necessário implementar a validação, indicando que os campos são obrigátorios

Criar um arquivo de request com validações

php artisan make:request NomedoRequest
php artisan make:request UserRequest
...

Após criar a validação, vamos usar injecção de classe, referenciando o nosso UserRequest como um tipo de variável na nossa função 'store'

public function store(UserRequest $request) {
        $request -> validated(); //Valida os dados do formulário

        //Cadastrar no banco
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        //Redirecionar o usuario para a routa listar
        return redirect() -> route('user.index') -> with('success', 'Usuário cadastrado com sucesso!');
    }
}
...


Voltamos no nosso metodo index e adicionamos uma função

$users = User::orderByDesc('id');

User::orderByDesc('id'):

Chama o Model User para realizar uma consulta ao banco de dados.

orderByDesc('id'): Ordena os registros pela coluna id em ordem decrescente (do mais recente para o mais antigo).
...

Em seguida vamos imprimir 

@forelse ($users as $user) <!-- -->
        ID: {{ $user -> id }} <br>
        NOME: {{ $user -> name }} <br>
        E-MAIL: {{ $user -> email }} <br>
        <br>
    @empty
        
    @endforelse


    Implementação do Editar

    1. Primeiro definir a routa
    #   S i m p l e - C R U D  
 #   S i m p l e - C R U D  
 