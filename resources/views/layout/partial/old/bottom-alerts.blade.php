<?php
/**
 * Handling the new 'bottom drawer' alerts displayed on the app.
 *
 * Laravel controller: App\Http\Controllers\Api\AlertApiController
 * Angular controller: /resources/assets/js/angular/controllers/bottomAlertController.js
 * Styles: /resources/assets/sass/_bottom-alerts.scss
 *
 * @author     Alex Leonard <alex@devhaus.ie>
 * @link       http://www.devhaus.ie
 */
?>
<div id="bottom-alerts-container" ng-controller="BottomAlertCtrl" style="display:none;">
    <tabset>

        {{-- Loop through all the tabs and display them --}}
        <tab ng-repeat="(tabIndex, tab) in tabs" active="tab.active" select="tabSelected(tab, tabIndex)">

            <tab-heading>
              @{{tab.title}} <small><a href="#"  tooltip="@{{tab.info}}"><i class="icon-info-sign"></i></a></small>
            </tab-heading>

            {{--
                Some buttons to allow the user to reload the alerts from the server
                or close the current tab which hides (but leaves the data populated)
            --}}
            <div class="actions">
                <button type="button" class="close" ng-click="tab.fetched = false; tabSelected(tab, tabIndex);">
                    <i class="icon-refresh"></i>
                </button>
                <button type="button" class="close" ng-click="closeTab(tabIndex)">
                    <i class="icon-remove"></i>
                </button>
            </div>


            <div class="tab-pane-inner">
                <div>
                  <h3>@{{ tab.info }}</h3>
                </div>

                <div ng-if="tab.loading">
                    <p class="lead center">Loading...</p>
                </div>

                {{-- If there are no deals returned, just show an error message --}}
                <div ng-if="!tab.deals && !tab.loading">
                    <p class="lead">No alerts of this type found, please check back later.</p>
                </div>

                {{-- If there are results display them--}}
                <div ng-if="tab.deals">
                    {{-- Grab the total results from the paginator --}}
                    <p class="lead">
                        Total: <span ng-bind="tab.pagination.total"></span>

                         @if(auth()->check() && !auth()->user()->hasRole(['salesperson']))
                          <small><a href="@{{'/ajax/alert/' + tab.endpoint + '?export_csv=1'}}" class="btn btn-link">Export CSV</a></small>
                         @endif
                    </p>

                    {{-- Prepare a responsive table --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    {{-- Loop through all the table cols --}}
                                    <th ng-repeat="(key, col) in tab.tableCols" ng-bind="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Loop through all the deals --}}
                                <tr ng-repeat="deal in tab.deals">
                                    {{-- In each deal, loop through the cols --}}
                                    <td ng-repeat="(key, col) in tab.tableCols">
                                        {{-- For values that aren't the URL, just ng-bind the value to a span--}}
                                        <span ng-if="key != 'stacker_url'" ng-bind="deal[key]"></span>

                                        {{-- If the key is stacker_url, then show a link if allowed --}}
                                        <a ng-if="key == 'stacker_url' && deal[key] !== null" class="btn btn-sm btn-success" ng-href="@{{deal[key]}}">View</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- If there is pagination information (and more than one page) show our pager --}}
                    <nav ng-if="tab.pagination && tab.pagination.total > 1">
                        <ul class="pager">
                            <li class="previous">
                                {{-- On click directly fire the $scope.load() method --}}
                                <a
                                    href="#"
                                    ng-hide="tab.pagination.prev_page_url == null"
                                    ng-click="load(tab, tabIndex, tab.pagination.prev_page_url)"
                                >
                                    &larr; Previous
                                </a>
                            </li>
                            <li class="next">
                                {{-- On click directly fire the $scope.load() method --}}
                                <a
                                    href="#"
                                    ng-hide="tab.pagination.next_page_url == null"
                                    ng-click="load(tab, tabIndex, tab.pagination.next_page_url)"
                                >
                                    Next &rarr;
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>{{-- /.tab-pane-inner --}}
        </tab>
    </tabset>
</div>{{-- /#bottom-alerts-container --}}

{{-- A simple overlay only shown when the tabs are active --}}
<div id="bottom-tab-overlay" style="display: none;"></div>
