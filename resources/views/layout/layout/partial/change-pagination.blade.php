@if(isset($viewKey))
<div class="change-pagination hidden-print">
    <ul class="pagination">
        <li><span>Results per page:</span></li>
        @foreach([10, 25, 50, 100] as $length)
            <li <?= session('pagination.' . $viewKey, config()->get('view.pagination', 10)) == $length ? 'class="active"' : null ?>>
                <a href="{{route('pagination.length', ['key' => $viewKey, 'length' => $length])}}">{{$length}}</a>
            </li>
        @endforeach
    </ul>
</div>
@endif
