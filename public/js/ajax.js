// Capturando los eventos de el formulario de registro
var enviarDatos = document.querySelector('.enviarDatos');
var camposError = document.querySelector('.campos');
var formulario_r = document.querySelector('.formulario_r');
enviarDatos.addEventListener('click',()=>{
    // captura los datos
var nombre = document.getElementById('nombre').value;
var email = document.getElementById('email').value;
var password = document.getElementById('password').value;
var exprecionNombre = /^[a-zA-Z0-9\_\-]{4,16}$/;
// valida los datos
if (nombre == "" || email == "" || password == "") {
    camposError.innerHTML="Por favor completa todos los campos";
    setTimeout(()=>{
        camposError.innerHTML=""
    },2000)
    return;
}else{
    camposError.innerHTML="";

}

// indica el origen de donde se van a ir lod datos
let method ="POST";
let URL = "./php/RegisterUsuario.php";
let ajaxEnviar = new XMLHttpRequest();
// manejo de estados dependiendo de la respueta 
ajaxEnviar.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var response = this.responseText;
      
        if (response == "Campo_vacio") {
            camposError.innerHTML ="Por favor completa todos los campos";
            return;
        }else{
            camposError.innerHTML="";
        }
        if (response == "errorComentario") {
            camposError.innerHTML ="El nombre es invalido %$&/( ! Y debera tener mas de 3 caracteres";
            return;
        }else{
            camposError.innerHTML="";

        }
        
        if (response == "POST404") {
            Swal.fire({
                icon: 'error',
                title: 'Error...',
                text: 'Por favor intenta de nuevo',
              })
        }
        if (response == "POST200"){
            let timerInterval
Swal.fire({
  title: 'Espera un momento!',
  html: 'Cargando<b></b> Datos',
  timer: 1000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
      
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
   
  }
});
Swal.fire({
    position: 'Exito',
    icon: 'success',
    title: 'Registro exitoso',
    showConfirmButton: false,
    timer: 2000
  })
  formulario_r.reset();
  window.location.href ="http://localhost/Biblioteca/views/login.php"
  return;
        }
        
    }
   
}
// metodo  
ajaxEnviar.open(method, URL,  true)
// los datos se envian tipo json
ajaxEnviar.setRequestHeader("content-type","application/x-www-form-urlencoded")
// se envia la informacion solicitada 
ajaxEnviar.send("nombreEnviar="+ nombre + "& emailEnviar="+ email + "& passwordEnviar="+password)
})
