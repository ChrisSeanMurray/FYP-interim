{{-- This should be setup to call a single minified script --}}
<script type="text/javascript" src="/js/vendor.min.js" ></script>

{{-- see if we need to load vue.js otherwise we'll load angular --}}

@if (!empty(Request::route()) && in_array(\Request::route()->getName(), ['deal.stacker.edit', 'used-car.index']))
  <script type="text/javascript" src="/js/vue.min.js" ></script>
@else
  <script type="text/javascript" src="/js/angular.min.js" ></script>
@endif

<script type="text/javascript" src="/js/app.min.js" ></script>



<script type="text/javascript">
    function populateSelect(type, hashid, fetch, select, prefix){
        prefix = typeof prefix !== 'undefined' ? prefix : 'true';

        select.empty();
        var url = '/ajax/'+ type +'/'+ hashid +'/'+ fetch + '?prefix=' + prefix;

        $.getJSON(url,function(json){
            if ( json.length == 0 ) {
                return;
            }
            $.each(json, function(key, value) {
                select.append('<option value="' + key + '">' + value + '</option>').removeAttr('disabled');
            });
        }).fail(function() {
            select.empty().attr('disabled', 'disabled')
        });
    }
    $(function() {
        $('.disable-on-submit').submit(function(e){
            $(this).find(':submit').attr('disabled', 'disabled');
        });

    });
</script>
