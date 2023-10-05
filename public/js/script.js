document.addEventListener('DOMContentLoaded', function () {
    // Función para confirmar eliminación
    function confirmarEliminacion() {
        return confirm('¿Estás seguro de que deseas eliminar este elemento?');
    }

    // Manejar envío de formulario de edición de producto
    const editarForm = document.getElementById('editar-form');
    if (editarForm) {
        editarForm.addEventListener('submit', function (event) {
            event.preventDefault();

            // Realizar la lógica necesaria para enviar el formulario de edición
            // Puedes usar fetch() o enviar una solicitud POST al servidor
            // y manejar la respuesta según sea necesario
        });
    }

    // Manejar envío de formulario de registro de usuario
    const registroForm = document.getElementById('registro-form');
    if (registroForm) {
        registroForm.addEventListener('submit', function (event) {
            event.preventDefault();

            // Realizar la lógica necesaria para enviar el formulario de registro
            // Puedes usar fetch() o enviar una solicitud POST al servidor
            // y manejar la respuesta según sea necesario
        });
    }

    // Manejar eliminación de productos
    const eliminarLinks = document.querySelectorAll('.eliminar-link');
    eliminarLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            if (!confirmarEliminacion()) {
                event.preventDefault();
            }
        });
    });
});

