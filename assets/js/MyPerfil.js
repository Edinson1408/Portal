MyPerfil=()=>{

    jQuery.ajax({
        url:'php/Mantenimiento/ModalPerfil.html', 
        success:(data)=>{
            //document.getElementById('ContenidoModalPerfil').innerHTML(data);
            jQuery('#ContenidoModalPerfil').html(data)
            jQuery('#ModalPerfil').modal()
        }
    })
    console.log('cambiar perfil');
}