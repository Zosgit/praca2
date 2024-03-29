@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <div>Wydanie nr: <strong>{{$order->order_nr}}</strong></div>
        </div>
        <div class="card-body">
            <form action="{{ route('orderdetail.update',['order'=>$order, 'orderdetail' => $orderdetail]) }}" class="forms-sample" method="POST">
                @csrf
                @method('put')
                <div class="row p-2">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="product_id">Wybierz produkt</label>
                            <select name="product_id" class="form-select form-control @error('product_id') is-invalid @enderror" id="product_id" required>
                                <option value="">Wybierz</option>
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}"
                                    @if (isset($orderdetail))
                                    {{ $orderdetail->product_id == $product->id ? 'selected' : old($orderdetail->product_id) }}
                                @endif>
                                {{ $product->ean.' || '.$product->code.' || '.$product->longdesc }}</option>
                                @endforeach

                                @error('product_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="serial_nr">Numer seryjny</label>
                            <input type="text" name="serial_nr"
                                value="" class="form-control " id="serial_nr">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="expiration_at">Data ważności</label>
                            <input type="date" name="expiration_at"
                                value="" class="form-control " id="expiration_at">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="logical_area_id">Magazyn logiczny</label>
                            <select name="logical_area_id" class="select2-container form-control "  id="logicalarea_id" required>
                                <option value="">Wybierz</option>
                                @foreach ($logicalareas as $logicalarea)
                                <option value="{{ $logicalarea->id }}"
                                    @if (isset($orderdetail))
                                    {{ $orderdetail->logical_area_id == $logicalarea->id ? 'selected' : old($orderdetail->logical_area_id) }}
                                @endif>
                                {{ $logicalarea->longdesc}}</option>
                                @endforeach

                                @error('logical_area_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="quantity">Ilość</label>
                            <input type="number" min="0" name="quantity"
                                value="" class="form-control " id="quantity" required>

                            </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for=" remarks">Komentarz</label>
                            <input type="text" name="remarks"
                                value="" class="form-control " id="remarks">

                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-3">
                    <button type="submit" class="btn btn-primary mr-4">Dopisz</button>
                    <a href="{{ route('orderdetail.show',['order'=>$order])}}" class="btn btn-light">Anuluj</a>
                </div>

            </form>
            </div>
    </div>
    </div>
    </div>
</div>
@endsection
