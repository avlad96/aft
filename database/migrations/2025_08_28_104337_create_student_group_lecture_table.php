<?php

use App\Models\Lecture;
use App\Models\StudentGroup;
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
        Schema::create('student_group_lecture', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(StudentGroup::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Lecture::class)->constrained()->cascadeOnDelete();
            $table->unsignedInteger('position')->default(0);
            $table->timestamps();

            $table->unique(['student_group_id', 'lecture_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_group_lecture');
    }
};
