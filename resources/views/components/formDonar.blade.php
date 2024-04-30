<div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">DONA UN JUGUETE</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('donaciones.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <input id="address" type="text" class="form-control" name="address" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="dateCollection">Fecha de recolección</label>
                                <input id="dateCollection" type="date" class="form-control" name="dateCollection" required>
                            </div>
                            <div class="form-group">
                                <label for="timeCollection">Hora de recolección (entre 9:00 y 18:00)</label>
                                <input id="timeCollection" type="time" class="form-control" name="timeCollection" required min="09:00" max="18:00">
                            </div>
                            <div class="form-group">
                                <label for="numberToys">Cantidad de juguetes a donar</label>
                                <input id="numberToys" type="number" class="form-control" name="numberToys" required>
                            </div>
                            <div class="form-group">
                                <label for="observations">Observación</label>
                                <input id="observations" type="text" class="form-control" name="observations" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
