@if($paginator->total() > $paginator->perPage())
<ul class="pagination" aria-label="Pagination">

  <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}"><a href="{{ $paginator->url(1) }}"><span>First</span></a></li>

  <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}"><a href="{{ $paginator->url($paginator->currentPage()-1) }}"><span>Previous</span></a></li>

  @for ($i = 1; $i <= $paginator->lastPage(); $i++)

  <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}"><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>

  @endfor

  <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}"><a href="{{ $paginator->url($paginator->currentPage()+1) }}"><span>Next</span></a></li>

  <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}"><a href="{{ $paginator->url($paginator->currentPage()+1) }}"><span>Last</span></a></li>

</ul>
@endif
