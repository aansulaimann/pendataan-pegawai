// console.log('ok')

function sendValuePegawai(id, nmPegawai, email, noTelp) {
    window.opener.document.getElementById('idPegawai').value = id;
    window.opener.document.getElementById('nmPegawai').value = nmPegawai;
    window.opener.document.getElementById('email').value = email;
    window.opener.document.getElementById('noTelp').value = noTelp;
    window.close();
}

function sendValue(id, nmJabatan) {
    window.opener.document.getElementById('id').value = id;
    window.opener.document.getElementById('nmJabatan').value = nmJabatan;
    window.close();
}