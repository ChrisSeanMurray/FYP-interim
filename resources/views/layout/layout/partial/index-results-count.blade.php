<div class="panel panel-info">
    <div class="panel-body">
        <div class="pull-right">
            <span class="btn btn-text" type="button">
                <strong>Results:</strong>
                @if($results instanceof Illuminate\Paginator\LengthAwarePaginator)
                    {{$results->total()}}
                @else
                    {{$results->count()}}
                @endif
            </span>
            @if(isset($exitTrashUrl))
                <a href="{{$exitTrashUrl}}" class="btn btn-link">
                    <i class="fa fa-table"></i>
                    Back to index
                </a>
            @elseif(isset($trashUrl))
                <a href="{{$trashUrl}}" class="btn btn-link">
                    <i class="fa fa-trash"></i>
                    View Trash
                </a>
            @endif
        </div>
    </div>
</div>
