<?php

namespace Modules\Common\Traits;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\AbstractPaginator;

trait HasPagination
{
    public static function paginate($resource): ResourceCollection
    {
        if (! ($resource instanceof AbstractPaginator)) {
            return self::collection($resource);
        }

        return new class($resource, self::class) extends ResourceCollection
        {
            public function __construct($resource, string $collects)
            {
                $this->collects = $collects;
                parent::__construct($resource);
            }

            public function toArray($request): array
            {
                return [
                    'data' => $this->collection,
                    'paginate' => [
                        'total' => $this->total(),
                        'per_page' => $this->perPage(),
                        'next_page_url' => $this->nextPageUrl() ?? '',
                        'prev_page_url' => $this->previousPageUrl() ?? '',
                        'current_page' => $this->currentPage(),
                        'last_page' => $this->lastPage(),
                        'has_pages' => $this->hasPages(),
                        'has_more_pages' => $this->hasMorePages(),
                        'first_page_url' => $this->url(1),
                        'last_page_url' => $this->url($this->lastPage()),
                        'links' => $this->linkCollection()->toArray(),
                        'path' => $this->path(),
                        'from' => $this->firstItem(),
                        'to' => $this->lastItem(),
                    ],
                ];
            }
        };
    }
}
