<div id="breadcrumbs-wrapper">
<div class="header-search-wrapper grey lighten-2 hide-on-large-only">
<input type="text" name="serch" class="header-search-input z-depth-2" placeholder="Explore materialize"> 
</div>
<div class="container">
    <div class="row">
        <div class="col s10 m6 16">
            <h5 class="breadcrumbs-title">@yield('title')</h5>
            <ol class="breadcrumbs">
                <li><a href="#">Panel de Administracion</a></li>
                @yield('breadcrumbs')
            </ol>
        </div>
        <div class="col s2 m6 16">
            <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!" data-activates="dropdown1">
                <i class="material-icons hide-on-med-and-up">Settings</i>
                <span class="hide-on-small-onl">Acciones</span>
                <i class="material-icons right">arrow_drop_down</i>
            </a><ul id="dropdown1" class="dropdown-content" style="white-space: nowrap; opacity: 1; left: 1735.67px; position:
            absolute; top: 130px; display: none;">
            
            @yield('dropdown_settings')
            </ul>
        </div>
    </div>
</div>
</div>