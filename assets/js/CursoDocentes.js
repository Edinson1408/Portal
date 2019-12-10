ModalAgregarDocente=()=>{
    console.log('Agregar Docente');
        jQuery.ajax({
        url:`php/Mantenimiento/AgregarAlumno.html`,
        success: function name(data) {
            console.log(data);
            var Html=data;
            console.log(data);
            jQuery("#ContenidoModal").html(`${Html}`);
        }
      });
    }
      Enviar=()=>{
             conso=$('#FormularioEnnviar').serialize();
            console.log(conso);
      }


BuscarDocente=()=>{
          console.log('Buscar');
          let IdAlumno=jQuery('#IdAlumno').val();
          let Documento=jQuery('#Documento').val();
          let Periodo=jQuery('#Periodo').val();
          let Buscar='0';
          if (IdAlumno=='' &&  Documento=='' && Periodo=='')
          {
              console.log('Por Favor llene algun campo')
              swal('Por Favor llene algun campo');
          }else if ((Periodo!='' && IdAlumno=='') && (Periodo!='' && Documento=='') ) {
              console.log('Ingresar el id o dni del alumno')
              swal('Ingresar el id o dni del alumno');
          } else {
              if(Periodo=='' && (IdAlumno!='' || Documento!='') )
              {
                console.log('Ingresar el Periodo');
                swal('Ingresar el Periodo');
              }else {
                  console.log('todo ready')
                  Buscar='1';
              }
          }

    if(Buscar=='1')
    {
        console.log('enviamos el log');
         jQuery.ajax({
            url:`php/Controlador/DocenteC.php`,
            type: 'POST',
            data : {'Peticion':'DatosDocente','IdDocente':IdAlumno,'Documento':Documento,'Periodo':Periodo},
            success: (data)=> {
                console.log(data);
                let $Obj=JSON.parse(data);
                console.log($Obj);
                if(data =='[]'){
                    console.log("El Docente no se encuentra Registrado");
                }
                else 
                {
                    
                    jQuery.ajax({
                        url:`php/Registro/DetalleCursoDocente.html`,
                        success: function name(data) {
                        var Html=data;
                        jQuery("#profile").html(`${Html}`);
                        console.log(IdRegistro)
                            if (IdRegistro!=null) {
                                console.log('Actualizar');
                                jQuery('#IdDocente').val($Obj[0].IDDOCENTE);
                                jQuery('#Nombres').val($Obj[0].NOMBRES + ' ' +$Obj[0].APELLIDOS );
                                jQuery('#PeriodoA').val($Obj[0].PERIODO);
                                jQuery('#IdRegistro').val(IdRegistro);
                                
                                /*jQuery('#IdAlumno').val();
                                jQuery('#Nombres').val();
                                jQuery('#IdCarrera').val();
                                jQuery('#Periodo').val();*/
                                ArmarSelect('IdCarrera','carreras_tbl','IDCARRERA','DESCR250','');
                            }else{
                                console.log('Registrar');
                                jQuery('#IdAlumnoA').val($Obj[0].IDALUMNO);
                                jQuery('#Nombres').val($Obj[0].NOMBRES + ' ' +$Obj[0].APELLIDOS );
                                //jQuery('#IdCarrera').val();
                                if ($Obj[0].PERIODO!=null) {
                                    jQuery('#PeriodoA').val($Obj[0].PERIODO);
                                }else {
                                    jQuery('#PeriodoA').val(Periodo);    
                                }
                                ArmarSelect('IdCarrera','carreras_tbl','IDCARRERA','DESCR250','');
                                
                            }
                            jQuery('#profile-tab').click()
                        }
                    });
                }
            //var Html=data;
            //jQuery("#profile").html(`${Html}`);
            }
        });

    }
         


      }

      Prueba=()=>{
          console.log('hola');
      }