<div id="right-sidebar-wrapper">

    <i class="fa fa-times close" aria-hidden="true" v-on:click="toggleMenu('right')"></i>

    @if(auth()->check())
        <ul>
            @if(auth()->user()->hasRole(['superAdmin']))
                <li><a href="{{route('assume')}}">Login As</a></li>
                <li><a href="{{route('super-admin.index')}}">Super Users</a></li>
            @endif

            @if(auth()->user()->hasRole(['superAdmin', 'equityAdmin']))
                <li><a href="{{route('country.index')}}">Countries</a></li>
                <li><a href="{{route('finance-provider.index')}}">Finance Providers</a></li>
                <li><a href="{{route('manufacturer.index')}}">Manufacturers</a></li>
            @endif

            @if(auth()->user()->hasRole(['manufacturerAdmin']))
                <li><a href="{{route('manufacturer.settings')}}">Edit manufacturer settings</a></li>
                <li><a href="{{route('dealership.index')}}">Dealerships</a></li>

                @if(!App::environment('production'))
                    <li><a href="{{route('settlement-calculator')}}">Test Settlement Calculator</a></li>
                @endif
            @endif
            @if(auth()->user()->hasRole('dealershipAdmin'))
                <li><a href="{{route('dealership-admin.api-credential.index')}}">API Credentials</a></li>
                <li><a href="{{route('dealership.settings', [auth()->user()->dealership->hashid])}}">Dealership Settings</a></li>
            @endif

            @if(auth()->user()->hasRole(['manufacturerAdmin', 'dealershipAdmin']))
                <li><a href="{{route('forecourt.index')}}">Forecourts</a></li>
            @endif
        
            @if(auth()->user()->hasRole(['manufacturerAdmin']))
                <li><a href="{{route('models.index')}}">Models</a></li>
            @endif            
    

            @if(auth()->user()->hasRole(['equityAdmin', 'manufacturerAdmin', 'dealershipAdmin', 'forecourtAdmin']))
                <li><a href="{{route('user.index')}}">Users</a></li>
            @endif

            <li><a href="{{route('profile.edit')}}">My account</a></li>
            @if(auth()->user()->hasRole(['manufacturerAdmin', 'dealershipAdmin', 'forecourtAdmin', 'salesperson']))
                <li>
                    <a href="{{route('linked-account.index')}}">Switch Accounts</a>
                </li>
            @endif
            <li><a href="{{url('logout')}}">Logout</a></li>
        </ul>
    @endif

    @if(Session::has('cancel_assume') && auth()->check())
         <div class="assume">
            <p>You are currently browsing the site as {{auth()->user()->name}}. <br>
            <a href="{{route('assume.cancel', Session::get('cancel_assume'))}}">Return to your own account.</a></p>
         </div>
    @endif
</div>
