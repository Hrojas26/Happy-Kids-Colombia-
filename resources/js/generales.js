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
//Particles
particlesJS("particles-js", {
    "particles": {
        "number": {
            "value": 90,
            "density": {
                "enable": true,
                "value_area": 3077.6758023658635
            }
        },
        "color": {
            "value": "#ffffff"
        },
        "shape": {
            "type": "circle",
            "stroke": {
                "width": 0,
                "color": "#000000"
            },
            "polygon": {
                "nb_sides": 5
            },
            "image": {
                "src": "img/github.svg",
                "width": 100,
                "height": 100
            }
        },
        "opacity": {
            "value": 0.2805971106514665,
            "random": false,
            "anim": {
                "enable": false,
                "speed": 1,
                "opacity_min": 0.1,
                "sync": false
            }
        },
        "size": {
            "value": 23.67442924896818,
            "random": true,
            "anim": {
                "enable": false,
                "speed": 40,
                "size_min": 0.1,
                "sync": false
            }
        },
        "line_linked": {
            "enable": false,
            "distance": 1042.21783956259,
            "color": "#ffffff",
            "opacity": 0.4,
            "width": 1
        },
        "move": {
            "enable": true,
            "speed": 6,
            "direction": "bottom",
            "random": true,
            "straight": false,
            "out_mode": "out",
            "bounce": false,
            "attract": {
                "enable": false,
                "rotateX": 600,
                "rotateY": 1200
            }
        }
    },
    "interactivity": {
        "detect_on": "canvas",
        "events": {
            "onhover": {
                "enable": true,
                "mode": "grab"
            },
            "onclick": {
                "enable": true,
                "mode": "push"
            },
            "resize": true
        },
        "modes": {
            "grab": {
                "distance": 400,
                "line_linked": {
                    "opacity": 1
                }
            },
            "bubble": {
                "distance": 400,
                "size": 40,
                "duration": 2,
                "opacity": 8,
                "speed": 3
            },
            "repulse": {
                "distance": 87.91208791208791,
                "duration": 0.4
            },
            "push": {
                "particles_nb": 4
            },
            "remove": {
                "particles_nb": 2
            }
        }
    },
    "retina_detect": true
});
//Particles
