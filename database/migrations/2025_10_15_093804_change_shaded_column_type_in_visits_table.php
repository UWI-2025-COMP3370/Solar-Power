use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('visits', function (Blueprint $table) {
            $table->string('shaded')->change(); // change type to string
        });
    }

    public function down(): void
    {
        Schema::table('visits', function (Blueprint $table) {
            $table->boolean('shaded')->change(); // revert to integer/boolean
        });
    }
};
