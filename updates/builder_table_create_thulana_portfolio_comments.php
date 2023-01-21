<?php namespace Thulana\Portfolio\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateThulanaPortfolioComments extends Migration
{
    public function up()
    {
        Schema::create('thulana_portfolio_comments', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->text('comment');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('thulana_portfolio_comments');
    }
}
