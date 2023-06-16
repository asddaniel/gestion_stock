
@extends('layouts.header')

@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Produits</h6>
                            <h2>{{ $produits->count() }}</h2>
                        </div>
                        <div class="icon">
                            <i class="ik ik-award"></i>
                        </div>
                    </div>
                    <small class="text-small mt-10 d-block">6% higher than last month</small>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%;"></div>
                </div>
            </div>
        </div>


        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Approvisionneents</h6>
                            <h2>{{ $approvisionnement->count() }}</h2>
                        </div>
                        <div class="icon">
                            <i class="ik ik-briefcase"></i>
                        </div>
                    </div>
                    <small class="text-small mt-10 d-block">Total </small>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                </div>
            </div>
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
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>quantite</th>
                        <th>Date de création</th>
                        <th>action</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produits as $product)
                <tr>
                    <td>
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                            <span class="custom-control-label">&nbsp;</span>
                        </label>
                    </td>
                    <td><img src="{{ asset('img/102348.png') }}" class="table-user-thumb" alt=""></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->prix }}</td>

                    <td>{{ $product->quantite }}</td>
                    <td>{{ $product->created_at }}</td>
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
</div>




        <div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="quick-search">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 ml-auto mr-auto">
                                    <div class="input-wrap">
                                        <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                        <i class="ik ik-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="container">
                            <div class="apps-wrap">
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                                <div class="app-item dropdown">
                                    <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-command"></i><span>Ui</span></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-mail"></i><span>Message</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-users"></i><span>Accounts</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-shopping-cart"></i><span>Sales</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-briefcase"></i><span>Purchase</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-server"></i><span>Menus</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-clipboard"></i><span>Pages</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-message-square"></i><span>Chats</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-map-pin"></i><span>Contacts</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-box"></i><span>Blocks</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-calendar"></i><span>Events</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-bell"></i><span>Notifications</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-pie-chart"></i><span>Reports</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-layers"></i><span>Tasks</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-edit"></i><span>Blogs</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-settings"></i><span>Settings</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-more-horizontal"></i><span>More</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
