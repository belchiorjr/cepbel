<h1>PESQUISAR CEP</h1>

<form method="post" action="{{ url('/pesquisar')}}" >
        
    <p>
        <label>Digite o Número do CEP:</label>
        <div><input type="text" name="cep" /></div>
    </p>

    <button class=="submit">Buscar</button>
</form>