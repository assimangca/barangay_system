public function up(): void
{
    Schema::create('officials', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('position'); // e.g., Captain, Councilor, SK Chairman
        $table->string('image')->nullable(); // Store the photo path
        $table->string('term_years')->default('2023-2025');
        $table->integer('order_priority')->default(0); // To sort them (Captain first)
        $table->timestamps();
    });
}