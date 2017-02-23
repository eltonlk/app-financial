@include('errors._error_field')

<div class="row">
    <div class="input-field col s6">
        <?php $nameHtml = $errors->first('name')? [ 'class' => 'validate invalid' ] : [] ?>
        {!! Form::text('name', null, $nameHtml) !!}
        {!! Form::label('name', 'Nome', [ 'data-error' => $errors->first('name') ]) !!}
    </div>

    <div class="input-field file-field col s6">
        <div class="btn">
            <span>Logo</span>
            {!! Form::file('logo') !!}
        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path" />
        </div>
    </div>
</div>
