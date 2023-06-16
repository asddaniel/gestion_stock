@extends('layouts.header')

@section('content')
<div class="container-fluid">
    @php
        $somme = 0;
    @endphp
    <div class="row pt-2 pb-2 px-3 rounded bg-white shadow">
        <form name="form_acheter" action="{{ route('lignevente.store') }}" method="post" class="col-lg-12">
            @csrf
            <div class="form-group">
                <label for=""> Choisir un produit</label>
                <select name="produit_id" id="" class="form-control">
                    @foreach ($produits as $produit)
                         <option quantite="{{ $produit->quantite }}" value="{{ $produit->id }}"> {{ $produit->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group pt-2">
                <label for="quantite">quantite</label>
                <input type="number" name="quantite" placeholder="nombres des pièces " class="form-control">
            </div>
            <input type="hidden" name="vente_id" value="{{ $vente->id }}">
            <div class="form-group">
                <button class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
    <div class="row bg-white">
        <table id="advanced_table " class="table">
            <thead>
                <tr>

                    <th class="nosort">image</th>
                    <th>Nom du produit</th>
                    <th>Quantité</th>

                    <th>Actions</th>
                    <th>prix unitaire</th>

                    <th>montant</th>

                </tr>
            </thead>
            <tbody>
        @foreach ($lignes_ventes as $vente)
        <tr>

            <td><img src="{{ asset('img/102348.png') }}" class="table-user-thumb" alt=""></td>
            <td>{{ $vente->produit->name }}</td>
            <td>
                {{ $vente->quantite }}
            </td>

            <td>
                <div class="d-flex justify-content-around">
                   <a href="{{ route('lignevente.destroy', $vente->id) }}"
                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $vente->id }}').submit();"><i class="ik ik-trash"></i></a>
                  {{-- <a href="{{ route('vente.show', $vente->id) }}"> <i class="ik ik-edit"></i></a> --}}
                  <form id="delete-form-{{ $vente->id }}" action="{{ route('lignevente.destroy', $vente->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                </div>

            </td>
            <td>{{ $vente->produit->prix }}</td>

            <td>{{ $vente->quantite*$vente->produit->prix }}</td>
            @php
            $somme+= $vente->quantite*$vente->produit->prix;
        @endphp

        </tr>
        @endforeach
        <tr>
            <td>Total : </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td></td>
            <td>{{ $somme }} </td>
        </tr>









            </tbody>
        </table>
    </div>
</div>
<script>
    document.form_acheter.addEventListener("submit", function(e){
        e.preventDefault();
        // alert("cool")
        //alert(this.elements["produit_id"].selectedOptions[0].getAttribute("quantite"))
        if(this.quantite.value>this.elements["produit_id"].selectedOptions[0].getAttribute("quantite")){
            Swal.fire({
             icon: 'error',
             title: 'Oops...',
             text: "pas assez de quantite",
             footer: 'insuffisant'
           })
        }else{
            this->submit();
        }
    });
</script>

@endsection

