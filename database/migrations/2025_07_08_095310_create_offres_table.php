<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('title', 255);
            $table->enum('category', ['fruits', 'legumes', 'cereales', 'produits-laitiers', 'viandes', 'autres']);
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->integer('quantity');
            $table->enum('unit', ['kg', 'g', 'l', 'piece', 'botte', 'panier']);
            $table->json('images')->nullable();
            $table->string('origin', 255)->nullable();
            $table->enum('certification', ['bio-ab', 'demeter', 'nature-progres', 'ecocert'])->nullable();
            $table->enum('status', ['active', 'inactive', 'sold_out', 'draft'])->nullable();
            $table->date('available_until')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offres');
    }
};
