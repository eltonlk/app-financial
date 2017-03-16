<?php

namespace AppFinancial\Presenters;

use AppFinancial\Transformers\BankTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class BankPresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new BankTransformer();
    }
}
