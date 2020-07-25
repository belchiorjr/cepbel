<h1>Mensagens de resultados</h1>


<p>{{ $mss }}</p>



@if (isset($erros) && $erros)
    <h5>Erros encontrados</h5>
    @foreach ($erros as $erro) 
        <p>{{ reset($erro) }}</p>
    @endforeach
@endif


<a href="{{ url('/') }}">Pesquisar</a>


@if (isset($voltar) && $voltar)
    <a href="javascript: {{ 'window.history.back()' }}">Tentar Novamente</a>
@endif