<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    <div <?= $options['wrapperAttrs'] ?> >
    <?php endif; ?>
<?php endif; ?>

    <?php if ($showLabel && $options['label'] !== false): ?>
    <?= Form::label($name, $options['label'], $options['label_attr']) ?>
    <?php endif; ?>

    <?php if ($showField): ?>
        <?php $emptyVal = $options['empty_value'] ? ['' => $options['empty_value']] : null; ?>
        <select name="{{ $name }}" {!! Html::attributes($options['attr']) !!}>
        @foreach ($options['choices'] as $value => $optionsAttrs)
            @if (isset($options['selected']) && in_array($value, $options['selected']))
            <option data-img-src="{{ $optionsAttrs['image-src'] }}" value="{{ $value }}" selected>
            @else
            <option data-img-src="{{ $optionsAttrs['image-src'] }}" value="{{ $value }}">
            @endif
                {{ $optionsAttrs['label']}}
            </option>
        @endforeach
        </select>

        <?php if ($options['help_block']['text']): ?>
            <<?= $options['help_block']['tag'] ?> <?= $options['help_block']['helpBlockAttrs'] ?>>
                <?= $options['help_block']['text'] ?>
            </<?= $options['help_block']['tag'] ?>>
        <?php endif; ?>

    <?php endif; ?>

    <?php if ($showError && isset($errors)): ?>
        <?php foreach ($errors->get($nameKey) as $err): ?>
            <div <?= $options['errorAttrs'] ?>><?= $err ?></div>
        <?php endforeach; ?>
    <?php endif; ?>

<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    </div>
    <?php endif; ?>
<?php endif; ?>
