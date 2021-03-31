<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInformationPagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    if ( ! Schema::hasTable( 'information_pages' ) ):
	      Schema::create('information_pages', function(Blueprint $table)
	      {
		$table->bigIncrements('id');

		$table->string('title', 191);
		$table->string('url_title', 191)->nullable();

		$table->text('description')->nullable();

		$table->text('featured_image', 65535)->nullable();

		$table->string('seo_title', 191)->nullable();
		$table->text('seo_keywords', 65535)->nullable();
		$table->text('seo_description', 65535)->nullable();

		$table->timestamps();
		$table->softDeletes();

		$table->string('status', 191)->nullable();
		$table->dateTime('status_date')->nullable();

		$table->integer('order');
	      });
	    endif;

	    if ( ! Schema::hasTable( 'information_page_articles' ) ):
	      Schema::create('information_page_articles', function(Blueprint $table)
	      {
		$table->increments('id');

		$table->string('title', 191)->nullable();

		$table->text('description')->nullable();

		$table->text('featured_image', 65535)->nullable();

		$table->timestamps();
		$table->softDeletes();

		$table->string('status', 191)->nullable();
		$table->dateTime('status_date')->nullable();

		$table->integer('order');
		$table->integer('information_page_id')->nullable();
	      });
	    endif;

	    if ( ! Schema::hasTable( 'information_page_banners' ) ):
	      Schema::create('information_page_banners', function(Blueprint $table)
	      {
		$table->increments('id');

		$table->string('title', 191)->nullable();
		$table->string('max_columns', 191)->nullable();

		$table->timestamps();
		$table->softDeletes();

		$table->string('status', 191)->nullable();
		$table->dateTime('status_date')->nullable();

		$table->integer('order')->nullable();
		$table->integer('information_page_id')->nullable()->index('information_page_id');
	      });
	    endif;

	    if ( ! Schema::hasTable( 'information_page_banner_blocks' ) ):
	      Schema::create('information_page_banner_blocks', function(Blueprint $table)
	      {
		$table->increments('id');

		$table->string('title', 191)->nullable();

		$table->text('description')->nullable();

		$table->string('column_count', 191)->nullable();

		$table->string('link', 191)->nullable();
		$table->string('link_target', 191)->nullable();

		$table->text('banner_image', 65535)->nullable();
		$table->text('mobile_image', 65535)->nullable();

		$table->timestamps();
		$table->softDeletes();

		$table->string('status', 191)->nullable();
		$table->dateTime('status_date')->nullable();

		$table->integer('order')->nullable();
		$table->integer('page_banner_id')->nullable()->index('page_banner_id');
	      });
	    endif;
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('information_pages');
    		Schema::drop('information_page_articles');
    		Schema::drop('information_page_banners');
    		Schema::drop('information_page_banner_blocks');
	}

}
