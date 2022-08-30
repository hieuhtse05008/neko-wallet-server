<?php
$link_limit = 7;
?>

@if ($paginator->lastPage() > 1)
    <nav>
        <ul class="pagination justify-content-end">
            <li class="page-item pointer {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                <a class="page-link bg-transparent border-0 text-dark" href="{{ $paginator->url(1) . $suffix }}">{{"<<"}}</a>
            </li>
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <?php
                $half_total_links = floor($link_limit / 2);
                $from = $paginator->currentPage() - $half_total_links;
                $to = $paginator->currentPage() + $half_total_links;
                if ($paginator->currentPage() < $half_total_links) {
                    $to += $half_total_links - $paginator->currentPage();
                }
                if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                    $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                }
                ?>
                @if ($from < $i && $i < $to)
                    <li class="page-item">
                        <a class="page-link border-0 rounded {{ ($paginator->currentPage() == $i) ? 'bg-main text-white' : 'bg-transparent text-dark' }}" href="{{ $paginator->url($i) . $suffix }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor
            <li class="page-item pointer {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                <a class="page-link bg-transparent border-0 text-dark" href="{{ $paginator->url($paginator->lastPage()) . $suffix }}">{{">>"}}</a>
            </li>
        </ul>
    </nav>
@endif
