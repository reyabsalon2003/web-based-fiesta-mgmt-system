<?php

use App\Models\User;
use App\Models\Event;
use App\Models\Barangay;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barangay_id')->nullable()->constrained();
             //$table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
             $table->string('age');
             $table->string('contact_number');
             $table->enum('gender', ['male', 'female'])->default('male');
             $table->string('email');
             $table->foreignIdFor(Event::class)->constrained()->onDelete('cascade');
             $table->foreignIdFor(Barangay::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendees');
    }
};
