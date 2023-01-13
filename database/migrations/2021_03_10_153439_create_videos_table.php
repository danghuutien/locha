<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('danhmuc_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->string('linkyoutube')->nullable();
            $table->foreignId('disannghethuat')->nullable(); // liên kết bảng
            $table->foreignId('sangtac')->nullable(); // liên kết bảng
            $table->foreignId('bieudien')->nullable(); // Nghệ sỹ biểu diễn liên kết bảng nghệ nhân, nghệ sỹ
            $table->foreignId('caulacbo')->nullable(); // liên kết bảng
            $table->string('luotxem')->nullable();
            $table->string('uuid')->nullable();
            $table->foreignId('published_by')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
