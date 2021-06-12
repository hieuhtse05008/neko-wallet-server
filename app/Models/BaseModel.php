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

    public const CREATOR_ID = 'creator_id';
    public const disabledCreator = false;
    public const disabledUpdatedBy = false;
    public const disabledDeletedBy = false;
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
        static::creating(function ($model) {
            if (static::disabledCreator) {
                return;
            }
            $user = Auth::user();

            if (empty($model[static::CREATOR_ID])) {
                if (!empty($user)) {
                    $model[static::CREATOR_ID] = $user->id;
                }

                if (!empty($user) && !static::disabledUpdatedBy) {
                    $model->updated_by = $user->id;
                }
            }
        });
        static::updating(function ($model) {
            if (static::disabledUpdatedBy) {
                return;
            }
            $user = Auth::user();

            if ($model->deleted_by) {
                return;
            }
            if (!empty($user)) {
                $model->updated_by = $user->id;
            }

        });
        static::deleting(function ($model) {
            if (static::disabledDeletedBy) {
                return;
            }
            $user = Auth::user();
            if (!empty($user)) {
                $model->deleted_by = $user->id;
            }
            $model->save();
            static::deleteRelation($model);
        });

        if (static::enabledRestoreRelation) {
            static::restoring(function ($model) {
                static::restoreRelation($model);
            });
        }
    }

}
