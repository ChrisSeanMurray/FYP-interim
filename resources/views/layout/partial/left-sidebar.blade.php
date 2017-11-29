<div id="left-sidebar-wrapper">
     <button type="button" class="navbar-toggle" aria-expanded="false" v-on:click="toggleMenu('left')">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

        <div class="menu-header">
            <a href="{{ route('dashboard') }}">
                <i class="fa fa-tachometer" aria-hidden="true"></i>
                <h3>Dashboard</h3>
            </a>
        </div>

    @if(auth()->user() && !auth()->user()->hasRole(['superAdmin', 'equityAdmin']))
        <div class="menu-header menu-toggle" v-on:click="toggleMenu('portfolio')">
            <i class="fa fa-folder-open-o" aria-hidden="true"></i>
            <h3>Portfolio</h3>
            <i class="fa fa-chevron-right" aria-hidden="true" v-show="!isToggled('portfolio')"></i>
            <i class="fa fa-chevron-down" aria-hidden="true" v-show="isToggled('portfolio')"></i>
        </div>
        <?php
        /*
        <ul
            class="{{ menuState() ? '' : 'min-menu' }}"
            v-bind:class="{open : menu.portfolioToggle, 'min-menu' : !menu.leftToggle}"
            >
        */?>
        <ul v-bind:class="{ open : isToggled('portfolio'), 'min-menu' : !isToggled('left') }">

            <li><a href="{{ route('deal.index') }}">New Car Radar</a></li>

            @if(auth()->user()->usedCarFeature)
                <li><a href="{{ route('used-cars.index') }}">Used Car Radar</a></li>
            @endif

            @if(auth()->user()->hasRole(['dealershipAdmin', 'forecourtAdmin', 'salesperson'])
                    && auth()->user()->serviceBookingFeature)
                <li><a href="{{ route('service-booking.index') }}">Service Bookings</a></li>
            @endif
        </ul>

        <div class="menu-header">
            <a href="{{route('deal.create', ['walk-in' => 1])}}">
                <i class="fa fa-flask" aria-hidden="true"></i>
                <h3>Stacker</h3>
            </a>
        </div>


        <div class="menu-header menu-toggle"  v-on:click="toggleMenu('shortlist')">
            <i class="fa fa-bolt" aria-hidden="true"></i>
            <h3>Shortlist</h3>

            <i class="fa fa-chevron-right" aria-hidden="true" v-show="!isToggled('shortlist')"></i>
            <i class="fa fa-chevron-down" aria-hidden="true" v-show="isToggled('shortlist')"></i>
        </div>
        <?php
        /*
        <ul
            class="{{ menuState() ? '' : 'min-menu' }}"
            v-bind:class="{open : menu.shortlistToggle, 'min-menu' : !menu.leftToggle}"
            >
        */?>
        <ul v-bind:class="{ open : isToggled('shortlist'), 'min-menu' : !isToggled('left') }">

            <li><a href="{{route('deal.shortlist')}}">New Car</a></li>

            @if(auth()->user()->usedCarFeature)
                <li><a href="{{ route('used-cars.shortlist') }}">Used Car</a></li>
            @endif

            @if(auth()->user()->hasRole(['dealershipAdmin', 'forecourtAdmin', 'salesperson'])
                    && auth()->user()->serviceBookingFeature)
                <li><a href="{{ route('service-booking.shortlist') }}">Service Bookings</a></li>
            @endif
        </ul>


        <div class="menu-header menu-toggle"  v-on:click="toggleMenu('tools')">
            <i class="fa fa-cog" aria-hidden="true"></i>
            <h3>Tools</h3>

            <i class="fa fa-chevron-right" aria-hidden="true" v-show="!isToggled('tools')"></i>
            <i class="fa fa-chevron-down" aria-hidden="true" v-show="isToggled('tools')"></i>
        </div>
        <?php
        /*
        <ul
            class="{{ menuState() ? '' : 'min-menu' }}"
            v-bind:class="{open : menu.toolsToggle, 'min-menu' : !menu.leftToggle}"
            >
        */
        ?>
        <ul v-bind:class="{ open : isToggled('tools'), 'min-menu' : !isToggled('left') }">
            <li><a href="{{route('deal.create')}}">Add Deal</a></li>
            <li><a href="{{route('archive.index')}}">Archive</a></li>
            @if(auth()->user()->hasRole(['dealershipAdmin', 'forecourtAdmin', 'manufacturerAdmin', 'equityAdmin', 'salesperson']))
                <li><a href="{{route('auxion.index')}}">Auxion</a></li>
            @endif
            @if(auth()->user()->hasRole(['dealershipAdmin', 'forecourtAdmin']))
                <li><a href="{{route('bulk-upload.index')}}">Bulk Upload</a></li>
            @endif
        </ul>
    @endif

</div>
