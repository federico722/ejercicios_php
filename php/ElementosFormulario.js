document.addEventListener('DOMContentLoaded', function () {
    const dificultadSelect =  document.getElementById('dificultad');
    const rangoSelect =  document.getElementById('rangoMinecraft');
    const actividadSelect = document.getElementById('actividad');

    const opciones = {
        facil: {
            rangos: ['Novato', 'Aprendiz', 'Iniciado'],
            actividades: ['Recolectar recursos', 'Construir casa básica', 'Explorar aldeas']
        },
        normal: {
            rangos: ['Aventurero', 'Explorador', 'Artesano'],
            actividades: ['Minar diamantes', 'Construir granja', 'Derrotar zombies']
        },
        dificil: {
            rangos: ['Guerrero', 'Maestro', 'Leyenda'],
            actividades: ['Derrotar al Ender Dragon', 'Construir ciudad', 'Sobrevivir en el Nether']
        }
    };

    function actualizarOpciones() {
        const dificultad = dificultadSelect.value;

        // limpiar opciones actuales
        rangoSelect.innerHTML = '';
        actividadSelect.innerHTML = '';

        opciones[dificultad].rangos.forEach(rango => {
            const option = document.createElement('option');
            option.value = rango;
            option.textContent = rango;
            rangoSelect.appendChild(option);
        });

        opciones[dificultad].actividades.forEach( actividad => {
            const option = document.createElement('option');
            option.value = actividad;
            option.textContent = actividad;
            actividadSelect.appendChild(option);
        });
    }

    dificultadSelect.addEventListener('change', actualizarOpciones);

    //Inicializar opciones
    actualizarOpciones();
    
})