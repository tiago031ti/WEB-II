const URL = 'https://parallelum.com.br/fipe/api/v1/carros/marcas'
const marcaCarros = document.getElementById("marcaCarros")
const modeloCarros = document.getElementById("modeloCarros")

const callApiMarca = async () => {
    try {   
        await fetch(URL)
            .then(response => response.json())
            .then(data => {
                data.forEach(marcaOpcao => {
                    marcaCarros.appendChild(new Option(marcaOpcao.nome, marcaOpcao.codigo))
                })
            })
    } catch (error) {
        console.error(error)
    }
}

const callApiModelo = async (value) => {
    modeloCarros.innerHTML = ""

    try {
        await fetch(`https://parallelum.com.br/fipe/api/v1/carros/marcas/${value}/modelos`)
            .then(response => response.json())
            .then(data => {
                console.log(data)
                data.modelos.forEach(modeloOpcao => {
                    modeloCarros.appendChild(new Option(modeloOpcao.nome, modeloOpcao.codigo))
                })
            })
    } catch (error) {
        console.error(error)
    }
}

addEventListener("DOMContentLoaded", callApiMarca)
addEventListener("change", () => {
    const valueOption = marcaCarros.value
    callApiModelo(valueOption)
})  