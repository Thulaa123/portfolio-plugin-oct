<?php namespace Thulana\Portfolio\Models;

use Model;

/**
 * Model
 */
class Project extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'thulana_portfolio_projects';

    protected $with = ['image'];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    /**
     * Relations
     */
    public $attachOne = [
        'image' => 'System\Models\File',
    ];
}
