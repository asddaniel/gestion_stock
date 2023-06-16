@extends('layouts.header')

@section('content')

<div class="container-fluid">
    <div class="row pt-2 pb-3 ">
        <div class="px-2 bg-white shadow col-lg-12 rounded">
            <div class="text-center fw-bold h2"> Ajouter une vente</div>
            <form class="form-group " method="POST" action="{{ route('vente.store') }}">
                @csrf
                <label for="client_name">Client</label>

                <div class="form-group">
                    <select name="client_id" id="" class="form-control">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary">Enregistrer</button>
            </form>
        </div>

    </div>
    <div class="row bg-white">
        <table id="advanced_table " class="table">
            <thead>
                <tr>

                    <th class="nosort">image</th>
                    <th>Nom du client</th>

                    <th>Actions</th>
                    <th>montant</th>
                    <th>date</th>

                </tr>
            </thead>
            <tbody>
        @foreach ($ventes as $vente)
        <tr>

            <td><img src="{{ asset('img/102348.png') }}" class="table-user-thumb" alt=""></td>
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
                0
            </td>
            <td>{{ $vente->created_at }}</td>

        </tr>
        @endforeach









            </tbody>
        </table>
    </div>
</div>

@endsection