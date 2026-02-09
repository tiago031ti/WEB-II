<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Consulta FIPE</title>
</head>
<body>

<select id="marca">
    <option value="">Marca</option>
</select>

<select id="modelo">
    <option value="">Modelo</option>
</select>

<select id="ano">
    <option value="">Ano</option>
</select>

<pre id="resultado"></pre>

<script>
async function get(url) {
    const r = await fetch(url);
    return r.json();
}


get('marcas.php').then(data => {
    data.forEach(m => {
        marca.innerHTML += `<option value="${m.codigo}">${m.nome}</option>`;
    });
});


marca.onchange = async () => {
    modelo.innerHTML = '<option value="">Modelo</option>';
    ano.innerHTML = '<option value="">Ano</option>';
    resultado.textContent = '';

    if (!marca.value) return;

    const data = await get(`modelos.php?marca=${marca.value}`);
    data.modelos.forEach(m => {
        modelo.innerHTML += `<option value="${m.codigo}">${m.nome}</option>`;
    });
};


modelo.onchange = async () => {
    ano.innerHTML = '<option value="">Ano</option>';
    resultado.textContent = '';

    if (!modelo.value) return;

    const data = await get(
        `anos.php?marca=${marca.value}&modelo=${modelo.value}`
    );

    data.forEach(a => {
        ano.innerHTML += `<option value="${a.codigo}">${a.nome}</option>`;
    });
};

ano.onchange = async () => {
    if (!ano.value) return;

    const data = await get(
        `preco.php?marca=${marca.value}&modelo=${modelo.value}&ano=${ano.value}`
    );

    resultado.textContent = JSON.stringify(data, null, 2);
};
</script>

</body>
</html>
