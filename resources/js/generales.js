// Función para habilitar solo los sábados en el campo de fecha
function enableSaturdays() {
    const dateInput = document.getElementById('dateCollection');

    // Obtener la fecha actual
    const today = new Date();

    // Establecer la fecha mínima (hoy)
    dateInput.min = today.toISOString().split('T')[0]; // Formato YYYY-MM-DD

    // Establecer la fecha máxima a fin de año
    const endOfYear = new Date(today.getFullYear(), 11, 31); // 31 de diciembre
    dateInput.max = endOfYear.toISOString().split('T')[0]; // Formato YYYY-MM-DD

    // Evento para validar la selección del usuario
    dateInput.addEventListener('change', function() {
        const selectedDate = new Date(dateInput.value);
        if (selectedDate.getDay() !== 6) { // 6 es sábado
            alert('Por favor, selecciona un día sábado.');
            dateInput.value = ''; // Reiniciar el valor si no es un sábado
        }
    });
}

// Ejecutar la función al cargar la página
window.onload = enableSaturdays;
