$(document).ready(function(){
    $('#form_validar_clave_usuario').submit(function(e){
        e.preventDefault();
        var usuario = $('#usuario').val();
        var clave = $('#clave').val();
        if (usuario == null || usuario == "")
        {
            alert("Debe escribir su Usuario");
            document.form_validar_clave_usuario.usuario.focus();
            return false;
        }else if(clave == null || clave == "")
        {
            alert("Debe escribir su Clave");
            document.form_validar_clave_usuario.clave.focus();
            return false;
        }else{
            $.ajax({
                url:$(this).attr('action'),
                type:$(this).attr('method'),
                data:$(this).serialize(),
                success: function(response){
                    let respuesta = JSON.parse(response);
                    window.location.replace(respuesta);
                },
                error: function(xhr) {
                    if(xhr.status == 404){
                        var respuesta = JSON.parse(xhr.responseText);
                        $('#mensaje').html(respuesta);
                        $('#mensaje').addClass("alert alert-danger");
                        document.getElementById("mensaje").setAttribute("role", "alert");
                    }else{
                        alert('Error Servidor Intente enviar sus Datos otra vez!');
                    }
                    document.form_validar_clave_usuario.usuario.focus();
                }
            });
        }
    });
});

if(document.getElementById('boton_perfil'))
{
    document.getElementById('boton_perfil').addEventListener('click', function(){
        document.getElementById('boton_perfil').innerHTML = "Subiendo Información espere un momento";
        document.getElementById('boton_perfil').disabled=true;
        document.form_modificar_perfil.submit();
    });
}
