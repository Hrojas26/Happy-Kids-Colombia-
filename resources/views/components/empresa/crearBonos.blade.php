<div class="container mt-5">
    <h2 class="mb-4">Gift Form</h2>
    <form action="{{ route('crear.bono') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="codigoBono" class="form-label">Codigo del Bono</label>
            <textarea class="form-control" id="codigoBono" name="codigoBono"></textarea>
        </div>
        <div class="mb-3">
            <label for="urlimage" class="form-label">Image URL</label>
            <input type="file" class="form-control" id="urlimage" name="urlimage">
        </div>
        <div class="mb-3">
            <label for="expirationDate" class="form-label">Expiration Date</label>
            <input type="date" class="form-control" id="expirationDate" name="expirationDate">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
