<?php namespace Thulana\Portfolio\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateThulanaPortfolioProjects extends Migration
{
    public function up()
    {
        Schema::create('thulana_portfolio_projects', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('github');
            $table->string('demo');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('thulana_portfolio_projects');
    }
}
