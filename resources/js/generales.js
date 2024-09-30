//Descargar excel
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('downloadExcel').addEventListener('click', function() {
            var table = document.getElementById('bonosFull');
            var wb;

            // Crear una copia de la tabla sin la columna "Acciones"
            var clonedTable = table.cloneNode(true);

            // Eliminar la última columna (que es "Acciones") en la cabecera y en todas las filas
            var headerRow = clonedTable.querySelector('thead tr');
            headerRow.deleteCell(-1); // Eliminar última columna del encabezado

            // Eliminar la última columna en todas las filas del cuerpo de la tabla
            var rows = clonedTable.querySelectorAll('tbody tr');
            rows.forEach(function(row) {
                row.deleteCell(-1); // Eliminar última columna de cada fila
            });

            // Convertir la tabla modificada a un archivo Excel
            wb = XLSX.utils.table_to_book(clonedTable, { sheet: "Donaciones" });

            // Generar el archivo Excel
            XLSX.writeFile(wb, 'Reporte de todas las donaciones HKC.xlsx');
        });
    });

//Descargar excel
