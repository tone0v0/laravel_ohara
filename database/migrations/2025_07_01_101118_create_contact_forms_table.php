<?php
// use文。Mihgration・Blueprint・Schemaクラスを利用するためにインポート
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // DBに対する変更を記述
    public function up(): void
    {
        // Schemaクラスでcreateメソッドを実行する⇒contact_formsというテーブルが作成される
        Schema::create('contact_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20); // 氏名
            $table->string('email', 255); // メールアドレス
            $table->longText('url')->nullable(); // URL null許可
            $table->boolean('gender'); // 性別
            $table->Integer('age'); // 年齢
            $table->string('contact', 200); // 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    // ロールバック（変更の取り消し）を記述
    public function down(): void
    {
        Schema::dropIfExists('contact_forms');
    }
};
