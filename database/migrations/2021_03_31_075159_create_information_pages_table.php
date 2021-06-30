<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInformationPagesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    if (! Schema::hasTable( 'information_pages')) {
      Schema::create('information_pages', function(Blueprint $table) {
        $table->bigIncrements('id');

        $table->string('title');
        $table->string('url_title')->nullable();

        $table->longText('description')->nullable();

        $table->text('featured_image')->nullable();

        $table->string('seo_title')->nullable();
        $table->text('seo_keywords')->nullable();
        $table->text('seo_description')->nullable();

        $table->timestamps();
        $table->softDeletes();

        $table->enum('status',['PUBLISHED', 'UNPUBLISHED', 'DRAFT', 'SCHEDULE'])->default('PUBLISHED')->nullable();
        $table->dateTime('status_date')->nullable();

        $table->integer('order')->default(1)->nullable();
      });
    }

    if (! Schema::hasTable('information_page_articles')) {
      Schema::create('information_page_articles', function (Blueprint $table) {
        $table->increments('id');

        $table->string('title')->nullable();

        $table->longText('description')->nullable();

        $table->text('featured_image')->nullable();
        $table->integer('information_page_id')->nullable()->index('information_page_id');

        $table->timestamps();
        $table->softDeletes();

        $table->enum('status', ['PUBLISHED', 'UNPUBLISHED', 'DRAFT', 'SCHEDULE'])->default('PUBLISHED')->nullable();
        $table->dateTime('status_date')->nullable();

        $table->integer('order')->default(1)->nullable();
      });
    }

    if (! Schema::hasTable('information_page_banners')) {
      Schema::create('information_page_banners', function (Blueprint $table) {
        $table->increments('id');

        $table->string('title')->nullable();
        $table->string('max_columns')->nullable();

        $table->integer('information_page_id')->nullable()->index('information_page_id');

        $table->timestamps();
        $table->softDeletes();

        $table->enum('status', ['PUBLISHED', 'UNPUBLISHED', 'DRAFT', 'SCHEDULE'])->default('PUBLISHED')->nullable();
        $table->dateTime('status_date')->nullable();

        $table->integer('order')->default(1)->nullable();
      });
    }

    if (! Schema::hasTable('information_page_banner_blocks')) {
      Schema::create('information_page_banner_blocks', function (Blueprint $table) {
        $table->increments('id');

        $table->string('title')->nullable();
        $table->string('column_count')->nullable();

        $table->longText('description')->nullable();

        $table->text('link')->nullable();
        $table->string('link_target')->nullable();

        $table->text('banner_image')->nullable();
        $table->text('mobile_image')->nullable();

        $table->integer('information_page_banner_id')->nullable()->index('information_page_banner_id');

        $table->timestamps();
        $table->softDeletes();

        $table->enum('status', ['PUBLISHED', 'UNPUBLISHED', 'DRAFT', 'SCHEDULE'])->default('PUBLISHED')->nullable();
        $table->dateTime('status_date')->nullable();

        $table->integer('order')->default(1)->nullable();
      });
    }
  }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('information_pages');

    Schema::dropIfExists('information_page_articles');
    
    Schema::dropIfExists('information_page_banners');
    
    Schema::dropIfExists('information_page_banner_blocks');
	}

}
