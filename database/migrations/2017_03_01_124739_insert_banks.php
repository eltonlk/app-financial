<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertBanks extends Migration
{
    public function up()
    {
        $repository = app(\AppFinancial\Repositories\BankRepository::class);

        foreach ($this->getData() as $bankArray) {
            $repository->create($bankArray);
        }
    }

    public function down()
    {
        $repository = app(\AppFinancial\Repositories\BankRepository::class);
        $repository->skipPresenter(true);

        foreach ($repository->all() as $bank) {
            $repository->delete($bank->id);
        }
    }

    public function getData()
    {
        return [
            [
                'name' => 'Banco do brasil',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/bb.jpg'),
                    'bb.jpg'
                )
            ],
            [
                'name' => 'Bradesco',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/bradesco.jpg'),
                    'bradesco.jpg'
                )
            ],
            [
                'name' => 'Caixa',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/caixa.jpg'),
                    'caixa.jpg'
                )
            ],
            [
                'name' => 'Itaú',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/itau.jpg'),
                    'itau.jpg'
                )
            ],
            [
                'name' => 'Santander',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/santander.jpg'),
                    'santander.jpg'
                )
            ],
            [
                'name' => 'Sicredi'
            ],
        ];
    }
}
