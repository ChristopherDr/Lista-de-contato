async function deleteUser(id) {
   let right =  confirm("Deseja excluir este contato? ");
   if(right == true){
    let data = await fetch(
        "/listadecontato/src/delete/delete.php?id=" + encodeURIComponent(id)
    );

    //console.log(await data.text());

    location.reload();
   }

}
