let dados;

function carregarDados(callback) {
    fetch("http://guts3ds.atwebpages.com/ListarCarro.php")
    .then(conteudo => conteudo.text())
    .then(texto => {
        dados = JSON.parse(texto);
        callback();
        }
    )
}

function formatar(carro) {
    carro.ipva_pago = carro.ipva_pago === "1" ? "Sim" : "Não";
    carro.ipva_data = new Intl.DateTimeFormat('pt-br').format(new Date(carro.ipva_data));
    carro.ipva_valor = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(carro.ipva_valor);
}

function exibirTabela() {
    let tabela = '';

    dados.forEach(carro => {
        formatar(carro);

        tabela += '<tr>';
        tabela += `<td>${carro.placa}</td>`;
        tabela += `<td>${carro.ano}</td>`;
        tabela += `<td>${carro.ipva_pago}</td>`;
        tabela += `<td>${carro.ipva_data}</td>`;
        tabela += `<td>${carro.ipva_valor}</td>`;
        tabela += '</tr>';
    });

    document.getElementsByTagName('tbody')[0].innerHTML = tabela;
}

function iniciar() {
    carregarDados(exibirTabela);
}

window.onload = iniciar;