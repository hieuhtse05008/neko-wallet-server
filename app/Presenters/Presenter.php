<?php


namespace App\Presenters;


use Exception;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Pagination\AbstractPaginator;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class Presenter
 * @package App\Presenters
 */
abstract class Presenter extends FractalPresenter
{
    /**
     * @param string $include
     * @return $this|Presenter
     */
    public function parseIncludes($include = '')
    {
        if (empty($include)) {
            $request = app('Illuminate\Http\Request');
            $paramIncludes = config('repository.fractal.params.include', 'include');
            if ($request->has($paramIncludes)) {
                $this->fractal->parseIncludes($request[$paramIncludes]);
            }
        } else {
            $this->fractal->parseIncludes($include);
        }


        return $this;
    }

    /**
     * @param $data
     * @return array|mixed|null
     * @throws Exception
     */
    public function present($data)
    {
        if (!class_exists('League\Fractal\Manager')) {
            throw new Exception(trans('repository::packages.league_fractal_required'));
        }

        if ($data instanceof EloquentCollection) {
            $this->resource = $this->transformCollection($data);
        } elseif ($data instanceof AbstractPaginator) {
            $this->resource = $this->transformPaginator($data);
            $resource = $this->fractal->createData($this->resource)->toArray();
            $meta = $resource["meta"]["pagination"];
            unset($resource["meta"]);
            return [
                "items" => $resource,
                "meta" => $meta
            ];
        } else {
            $this->resource = $this->transformItem($data);
        }

        return $this->fractal->createData($this->resource)->toArray();
    }
}
