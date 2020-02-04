<?php

namespace App\Traits;

use Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Validator;

trait ApiResponser
{
    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    protected function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, "code" => $code], $code);
    }

    /**
     * @param Collection $collection
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function showAll(Collection $collection, $code = 200)
    {
        if ($collection->isEmpty()) {
            return $this->successResponse(["data" => $collection], $code);
        }
        $transformer = $collection->first()->transformer;
        $collection = $this->filterData($collection, $transformer);
        $collection = $this->sortData($collection, $transformer);
        $collection = $this->paginate($collection);
        $collection = $this->transformData($collection, $transformer);
        $collection = $this->cacheResponse($collection);
        return $this->successResponse($collection, $code);
    }

    protected function cacheResponse($data)
    {
        $url = request()->url();
        $query = request()->query();
        ksort($query);
        $queryString = http_build_query($query);
        $fullUrl = "{$url}??{$queryString}";

        return Cache::remember($fullUrl, 30 / 60, function () use ($data) {
            return $data;
        });
    }

    protected function showOne(Model $instance, $code = 200)
    {
        $transformer = $instance->transformer;
        $instance = $this->transformData($instance, $transformer);
        return $this->successResponse($instance, $code);
    }

    protected function showMessage($message, $code = 200)
    {
        return $this->successResponse(["data" => $message], $code);
    }

    protected function transformData($data, $transformer)
    {
        $transformation = fractal($data, new $transformer);
        return $transformation->toArray();
    }

    protected function sortData(Collection $collection, $transformer)
    {
        if (request()->has("sort_by")) {
            $attribute = $transformer::originalAttribute(request()->sort_by);
            $collection = $collection->sortBy->{$attribute};
        }
        return $collection;
    }

    /**
     * @param Collection $collection
     * @param $transformer
     * @return Collection
     */
    protected function filterData(Collection $collection, $transformer)
    {
        foreach (request()->query() as $query => $value) {
            $attribute = $transformer::originalAttribute($query);
            if (isset($attribute, $value)) {
                $collection = $collection->where($attribute, $value);
            }
        }
        return $collection;
    }


    /**
     * @param Collection $collection
     * @return LengthAwarePaginator
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function paginate(Collection $collection)
    {
        Validator::validate(request()->all(), [
            "per_page" => 'integer|min:2|max:50'
        ]);
        $page = LengthAwarePaginator::resolveCurrentPage();
        $pageSize = 15;
        if (request()->has('per_page')) {
            $pageSize = (int)request()->per_page;
        }
        $results = $collection->slice(($page - 1) * $pageSize, $pageSize)->values();
        $paginated = new LengthAwarePaginator($results, $collection->count(), $pageSize, $page, [
            "path" => LengthAwarePaginator::resolveCurrentPath(),
        ]);
        $paginated->appends(request()->all());
        return $paginated;
    }

}
