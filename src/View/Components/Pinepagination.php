<?php

namespace Pine\PinePagination\View\Components;

use Illuminate\View\Component;

class Pinepagination extends Component
{
    public $pageSize;
    public $filter;
    public $paginator;
    public $stylePaginator;
    public $stylePaginatorLink;
    public $stylePaginatorLinkActive;
    public $nextPage;
    public $previousPage;
    public function __construct($paginator, $pageSize , $nextPage = '', $previousPage = '', $stylePaginator = '', $stylePaginatorLink = '', $stylePaginatorLinkActive = '', $filter = '')
    {
        $this->paginator = $paginator;
        $this->pageSize = $pageSize;
        $this->filter = $filter;
        $this->stylePaginator = $stylePaginator;
        $this->stylePaginatorLink = $stylePaginatorLink;
        $this->stylePaginatorLinkActive = $stylePaginatorLinkActive;
        $this->nextPage = $nextPage;
        $this->previousPage = $previousPage;
        
    }           

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('pine-pagination::index');
    }
}
