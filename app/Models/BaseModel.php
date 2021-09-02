<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\BaseModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel query()
 * @mixin \Eloquent
 * @mixin IdeHelperBaseModel
 */
class BaseModel extends Model
{
    use HasFactory;

    public const enabledRestoreRelation = false;
    public const rangeTimeDelete = 5;

    /**
     * @param $model
     */
    protected static function deleteRelation($model)
    {

    }

    /**
     * @param $model
     */
    protected static function restoreRelation($model)
    {

    }

    /**
     * @param $builderChildrenModel
     * @return mixed
     */
    protected static function restoreChildren($model, $builderChildrenModel)
    {
        return $builderChildrenModel->withTrashed()->where("deleted_at", ">=", timeSqlModify($model->deleted_at, -static::rangeTimeDelete))
            ->where("deleted_at", "<=", timeSqlModify($model->deleted_at, static::rangeTimeDelete))->get()->each(function ($item) {
                $item->restore();
            });
    }

    /**
     * @param $builderChildrenModel
     * @return mixed
     */
    protected static function deleteChildren($builderChildrenModel)
    {
        return $builderChildrenModel->get()->each(function ($item) {
            $item->delete();
        });
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            static::deleteRelation($model);
        });

        if (static::enabledRestoreRelation) {
            static::restoring(function ($model) {
                static::restoreRelation($model);
            });
        }
    }

}
