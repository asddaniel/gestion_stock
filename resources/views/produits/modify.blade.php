@extends('layouts.header')

@section('content')

<div class="card">
    <div class="card-header"><h3>modification du produit</h3></div>
    <div class="card-body">
        <form class="forms-sample" method="POST" action="{{ route('produit.update', $produit->id) }}">
            @method("PUT")
           @csrf <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" value="{{ $produit->name }}" required>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail3">prix</label>
                        <input type="number" name="prix" value="{{ $produit->prix }}" class="form-control" id="exampleInputEmail3" placeholder="prix" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleSelectGender">Quantité</label>
                        <input type="number" name="quantite" value="{{ $produit->quantite }}" placeholder="quantité" class="form-control" required>
                    </div>
                </div>
            </div>



            <div class="form-group">
                <label for="exampleTextarea1">Descriptions</label>
                <textarea class="form-control" name="description" id="exampleTextarea1" rows="4" required> {{ $produit->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>

        </form>
    </div>
</div>



@endsection
