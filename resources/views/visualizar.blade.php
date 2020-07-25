<h1>CEP - {{ $cep->cep }}</h1>
<h6>Incluído: {{ $cep->incluido_em }}  - Alterado: {{ $cep->alterado_em }}</h6>

<p>Dados do CEP:</p>
<hr>
Código: {{ $cep->id }}<br>
Logradouro: {{ $cep->logradouro }}<br>
Bairro: {{ $cep->bairro }}<br>
Localidade: {{ $cep->localidade }}<br>
UF: {{ $cep->uf }}<br>
Unidade: @if ($cep->unidade) {{ $cep->unidade }} @else {{ 'Não informado' }} @endif<br>
IBGE: @if ($cep->ibge) {{ $cep->ibge }} @else {{ 'Não informado' }} @endif<br>
GIA: @if ($cep->gia) {{ $cep->gia }} @else {{ 'Não informado' }} @endif<br>

<br><br><hr>

<a href="{{ url('/') }}">Pesquisar</a>
<a href="{{ url('/editar/'.$cep->id) }}">Editar</a>
<a href="{{ url('/deletar/'.$cep->id) }}">Deletar</a>
