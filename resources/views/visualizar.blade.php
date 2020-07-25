<h1>CEP - {{ $cep }}</h1>

<p>Dados do CEP:</p>


<a href="{{ url('/') }}">Pesquisar</a>
<a href="{{ url('/editar/'.$cep) }}">Editar</a>
<a href="{{ url('/deletar/'.$cep) }}">Deletar</a>
