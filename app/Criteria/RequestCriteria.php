<?php


namespace App\Criteria;


use App\Enum\CoinMarketsData;
use Illuminate\Support\Str;

class RequestCriteria extends \Prettus\Repository\Criteria\RequestCriteria
{

    /**
     * @param $model
     * @param $orderBy
     * @param $sortedBy
     * @return mixed
     */
    protected function parserFieldsOrderBy($model, $orderBy, $sortedBy)
    {
        $split = explode('|', $orderBy);
        if(count($split) > 1) {
            /*
             * ex.
             * products|description -> join products on current_table.product_id = products.id order by description
             *
             * products:custom_id|products.description -> join products on current_table.custom_id = products.id order
             * by products.description (in case both tables have same column name)
             */
            $table = $model->getModel()->getTable();
            $sortTable = $split[0];
            $sortColumn = $split[1];


            $split = explode(':', $sortTable);
            $localKey = '.id';
            if (count($split) > 1) {
                $sortTable = $split[0];

                $commaExp = explode(',', $split[1]);
                $keyName = $table.'.'.$split[1];
                if (count($commaExp) > 1) {
                    $keyName = $table.'.'.$commaExp[0];
                    $localKey = '.'.$commaExp[1];
                }
            } else {
                /*
                 * If you do not define which column to use as a joining column on current table, it will
                 * use a singular of a join table appended with _id
                 *
                 * ex.
                 * products -> product_id
                 */
                $prefix = Str::singular($sortTable);
                $keyName = $table.'.'.$prefix.'_id';
            }
            $is_double_field = in_array($sortColumn,array_keys(CoinMarketsData::DOUBLE_FIELDS));
            if(!$is_double_field){
                $model = $model
                    ->leftJoin($sortTable, $keyName, '=', $sortTable.$localKey)
                    ->orderBy($sortColumn, $sortedBy)
                    ->addSelect($table.'.*');
            }else{
                $model = $model
                    ->leftJoin($sortTable, $keyName, '=', $sortTable.$localKey)
                    ->orderByRaw(CoinMarketsData::DOUBLE_FIELDS[$sortColumn]." ".$sortedBy)
                    ->addSelect($table.'.*');
            }

        } else {
            $is_double_field = in_array($orderBy,array_keys(CoinMarketsData::DOUBLE_FIELDS));
            if(!$is_double_field){
                $model = $model->orderBy($orderBy, $sortedBy);
            }else{
                $model = $model->orderByRaw(CoinMarketsData::DOUBLE_FIELDS[$orderBy]." ".$sortedBy);

            }
        }
        return $model;
    }
}
