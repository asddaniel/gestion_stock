@extends('layouts.header')

@section('content')

<div class="container-fluid">
    <div class="pt-2 pb-2 row px-3 shadow mb-2 bg-white rounded ">
        <form action="{{ route('client.store') }}" method="post">
            @csrf
            <div class="form-group pt-2 pb-2">
                <label for="" class="fw-bold h3">Crée un nouveau client</label>
            </div>
            <div class="form-group">
                <label for="#" class="fw-bold text-secondary">Nom</label>
                <input type="text" name="name" placeholder="nom du client" class="form-control">
            </div>
            <div class="form-group p-2">
                <button class="btn btn-primary">Enregistrer</button>
            </div>

        </form>

    </div>
    <div class="row bg-white shadow">
        <table id="advanced_table " class="table">
            <thead>
                <tr>

                    <th class="nosort">image</th>
                    <th>Nom du client</th>

                    <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody>
        @foreach ($clients as $client)
        <tr>

            <td><img src="img/users/1.jpg" class="table-user-thumb" alt=""></td>
            <td>{{ $client->name }}</td>

            <td>
                <div class="d-flex justify-content-around">
                   <a href="{{ route('client.destroy', $client->id) }}"
                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $client->id }}').submit();"><i class="ik ik-trash"></i></a>
                  <a href="#"> <i class="ik ik-edit"></i></a>
                  <form id="delete-form-{{ $client->id }}" action="{{ route('client.destroy', $client->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                </div>

            </td>
            <td>
                0
            </td>

        </tr>
        @endforeach









            </tbody>
        </table>
    </div>
</div>
@endsection