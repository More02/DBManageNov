document.getElementById('add_dogovor').style.visibility = 'hidden';
document.getElementById('add_client').style.visibility = 'hidden';
let a=document.getElementById('add_table').value;
document.getElementById('add_button').onclick=function () {
    alert(a);
    if (a=="Договор") {
        document.getElementById('add_dogovor').style.visibility = 'visible';
    }
    if (a=="Клиент") {
        document.getElementById('add_client').style.visibility = 'visible';
    }

}

document.getElementById('delete_dogovor').style.visibility = 'hidden';
document.getElementById('delete_client').style.visibility = 'hidden';
let a=document.getElementById('delete_table').value;
document.getElementById('delete_button').onclick=function () {
    alert(a);
    if (a=="Договор") {
        document.getElementById('delete_dogovor').style.visibility = 'visible';
    }
    if (a=="Клиент") {
        document.getElementById('delete_client').style.visibility = 'visible';
    }

}


