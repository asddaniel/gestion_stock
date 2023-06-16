<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="index.html">

            <span class="text">Gestion des Stock</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">Navigation</div>
                <div class="nav-item active">
                    <a href="{{route('home')}}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                </div>
                <div class="nav-item">
                    <a href="{{ route("produit.home") }}"><i class="ik ik-menu"></i><span>Produits</span> </a>
                </div>

                <div class="nav-item">
                    <a href="{{ route("approvisionnement.index") }}"><i class="ik ik-layout"></i><span>Approvisionnements</span></a>
                </div>
                <div class="nav-item">
                    <a href="{{ route("vente.index") }}"><i class="ik ik-shopping-cart"></i><span>Ventes</span></a>
                </div>
                <div class="nav-item">
                    <a href="{{ route("client.index") }}"><i class="ik ik-users"></i><span>Clients</span></a>
                </div>



            </nav>
        </div>
    </div>
</div>
