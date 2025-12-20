
let btnAuto = document.getElementById('btnAuto')
console.log(anceta);
if (btnAuto) {
    btnAuto.addEventListener('click', (e) => {
        document.getElementById('fio').value = fio ? fio : '';
        document.getElementById('email').value = email ? email : '';
        document.getElementById('age').value = anceta.age ? anceta.age : '';
        document.getElementById('tel').value = anceta.tel ? anceta.tel : '';
        document.getElementById('city').value = anceta.city ? anceta.city : '';
        document.getElementById('rost').value = anceta.rost ? anceta.rost : '';
        document.getElementById('ves').value = anceta.ves ? anceta.ves : '';
        document.getElementById('staj').value = anceta.staj ? anceta.staj : '';
        document.getElementById('fizNagr').value = anceta.fizNagr ? anceta.fizNagr : '';
        document.getElementById('zabolevaniya').value = anceta.zabolevaniya ? anceta.zabolevaniya : '';
        document.getElementById('davlenie').value = anceta.davlenie ? anceta.davlenie : '';
        document.getElementById('chrono').value = anceta.chrono ? anceta.chrono : '';
        document.getElementById('opora').value = anceta.opora ? anceta.opora : '';
        document.getElementById('perenosimost').value = anceta.perenosimost ? anceta.perenosimost : '';
        document.getElementById('level').value = anceta.level ? anceta.level : '';
        document.getElementById('prohod').value = anceta.prohod ? anceta.prohod : '';
        document.getElementById('perenosimostGori').value = anceta.perenosimostGori ? anceta.perenosimostGori : '';
        document.getElementById('ravn').value = anceta.ravn ? anceta.ravn : '';
        document.getElementById('comment').value = anceta.comment ? anceta.comment : '';
    })
}
