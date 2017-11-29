<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        Alerts <span ng-show="alertsCount > 0" class="badge" ng-bind="alertsCount"></span>
    </a>
    <ul class="dropdown-menu alert-dropdown">
        <li>
            {{--
                NB: This data is prepared in
                /app/Http/ViewComposers/AlertsComposer.php
            --}}
            @if($dealershipsFilterData)
                <script>
                    window.Alerts = window.Alerts || {};
                    Alerts.dealerships = {!!json_encode($dealershipsFilterData)!!};
                    Alerts.selectedDealership = '{{Session::has('filterAlertsByDealership') ? session('filterAlertsByDealership') : false}}'
                    Alerts.salespeople = Alerts.salespeople || false;
                    Alerts.selectedSalesperson = Alerts.selectedSalesperson || false;
                    Alerts.models = Alerts.models || false;
                    Alerts.selectedModel = Alerts.selectedModel || false;
                </script>
            @endif

            @if($salespeopleFilterData)
                <script>
                    window.Alerts = window.Alerts || {};
                    Alerts.dealerships = Alerts.dealerships || false;
                    Alerts.selectedDealership = Alerts.selectedDealership || false;
                    Alerts.salespeople = {!!json_encode($salespeopleFilterData)!!};
                    Alerts.selectedSalesperson = '{{Session::has('filterAlertsBySalesperson') ? session('filterAlertsBySalesperson') : false}}'
                    Alerts.models = Alerts.models || false;
                    Alerts.selectedModel = Alerts.selectedModel || false;
                </script>
            @endif

            @if($modelsFilterData)
                <script>
                    window.Alerts = window.Alerts || {};
                    Alerts.dealerships = Alerts.dealerships || false;
                    Alerts.selectedDealership = Alerts.selectedDealership || false;
                    Alerts.salespeople = Alerts.salespeople || false;
                    Alerts.selectedSalesperson = Alerts.selectedSalesperson || false;
                    Alerts.models = {!!json_encode($modelsFilterData)!!};
                    Alerts.selectedModel = '{{Session::has('filterAlertsByModel') ? session('filterAlertsByModel') : false}}'
                </script>
            @endif

            <div class="row">

                <div class="col-sm-6">
                    <h4>Deals Worth Reviewing</h4>

                    <form ng-show="showModelsFilter">
                       <label for="alertFilterModel">Filter by Model</label>
                       <select
                           ng-model="form.alertFilterModel"
                           ng-change="updateAlerts()"
                           class="form-control"
                           ng-options="option.value as option.title for option in models"
                        >
                            <option value="">All</option>
                       </select>
                    </form>


                    {{-- ONLY SHOW IF USER IS A MANUFACTURER ADMIN --}}
                    <form ng-show="showDealershipsFilter">
                       <label for="alertFilterDealership">Filter by Dealership</label>
                       <select
                           ng-model="form.alertFilterDealership"
                           ng-change="updateAlerts()"
                           class="form-control"
                           ng-options="option.value as option.title for option in dealerships"
                        >
                            <option value="">All</option>
                       </select>
                    </form>

                    {{-- ONLY SHOW IF USER IS A DEALERSHIP ADMIN OR FORECOURT ADMIN --}}
                    <form ng-show="showSalespeopleFilter">
                       <label for="alertFilterSalesperson">Filter by Salesperson</label>
                       <select
                           ng-model="form.alertFilterSalesperson"
                           ng-change="updateAlerts()"
                           class="form-control"
                           ng-options="option.value as option.title for option in salespeople"
                        >
                            <option value="">All</option>
                       </select>
                    </form>
                    <div ng-if="alerts.length">
                        <ul class="list-unstyled striped-list">
                            <li ng-repeat="alert in alerts">
                                <a href="@{{alert.stackerUrl}}">
                                    @{{alert.unique_id}} : @{{alert.percentage}}
                                    @if(!auth()->user()->hasRole(['manufacturerAdmin']))
                                        <br> @{{ alert.vrm }} - @{{ alert.customer_name }}
                                    @endif

                                </a>
                            </li>
                        </ul>
                    </div>
                    <div ng-if="!alerts.length">
                        <p style="margin-top: 10px;"><em>No deal alerts at the moment.</em></p>
                    </div>
                </div>

                <div class="col-sm-6">
                    <h4>Scheduled Callbacks Today</h4>
                    <div ng-if="callbacks.length" >
                        <ul class="list-unstyled striped-list">
                            <li ng-repeat="callback in callbacks">
                                <a href="@{{callback.stackerUrl}}">
                                    @{{callback.date}}
                                    @if(!auth()->user()->hasRole(['manufacturerAdmin']))
                                        <br> @{{ callback.customer_name }} - @{{ callback.phone }}
                                    @endif
                                </a>

                            </li>
                        </ul>
                    </div>
                    <div ng-if="!callbacks.length">
                        <p style="margin-top: 10px;"><em>No callbacks scheduled today.</em></p>
                    </div>
                </div>
            </div>
        </li>
    </ul>

</li>
