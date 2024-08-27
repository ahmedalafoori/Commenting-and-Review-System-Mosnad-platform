<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('contents', function (Blueprint $table) {
            $table->id();  // العمود الأساسي
            $table->string('title');  // عمود العنوان
            $table->text('body');  // عمود النص
            $table->timestamps();  // أعمدة created_at و updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');  // حذف الجدول عند التراجع عن الهجرة

        //
    }
};
