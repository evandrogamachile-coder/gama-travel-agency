<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<div class="container-fluid mt-4">


    <div class="card shadow-sm" style="max-width: 500px;">


        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">🏨 Registrar hotel</h4>
        </div>



        <div class="card-body">


            <form id="formHotel" 
                  action="insertar_hotel.php" 
                  method="post" 
                  onsubmit="return validarHotel();">



                <div class="mb-3">

                    <label class="form-label">Nombre del hotel</label>

                    <input 
                        type="text" 
                        name="nombre" 
                        id="nombre"
                        class="form-control"
                        required>

                </div>




                <div class="mb-3">

                    <label class="form-label">Ubicación</label>

                    <input 
                        type="text" 
                        name="ubicacion" 
                        id="ubicacion"
                        class="form-control"
                        required>

                </div>




                <div class="mb-3">

                    <label class="form-label">Habitaciones disponibles</label>

                    <input 
                        type="number" 
                        name="habitaciones_disponibles" 
                        id="habitaciones_disponibles"
                        class="form-control"
                        min="1"
                        required>

                </div>




                <div class="mb-3">

                    <label class="form-label">Tarifa por noche</label>

                    <input 
                        type="number" 
                        step="0.01"
                        name="tarifa_noche" 
                        id="tarifa_noche"
                        class="form-control"
                        min="0.01"
                        required>

                </div>




                <button type="submit" class="btn btn-success w-100">
                    Guardar hotel
                </button>



            </form>


        </div>


    </div>


</div>




<script>

function validarHotel() {


    const hab = document.getElementById('habitaciones_disponibles').value;

    const tarifa = document.getElementById('tarifa_noche').value;



    if (hab <= 0) {

        alert('Las habitaciones deben ser mayores a 0');
        return false;

    }



    if (tarifa <= 0) {

        alert('La tarifa debe ser mayor a 0');
        return false;

    }



    return true;


}

</script>