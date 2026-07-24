<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<div class="container-fluid mt-4">

    <div class="card shadow-sm" style="max-width: 500px;">

        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">✈ Registrar vuelo</h4>
        </div>


        <div class="card-body">


            <form id="formVuelo" action="insertar_vuelo.php" method="post" onsubmit="return validarVuelo();">


                <div class="mb-3">
                    <label class="form-label">Origen</label>
                    <input 
                        type="text" 
                        name="origen" 
                        id="origen"
                        class="form-control"
                        required>
                </div>


                <div class="mb-3">
                    <label class="form-label">Destino</label>
                    <input 
                        type="text" 
                        name="destino" 
                        id="destino"
                        class="form-control"
                        required>
                </div>


                <div class="mb-3">
                    <label class="form-label">Fecha</label>
                    <input 
                        type="date" 
                        name="fecha" 
                        id="fecha"
                        class="form-control"
                        required>
                </div>


                <div class="mb-3">
                    <label class="form-label">Plazas disponibles</label>
                    <input 
                        type="number" 
                        name="plazas_disponibles" 
                        id="plazas_disponibles"
                        class="form-control"
                        min="1"
                        required>
                </div>


                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input 
                        type="number" 
                        step="0.01" 
                        name="precio" 
                        id="precio"
                        class="form-control"
                        min="0.01"
                        required>
                </div>


                <button type="submit" class="btn btn-success w-100">
                    Guardar vuelo
                </button>


            </form>


        </div>

    </div>

</div>



<script>

function validarVuelo() {

    const plazas = document.getElementById('plazas_disponibles').value;
    const precio = document.getElementById('precio').value;


    if (plazas <= 0) {

        alert('Las plazas deben ser mayores a 0');
        return false;

    }


    if (precio <= 0) {

        alert('El precio debe ser mayor a 0');
        return false;

    }


    return true;

}

</script>