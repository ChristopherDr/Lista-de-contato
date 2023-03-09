function showElement(){
    document.getElementById("table").style.display = "block";
}

function hiddenElement(){
    document.getElementById("table").style.display = "none";
}

async function idUpdateUser(id) {
    window.location.href = "./front/update/index.html?id=" + id;
}

async function searchAllUsers() {
    let resp = await fetch("./front/readall/read.php");

    let data = await resp.json();
    let table = document.getElementById("table");

    if(data == 0){
        console.log("Está vazio!")
    }else{
        showElement()

        table.innerHTML = " ";

        var line = `<tr class="line">`;
        line += `<th class="table_name">Nome</th>`;
        line += `<th class="table_name">Email</th>`;
        line += `<th class="table_name">Telefone</th>`;
        line += `</tr>`;

        for (let item of data) {
            line += `<tr>`;
            line += `<td class="column">${item.name}</td>`;
            line += `<td class="column">${item.email}</td>`;
            line += `<td class="column">${item.number}</td>`;
            line += `<td class="column1"><button class="edit_btn" onclick="idUpdateUser(${item.id} )"><img src="./front/readall/editar.png" alt=""></button></td>`;
            line += `<td class="column1"><button class="edit_btn" onclick="deleteUser(${item.id})"><img src="./front/readall/excluir.png" alt=""></button></td>`;
            line += `</tr>`;
        }

        table.innerHTML += line;
    }
}

async function searchUser(){
    hiddenElement()
    let info =  document.getElementById("search_form").value

    let resp = await fetch("./front/read/read.php", {
     method: "POST",
     headers: {},
     body: JSON.stringify(info)
    })
    let dados = await resp.json();
    let table = document.getElementById("table");
        showElement()

        table.innerHTML = " ";

        var line = `<tr class="line">`;
        line += `<th class="table_name">Nome</th>`;
        line += `<th class="table_name">Email</th>`;
        line += `<th class="table_name">Telefone</th>`;
        line += `</tr>`;

        for (let item of dados) {
            line += `<tr>`;
            line += `<td class="column">${item.name}</td>`;
            line += `<td class="column">${item.email}</td>`;
            line += `<td class="column">${item.number}</td>`;
            line += `<td class="column1"><button class="edit_btn" onclick="idUpdateUser(${item.id} )"><img src="./front/readall/editar.png" alt=""></button></td>`;
            line += `<td class="column1"><button class="edit_btn" onclick="deleteUser(${item.id})"><img src="./front/readall/excluir.png" alt=""></button></td>`;
            line += `</tr>`;
        }

        table.innerHTML += line;
 }


 window.onload = searchAllUsers();