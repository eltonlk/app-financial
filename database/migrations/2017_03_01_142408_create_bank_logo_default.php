<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use AppFinancial\Models\Bank;

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
        $filename = env('BANK_LOGO_DEFAULT');

        $path = Bank::logosPath() . '/' . $filename;

        \Storage::disk('public')->delete($path);
    }
}
