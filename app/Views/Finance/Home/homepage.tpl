[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
    <style>
    body {
        background-image: url(/assets/Finance/bg-main-fullscreen.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
    }
    .home-module-cards .card {
        opacity: 0.75;
    }
    .navbar.navbar-bottom-bordered {
        border-bottom: none;
    }
    .navbar-brand  {
        background-color:transparent !important;
    }
    </style>
    <div class="row home-module-cards">
        [[foreach from=$modules item=module]]
        <div class="col col-12 col-md-4 col-lg-4  col-xl-4 col-sm-6">
            <a href="[[$module->slug]]">
            <div class="card" url="[[$module->slug|escape:'html']]">
                <i class="module-icon fa-4x text-center [[$module->icon]]" alt="[[$module->menu]]"></i>
                <div class="card-body">
                    <h4 class="card-title">[[$module->menu]]</h4>
                    <p class="card-text">[[$module->description]]</p>
                </div>
            </div>
            </a>
        </div>
        [[/foreach]]
    </div>
[[/block]]