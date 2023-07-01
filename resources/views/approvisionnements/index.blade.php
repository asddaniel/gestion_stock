@extends('layouts.header')

@section('content')

<div class="card">
    <div class="card-header"><h3>Approvisionner un produit dans le stock</h3></div>
    <div class="card-body">
        <form class="forms-sample" method="POST" action="{{ route('approvisionnement.store') }}">
           @csrf <div class="form-group">
                <label for="exampleInputName1">Produit</label>
               <select name="produit_id" id="" class="form-control">
                @foreach ($produits as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach

               </select>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>prix d'achat</label>
                        <input type="number" name="prix_achat" class="form-control" id="exampleInputEmail3" placeholder="prix" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleSelectGender">Quantité</label>
                        <input type="number" name="quantite" placeholder="quantité" class="form-control" required>
                    </div>
                </div>
            </div>




            <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>

        </form>
    </div>
</div>

<div class="card">
    <div class="card-header row">
        <div class="col col-sm-3">
            <div class="card-options d-inline-block">
                <a href="#"><i class="ik ik-inbox"></i></a>
                <a href="{{ route('produit.home') }}"><i class="ik ik-plus"></i></a>
                <a href="#"><i class="ik ik-rotate-cw"></i></a>
                <div class="dropdown d-inline-block">
                    <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-more-horizontal"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">plus</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-sm-6">
            <div class="card-search with-adv-search dropdown">
                <form action="">
                    <input type="text" class="form-control global_filter" id="global_filter" placeholder="chercher.." required>
                    <button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
                    <button type="button" id="adv_wrap_toggler" class="adv-btn ik ik-chevron-down dropdown-toggle" data-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="adv-search-wrap dropdown-menu dropdown-menu-right" aria-labelledby="adv_wrap_toggler">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control column_filter" id="col0_filter" placeholder="Name" data-column="0">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control column_filter" id="col1_filter" placeholder="Position" data-column="1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control column_filter" id="col2_filter" placeholder="Office" data-column="2">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control column_filter" id="col3_filter" placeholder="Age" data-column="3">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control column_filter" id="col4_filter" placeholder="Start date" data-column="4">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control column_filter" id="col5_filter" placeholder="Salary" data-column="5">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-theme">rechercher</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col col-sm-3">
            <div class="card-options text-right">
                <span class="mr-5" id="top">1 - 50 of 2,500</span>
                <a href="#"><i class="ik ik-chevron-left"></i></a>
                <a href="#"><i class="ik ik-chevron-right"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="advanced_table" class="table">
            <thead>
                <tr>
                    <th class="nosort" width="10">
                        <label class="custom-control custom-checkbox m-0">
                            <input type="checkbox" class="custom-control-input" id="selectall" name="" value="option2">
                            <span class="custom-control-label">&nbsp;</span>
                        </label>
                    </th>
                    <th class="nosort">image</th>
                    <th>produit</th>
                    <th>Prix d'achat</th>

                    <th>quantité</th>
                    <th>date</th>
                    <th>Actions</th>
                    <th>supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($approvisionnements as $app)
                <tr>
                    <td>
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                            <span class="custom-control-label">&nbsp;</span>
                        </label>
                    </td>
                    <td><img src="img/users/1.jpg" class="table-user-thumb" alt=""></td>
                    <td>{{ $app->produit->name ?? "" }}</td>
                    <td>{{ $app->prix_achat }}</td>

                    <td>{{ $app->quantite }}</td>
                    <td>{{ $app->created_at }}</td>
                    <td>
                        <div class="d-flex justify-content-around">
                           <a href="{{ route('produit.delete', $product->id) }}"><i class="ik ik-trash"></i></a>
                          <a href="{{ route('produit.edit', $product->id) }}"> <i class="ik ik-edit"></i></a>
                        </div>

                    </td>
                    <td> <i class="ik ik-trash"></i></td>
                </tr>

                @endforeach




            </tbody>
        </table>
    </div>
</div>

@endsection
