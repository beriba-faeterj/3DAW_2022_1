
// Essa função recebe uma string e converta ela em um JSON. Se ocorrer algum erro
// (por exemplo, a string não está em formato JSON), a função retorna NULL.
function toJSON(string) {  
    try {
        return JSON.parse(string);  
    } catch (e) {
        return null;
    }
};

// Essa função recebe uma array de JSON de funcionários e lista cada item
// com as informações e formatação adequadas.
function retornaListaOnibus(array) {
    let stringRetorno = '<div id="form">';

    for (var i in array) {
        stringRetorno += `
            <br><br>
            ID:  ${array[i].id}<br>
            Marca:  ${array[i].marca}<br>
            Modelo: ${array[i].modelo}<br>
            Qtd. de assentos: ${array[i].qtdAssentos}<br>
            Possui banheiro: ${array[i].temBanheiro === '1' ? 'SIM' : 'NÃO'}<br>
            Possui ar condicionado: ${array[i].temArCondicionado === '1' ? 'SIM' : 'NÃO'}<br>
            Chassis: ${array[i].chassis}<br>
            Placa: ${array[i].placa}<br>

            <br>
            <div class="flex-container" style="justify-content: flex-start">
            <form method="post" action="../excluir/excluir.php">
            <input type="hidden" name="chassis" id="${'chassis' + array[i].chassis}" value="${array[i].chassis}">
            <input type="button" name="excluir" id="excluir" value="Excluir" onClick="excluirOnibus(${array[i].chassis});">
            </form>
            <form method="GET" action="../listar/listar.php">
            <input type="hidden" name="chassis" id="${'chassis' + array[i].chassis}" value="${array[i].chassis}">
            <input type="button" name="alterar" id="alterar" value="Alterar" onClick="geraFormAlteracao(${array[i].chassis});">
            </form>
            </div>
        `;
    }

    stringRetorno += "</div>"

    return stringRetorno;
}

function incluirOnibus() {
    const onibus = {
        "id": document.getElementById("id").value,
        "marca": document.getElementById("marca").value,
        "modelo": document.getElementById("modelo").value,
        "qtdAssentos": document.getElementById("qtdAssentos").value,
        "temBanheiro": document.getElementById("temBanheiro").checked === true ? 1 : 0,
        "temArCondicionado": document.getElementById("temArCondicionado").checked === true ? 1 : 0,
        "chassis": document.getElementById("chassis").value,
        "placa": document.getElementById("placa").value
    };

    const stringOnibus = JSON.stringify(onibus);

    const xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function() {
        document.getElementById("form").style.display = "none";

        document.getElementById("retorno").innerHTML = xmlhttp.responseText;
    }

    xmlhttp.open("POST", "../server/incluir.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("incluir=" + stringOnibus);
}

function excluirOnibus(chassis) {
    const onibus = {
        "chassis": document.getElementById("chassis" + (chassis ?? '')).value
    };

    const stringOnibus = JSON.stringify(onibus);

    const xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function() {
        document.getElementById("form").style.display = "none";

        document.getElementById("retorno").innerHTML = xmlhttp.responseText;
    }

    xmlhttp.open("POST", "../server/excluir.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("excluir=" + stringOnibus);
}

function listarOnibus(chassis) {
    const onibus = {
        "chassis": document.getElementById("chassis" + (chassis ?? '')).value
    };

    const stringOnibus = JSON.stringify(onibus);

    const xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function() {
        document.getElementById("form").style.display = "none";

        const retorno = xmlhttp.responseText;
        
        const arrayOnibus = toJSON(retorno);

        if (arrayOnibus === null) {
            document.getElementById("retorno").innerHTML = retorno;
        }
        else {
            document.getElementById("retorno").innerHTML = retornaListaOnibus(arrayOnibus);
        }
    }

    xmlhttp.open("GET","../server/listar_um.php?chassis=" + stringOnibus);
    xmlhttp.send();
}

function listarTodosOnibus() {
    const campoOrdenacao = {
        "campo": document.getElementById("ordenacao").value
    };

    const stringCampoOrdenacao = JSON.stringify(campoOrdenacao);

    const xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function() {
        document.getElementById("form").style.display = "none";

        const retorno = xmlhttp.responseText;
        
        const arrayOnibus = toJSON(retorno);

        if (arrayOnibus === null) {
            document.getElementById("retorno").innerHTML = retorno;
        }
        else {
            document.getElementById("retorno").innerHTML = retornaListaOnibus(arrayOnibus);
        }
    }

    xmlhttp.open("GET","../server/listar_todos.php?ordenacao=" + stringCampoOrdenacao);
    xmlhttp.send();
}

function geraFormAlteracao(chassis) {
    const onibus = {
        "chassis": document.getElementById("chassis" + (chassis ?? '')).value
    };

    const stringOnibus = JSON.stringify(onibus);

    const xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function() {
        document.getElementById("form").style.display = "none";

        const retorno = xmlhttp.responseText;
        
        const onibus = toJSON(retorno);

        if (onibus === null) {
            document.getElementById("retorno").innerHTML = retorno;
        }
        else {
            const stringRetorno = `
                <br><br>
                <div id="form2">
                <form method="GET" action="../server/listar_um.php">
                ID: <input type="text" name="id" id="id" value="${onibus[0].id}" required><br>
                Marca: <input type="text" name="marca" id="marca" value="${onibus[0].marca}" required><br>
                Modelo: <input type="text" name="modelo" id="modelo" value="${onibus[0].modelo}" required><br>
                Qtd. de assentos: <input type="text" name="qtdAssentos" id="qtdAssentos" value="${onibus[0].qtdAssentos}" required><br>
                Possui banheiro <input type="checkbox" name="temBanheiro" id="temBanheiro" value="" ${onibus[0].temBanheiro === '1' ? 'checked' : ''}><br>
                Possui ar condicionado <input type="checkbox" name="temArCondicionado" id="temArCondicionado" value="" ${onibus[0].temArCondicionado === '1' ? 'checked' : ''}><br>
                Chassis: <input type="text" name="chassis" id="chassis" value="${onibus[0].chassis}" disabled><br>
                Placa: <input type="text" name="placa" id="placa" value="${onibus[0].placa}" required><br><br>

                <input type="hidden" name="id" id="id" value="${onibus[0].id}">
                <input type="hidden" name="chassisALT" id="chassisALT" value="${onibus[0].chassis}">
                <input type="button" name="alterar" id="alterar" value="Alterar" onClick="alterarOnibus();">
                </form>
                </div>
                <br><br>
            `;

            document.getElementById("retorno").innerHTML = stringRetorno;
        }
    }

    xmlhttp.open("GET","../server/listar_um.php?chassis=" + stringOnibus);
    xmlhttp.send();
}

function alterarOnibus() {
    const onibus = {
        "id": document.getElementById("id").value,
        "marca": document.getElementById("marca").value,
        "modelo": document.getElementById("modelo").value,
        "qtdAssentos": document.getElementById("qtdAssentos").value,
        "temBanheiro": document.getElementById("temBanheiro").checked === true ? 1 : 0,
        "temArCondicionado": document.getElementById("temArCondicionado").checked === true ? 1 : 0,
        "chassis": document.getElementById("chassisALT").value,
        "placa": document.getElementById("placa").value
    };

    const stringOnibus = JSON.stringify(onibus);

    const xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function() {
        document.getElementById("form2").style.display = "none";
        
        document.getElementById("retorno").innerHTML = xmlhttp.responseText;
    }

    xmlhttp.open("POST", "../server/alterar.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("alterar=" + stringOnibus);
}
