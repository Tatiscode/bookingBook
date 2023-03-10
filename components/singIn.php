<!-- Section Design Block For Sign In -->
<section class="background-radial-gradient overflow-hidden">
  <style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          ¡Iniciar Sesion en Biblioteca Virtual!<br />
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
        Bienvenido a la Biblioteca, ¡¡Queremos conocerte!!
        Ven a vernos a la Biblioteca lo antes posible y descubrirás todo lo que tenemos para ayudarte con tus tareas académicas, durante los próximos años. En primer lugar queremos darte la más cordial bienvenida y desearte una feliz travesía en esta nueva etapa que comienzas.
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
        <div class="campos text-center  my-1 text-2xl text-danger"></div>

          <div class="card-body px-4 py-5 px-md-5">
            <form onsubmit="return false" class="formulario_r">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" class="form-control" id="email" name="email" />
                <label class="form-label" for="form3Example3" >Email</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password"class="form-control" id="password" name="password" />
                <label class="form-label" for="form3Example4">Contraseña</label>
              </div>

              <!-- Submit button -->
              <button type="submit"class="enviarDatos">
                Iniciar Sesion
              </button>
              <a href="http://localhost/Biblioteca/index.php">
                Crear cuenta
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>