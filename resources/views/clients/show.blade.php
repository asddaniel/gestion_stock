@extends('layouts.header')

@section('content')
<div class="container-fluid">


    <div class="row px-5 pt-3">
        <div class="card pt-2">
                <div class="h2 fw-bold text-center"> LISTE DES VENTES DU CLIENT {{ $client->name }}</div>
        </div>
    </div>
    <div class="row px-5 pt-2 pb-3">
        <div class="col-lg-4">
            <div class="card">
                <div class="text-center fw-bold h3">Ventes: {{ $dettes }}</div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="text-center fw-bold h3">Payements: {{ $payements }}</div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="text-center fw-bold h3"> Solde : {{ $payements-$dettes }}</div>
            </div>
        </div>
    </div>
    <div class="row px-2 pt-2 pb-3 bg-white shadow rounded">
           <form action="{{ route('payement.store') }}" method="post">
            @csrf
               <div class="form-group">
                <label for="montant" class="fw-bold text-start text-secondary">Ajouter un payement</label>
                <input type="number" name="montant" class="form-control">
                <input type="hidden" name="client_id" value="{{ $client->id }}">
            </div>
            <div class="form-group p-3">
                <button class="btn btn-primary shadow-sm">Enregistrer</button>
            </div>
           </form>
    </div>

    <div class="row bg-white">
        <table id="advanced_table " class="table">
            <thead>
                <tr>


                    <th>Nom du client</th>

                    <th>Actions</th>
                    <th>montant</th>
                    <th>date</th>

                </tr>
            </thead>
            <tbody>
        @foreach ($client->ventes as $vente)
        <tr>


            <td>{{ $vente->client->name }}</td>

            <td>
                <div class="d-flex justify-content-around">
                   <a href="{{ route('vente.destroy', $vente->id) }}"
                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $vente->id }}').submit();"><i class="ik ik-trash"></i></a>
                  <a href="{{ route('vente.show', $vente->id) }}"> <i class="ik ik-edit"></i></a>
                  <form id="delete-form-{{ $vente->id }}" action="{{ route('vente.destroy', $vente->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                </div>

            </td>
            <td>
                @php
                $somme = 0;
                    foreach ($vente->lignes as $ligne) {
                        $somme +=($ligne->produit->prix??0)*$ligne->quantite;
                    }
                @endphp
                {{ $somme }}
            </td>
            <td>{{ $vente->created_at }}</td>

        </tr>
        @endforeach


            </tbody>
        </table>
    </div>
</div>


@endsection

