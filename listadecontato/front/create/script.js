async function insertElement() {
    let name = document.getElementById("name_form").value;
    let tel = document.getElementById("tel_form").value;
    let email = document.getElementById("mail_form").value;

    const dados = {
        name,
        tel,
        email,
    };

    let data = await fetch("create.php", {
        method: "POST",
        headers: {},
        body: JSON.stringify(dados),
    });
    window.location.href = "http://listadecontatos.infinityfreeapp.com/listadecontato/"
}


function verify(){
    let name = document.getElementById("name_form").value;
    let tel = document.getElementById("tel_form").value;
    let email = document.getElementById("mail_form").value;

    const regMail = /^[a-z0-9.]+@[a-z0-9]+\.[a-z]+(\.[a-z]+)?$/i
    const regTel = /(\(?\d{2}\)?\s)?(\d{4,5}\-?\d{4})/g

    let verifyTel = (regTel.test(tel))
    let verifyMail = (regMail.test(email))

    if(name == ''|| name == null){
        alert("Digite um nome!")

    } else if(tel == '' || tel == null){
        alert("Digite um número válido")

    } else if(email == '' || email == null){
        alert("Insira email válido!")

    }else if(verifyTel == false){
        alert("Digite um número válido")

    } else if(verifyMail == false){
        alert("O email digitado não existe!")

    }else{
        insertElement()
        alert("O contato foi cadastrado com sucesso!")
    }

}


document.getElementById("tel_form").addEventListener("input", function (e) {
    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
    e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});