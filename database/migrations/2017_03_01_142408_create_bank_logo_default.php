<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankLogoDefault extends Migration
{
    public function up()
    {
        $filename = env('BANK_LOGO_DEFAULT');

        $logo = new \Illuminate\Http\UploadedFile(
            storage_path('app/files/banks/logos/' . $filename),
            $filename
        );

        \Storage::disk('public')->putFileAs(\AppFinancial\Models\Bank::logosPath(), $logo, $filename);
    }

    public function down()
    {
        $filename = storage_path('app/public/banks/images/' . env('BANK_LOGO_DEFAULT'));

        if (file_exists($filename)) {
            unlink($filename);
        }
    }
}
