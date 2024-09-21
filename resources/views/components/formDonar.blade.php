<div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">DONA UN JUGUETE</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('donaciones.store') }}">
                            @csrf

                            <div class="form-group mt-2">
                                <label for="address ">Dirección en donde recogeremos los juguetes</label>
                                <input id="address" type="text" class="form-control" name="address" required autofocus>
                            </div>

                            <div class="form-group mt-2">
                                <label for="dateCollection ">Fecha</label>
                                <input id="dateCollection" type="date" class="form-control" name="dateCollection" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="timeCollection ">Hora de recolección (entre 9:00 am y 6:00 pm)</label>
                                <input id="timeCollection" type="time" class="form-control" name="timeCollection" required min="09:00" max="18:00">
                            </div>
                            <div class="form-group mt-2">
                                <label for="numberToys ">¿Cuantos juguetes vas a donar?</label>
                                <input id="numberToys" type="number" class="form-control" name="numberToys" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="observations ">¿Que vas a donar?</label>
                                <input id="observations" type="text" class="form-control" name="observations" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-hkc">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
