Rutas=(Modulo,Nombre)=>{ 
    jQuery.ajax({
        url:`php/${Modulo}/${Nombre}.html`,
        success: function name(data) {
            //console.log(data);
            var Html=data;
            jQuery("#CuerpoPortal").html(`${Html}`);
            
            var URLactual = window.location;
            URLactual['hash']='#/'+Nombre;
            URLactual['carperta']=Modulo;
        }
      });

    


}