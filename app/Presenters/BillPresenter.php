<?php

namespace AppFinancial\Presenters;

use AppFinancial\Transformers\BillTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class BillPresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new BillTransformer();
    }
}
