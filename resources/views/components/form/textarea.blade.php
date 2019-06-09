<div class="control-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    <div class="controls">
    {{ Form::textarea($name, $value, array_merge(['class' => 'span11'], $attributes)) }}
    </div>
</div>