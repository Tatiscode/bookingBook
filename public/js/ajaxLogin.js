var enviarDatos = document.querySelector('.enviarDatos');
var camposError = document.querySelector('.campos');
var formulario_r = document.querySelector('.formulario_r');
enviarDatos.addEventListener('click',()=>{
var email = document.getElementById('email').value;
var password = document.getElementById('password').value;
var exprecionNombre = /^[a-zA-Z0-9\_\-]{4,16}$/;

if (email == "" || password == "") {
    camposError.innerHTML="Por favor completa todos los campos";
    setTimeout(()=>{
        camposError.innerHTML=""
    },2000)
    return;
}else{
    camposError.innerHTML="";

}

let method ="POST";
let URL = "../php/LoginUsuario.php";
let ajaxEnviar = new XMLHttpRequest();
ajaxEnviar.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var response = this.responseText;
      console.log(response);
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
        
        if (response == "NOT_EXITO") {
            Swal.fire({
                icon: 'error',
                title: 'Error...',
                text: 'El usuario no existe',
              })
        }
        if (response == "EXITO_OK"){
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
    title: 'Inicio de sesion exitoso',
    showConfirmButton: false,
    timer: 2000
  })
  formulario_r.reset();
  window.location.href ="http://localhost/Biblioteca/views/Welcome.php"
  return;
        }
        
    }
   
}
ajaxEnviar.open(method, URL,  true)
ajaxEnviar.setRequestHeader("content-type","application/x-www-form-urlencoded")
ajaxEnviar.send("emailEnviar="+ email + "& passwordEnviar="+password)
})
