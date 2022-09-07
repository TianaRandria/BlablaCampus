var url = window.location.pathname;
var filename = url.split('/').pop()
console.log(filename)
if (filename === "register.php") {
    document.querySelector('#textChanger').textContent = 'Créer votre compte';
}