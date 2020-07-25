<h1>CEP EDIT</h1>


<p>{{$cep}}</p>


<a href="{{ url('/') }}">Pesquisar</a>
<a href="{{ url('/visualizar/'.$cep) }}">Visualizar</a>
<a href="{{ url('/deletar/'.$cep) }}">Deletar</a>
