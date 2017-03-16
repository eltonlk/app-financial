<?php

namespace AppFinancial\Presenters;

use AppFinancial\Transformers\BankAccountTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class BankAccountPresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new BankAccountTransformer();
    }
}
