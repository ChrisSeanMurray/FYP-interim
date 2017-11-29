<nav class="navbar navbar-default header-menu">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/dashboard">
                <img src="/images/equity-manager-logo.png" alt="Equity Manager">
                <span class="vertical-image-align-helper"></span>
            </a>

            @if(auth()->check() && !auth()->user()->hasRole(['superAdmin', 'equityAdmin']))
                <h2>
                    {!! auth()->user()->logo !!}
                    @if(auth()->user()->hasRole(['manufacturerAdmin']))
                        {{ auth()->user()->manufacturer->name }}
                    @else
                        {{ auth()->user()->dealership->name }}
                    @endif
               </h2>
            @endif
        </div>

        <div class="pull-right">
            @if(auth()->check() && !auth()->user()->hasRole(['superAdmin', 'equityAdmin']))
                <notification-modal></notification-modal>
            @endif

            <h5 v-on:click="toggleMenu('right')">
                {{auth()->user() ? auth()->user()->name : null}}
                <i class="fa fa-gears" aria-hidden="true"></i>
             </h5>
        </div>
    </div><!-- /.container-fluid -->
</nav>
