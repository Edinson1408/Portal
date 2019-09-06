MyPerfil=()=>{

    jQuery.ajax({
        url:'php/Mantenimiento/ModalPerfil.html', 
        success:(data)=>{
            //document.getElementById('ContenidoModalPerfil').innerHTML(data);
            jQuery('#ContenidoModalPerfil').html(data)
        }
    })
    console.log('cambiar perfil');
}