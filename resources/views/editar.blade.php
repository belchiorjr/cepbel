<h1>CEP - {{ $cep->cep }} - Código: {{ $cep->id }}</h1>
<h6>Incluído: {{ $cep->incluido_em }}  - Alterado: {{ $cep->alterado_em }}</h6>
<hr>
<br>
<form action="{{ url('atualizar/'.$cep->id)}}" method="post" >
<div>
    <label><b>Logradouro</b>:<br></label>
    <div>
        <input type="text" value="{{ $cep->logradouro }}" name="logradouro" /><br><br>
    </div>
</div>
<div>
    <label><b>Bairro</b>:<br></label>
    <div>
        <input type="text" value="{{ $cep->bairro }}" name="bairro" /><br><br>
    </div>
</div>
<div>
    <label><b>Localidade</b>:<br></label>
    <div>
        <input type="text" value="{{ $cep->localidade }}" name="localidade" /><br><br>
    </div>
</div>

<div>
    <label><b>UF</b>:<br></label>
    <div>
        <input type="text" value="{{ $cep->uf }}" name="uf" /><br><br>
    </div>
</div>

<div>
    <label><b>Unidade</b>:<br></label>
    <div>
        <input type="text" value="{{ $cep->unidade }}" name="unidade" /><br><br>
    </div>
</div>

<div>
    <label><b>IBGE</b>:<br></label>
    <div>
        <input type="text" value="{{ $cep->ibge }}" name="ibge" /><br><br>
    </div>
</div>

<div>
    <label><b>GIA</b>:<br></label>
    <div>
        <input type="text" value="{{ $cep->gia }}" name="gia" /><br><br>
    </div>
</div>
<br><br>
<div>
    <input type="submit" value="Salvar" />
</div>
</form>

<br><br><hr>

<a href="{{ url('/') }}">Pesquisar</a>
<a href="{{ url('/editar/'.$cep->id) }}">Editar</a>
<a href="{{ url('/deletar/'.$cep->id) }}">Deletar</a>
