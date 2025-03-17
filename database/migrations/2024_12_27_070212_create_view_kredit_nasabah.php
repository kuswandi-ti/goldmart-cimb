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
        \DB::statement("
            CREATE VIEW view_kredit_nasabah
            AS
            SELECT
                A.*,
                B.kode AS nasabah_code,
                B.nama AS nasabah_name,
                B.email AS nasabah_email,
                B.no_tlp AS nasabah_phone,
                B.alamat AS nasabah_adress
            FROM
                kredit_nasabah A
                LEFT OUTER JOIN nasabah B ON A.id_nasabah = B.id
        ");

        // \DB::statement("
        //     CREATE VIEW view_kredit_nasabah
        //     AS
        //     SELECT
        //         A.*
        //     FROM
        //         kredit_nasabah A
        //         LEFT OUTER JOIN nasabah B ON A.id_nasabah = B.id
        // ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \DB::statement("DROP VIEW view_kredit_nasabah");
    }
};
