<!doctype html>
    <div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Продукты</h6>
            </div>
                @foreach ($products as $product)
                <div class="form-group">
                    <label>{{$product->name}}</label>
                </div>
                @endforeach

                <button type="submit" class="btn btn-success">
                    Сохранить
                </button>
        </div>
    </div>
</div>