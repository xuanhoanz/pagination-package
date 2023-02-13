<style>
.pine-paginator {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pine-paginator-link {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
    margin: 0 4px;
}

.pine-paginator-link-active {
    color: white;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
    margin: 0 4px;
    background-color: #0d6efd;
    border: 1px solid #0d6efd;
}

</style>

<?php
$nextPage = $nextPage ? $nextPage : [
    'display' => 'none',
];
if(empty($nextPage['text'])){  
        $nextPage['text'] = 'Next';
}
$previousPage = $previousPage ? $previousPage : [
    'display' => 'none',
];
if(empty($previousPage['text'])){  
        $previousPage['text'] = 'Previous';
}
?>

@if ($paginator->lastPage() >= 1)
<div style="{{$stylePaginator}}" class="pine-paginator">
    <div>
        <?php
        $url = $paginator->url(1);
        if ($filter) {
            foreach ($filter as $key => $val) {

                if ($val) {
                    $url = $url . '&' . $key . '=' . $val;
                }
            }
        }
        ?>
        <div>
            <a style="{{$stylePaginatorLink}}" class="pine-paginator-link" href="{{ $url }}">
                &laquo; </a>
        </div>
    </div>
    @if($previousPage['display'] === 'show')
    <div style="{{$stylePaginatorLink}}" class="pine-paginator-link">
        <a href="{{$paginator->previousPageUrl()}}">{{$previousPage['text']}}</a>
    </div>
    @endif
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <?php
        $half_total_links = floor($pageSize / 2);
        $from = $paginator->currentPage() - $half_total_links;
        $to = $paginator->currentPage() + $half_total_links;
        if ($paginator->currentPage() < $half_total_links) {
            $to += $half_total_links - $paginator->currentPage();
        }
        if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
            $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
        }

        //url param name
        $url = $paginator->path() . '?page=' . ($i);
        if ($filter) {
            foreach ($filter as $key => $val) {
                if ($val) {
                    $url = $url . '&' . $key . '=' . $val;
                }
            }
        }
        ?>
        @if ($from < $i && $i < $to) <div>
            @if($paginator->currentPage() === $i)
            <a style="{{$stylePaginatorLinkActive}}" class="pine-paginator-link-active" href="{{ $url }}">{{ $i }}</a>
            @else
            <a style="{{$stylePaginatorLink}} " class="pine-paginator-link" href="{{ $url }}">{{ $i }}</a>
            @endif
        </div>
        @endif
        @endfor
<?php
$url = $paginator->url($paginator->lastPage());
if ($filter) {
    foreach ($filter as $key => $val) {
        if ($val) {
            $url = $url . '&' . $key . '=' . $val;
        }
    }
}
?>
@if($nextPage['display'] === 'show')
<div style="{{$stylePaginatorLink}}" class="pine-paginator-link">
    <a href="{{$paginator->nextPageUrl()}}">{{$nextPage['text']}}</a>
</div>
@endif
<div>
    <a style="{{$stylePaginatorLink}}" class="pine-paginator-link" href="{{ $url }}">&raquo;</a>
</div>
</div>
@endif