<?php namespace Thulana\Portfolio\Models;

use Model;

/**
 * Model
 */
class Comment extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'thulana_portfolio_comments';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
