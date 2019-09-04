
<html lang="es">
<head>
	<link rel="icon" type="image/png" href="img/" />
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
<div class="head-content">
	<div class="container" style="width: 70%;">
	<div class="cabecera">
		<a href="">
			<img src="img/logosb.jpg">
		</a>
	</div>
	</div>
</div>

<div class="cuerpo">
<div class="container" style="margin-bottom: 30px; width: 70%;">
	<div class="row">
	<div class="col-md-12">
	<h1 style="font-size: 18px; padding-bottom: 7px;">Ingresa a tu Campus Virtual</h1>
	</div>
	</div>

	<div class="row">
	<div class="col-md-8">
	<p>Es necesario la autentificación. Ingresa tu usuario y contraseña. </p>
	</div>
	<div class="col-md-4">
	<p>Login</p>
	</div>
	</div>

	<div class="login">
		<div class="separador" style="height: 17px;"></div>
		<div class="row">
		<div class="col-md-12">
		<div class="container">
		<div class="formulario">
		<div class="loguin-contenedor" style="width: 80%; margin: auto;">
			<form id='Login'>
				<div class="form-group row">
				<label class="col-sm-2 col-form-label">Usuario :</label>
				<div class="col-sm-10">
				<input class="form-control form-control-sm" type="text" id='Usuario' style="border-radius: 0;">
				</div>
				</div>
				<div class="form-group row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Contraseña :</label>
				<div class="col-sm-10">
				<input type="password" class="form-control form-control-sm" id="Password" style="border-radius: 0;">
				</div>
				</div>
				<div class="form-group row">
				<label for="staticEmail" class="col-sm-2 col-form-label"></label>
				<div class="col-sm-10">
				<a  type="submit" id='ACCEDER' class="btn btn-primary mb-2" style="border-radius: 0;text-decoration: none;color: white;">ACCEDER</a>
				<a href="" style="text-decoration: underline; display: inline-block; margin: 10px 0 0 10px;">¿Se olvidó su contraseña?</a>
				</div>
				</div>
			</form>
		</div>
		</div>
		</div>
		</div>
		</div>
		<div class="separador" style="height: 17px;"></div>
	</div>
</div>
</div>

<div class="footer">

				2019 © IESTP Simón Bolívar |  
				<span>Todos los derechos reservados</span><br>

				Calle 3 Nº 100 - Ciudad del Pescador (Altura de la Cdra. 32 Av. Colonial) - Bellavista - Callao | 
				<span>Teléfono</span>
				Teléfonos: 715-5260 / 715-5262
</div>
</body>
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
</html>

<script>
window.onload = function(){
    
   
    //Asignar la función externa al elemento con id=cerdo.
    document.getElementById("ACCEDER").onclick = ()=>{
		var User=document.getElementById('Usuario').value;
		var Pass=document.getElementById('Password').value;
		console.log(User);
		console.log(Pass);
		$.ajax({
			url:`../php/Config/Control.php`,
            method:'POST',
            data : {'Control':'Login','User':User,'Pass':Pass},
			success:(data)=>{
				//console.log(data);
				if (data=='[]'){
					console.log('usuario o contraseña errada')
				}
				else {
					$ObjLogin=JSON.parse(data);
				console.log($ObjLogin);
				console.log($ObjLogin[0]['APELLIDOS']);

				Object.keys($ObjLogin).forEach(
                    key =>{
                        console.log(key, $ObjLogin[key])
						console.log($ObjLogin[key]['NOM_USUARIO']);
                        // $HtmlTablas=`<tr><td>${obj[key]['NOM']}</td> 
                        // <td>${obj[key]['APE']}</td> 
                        // <td>${obj[key]['CARRERA']}</td> 
                        // <td>${obj[key]['CICLO']}</td>  
                        // <td><a onclick='Eliminar(${key})'>Eliminar</a>
                        // <a onclick='Editar(${key})'>Editar</a>
                        // </td>
                        // </tr>  `;
                        //  res = res.concat($HtmlTablas);
                    }
                    
                    );

					window.location.replace("../index.html");
				}
				


			}
		});
	};
}

</script>