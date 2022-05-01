Adicionar novo pet:

<form action="/pets" method="post">
    @csrf

    <label for="name">Nome</label>
    <input id="name" name="name" type="text" /> <br/>

    <label for="color">Cor</label>
    <input id="color" name="color" type="text" /> <br/>

    <label for="specie">Especie</label>
    <select name="specie" id="specie">
        <option value="pokémon">Pokémon</option>
        <option value="coelho">Coelho</option>
        <option value="cachorro">Cachorro</option>
        <option value="cobra">Cobra</option>
        <option value="dragão de komodo">Dragão de Komodo</option>
        <option value="ave">Ave</option>
        <option value="camaleão">Camaleão</option>
        <option value="camelo">Camelo</option>
        <option value="cavalo">Cavalo</option>
        <option value="gato">Gato</option>
        <option value="zebra">Zebra</option>
        <option value="outro">Outro</option>
    </select>
    <br/>

    <label for="size">Size</label>
    <select name="size" id="size">
        <option value="XS">XS</option>
        <option value="SM">SM</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
    </select>

    <br/>
    <button type="submit">
        Cadastrar
    </button>
</form>

<a href="/pets">Voltar</a>
