function validarUsuario(usuario) {
    feedbackErroUsuario = document.getElementById('feedbackErroUsuario');

    if (usuario.length < 8) {
        feedbackErroUsuario.classList.remove('hide');
    } else {
        feedbackErroUsuario.classList.add('hide');
    }
}