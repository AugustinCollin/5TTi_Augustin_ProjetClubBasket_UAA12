<select name="option[]" id="option_select" multiple>
    <?php foreach ($options as $option) : ?>
        <option value="<?= $option->optionclub_basketId ?>"
            <?php if (isset($OptionsAvtiveclub_basket)) : ?><?php foreach ($OptionsAvtiveclub_basket as $OptionEquipe) : ?>
            <?php if ($option->OptionEquipeId === $OptionEquipe->OptionsEquipeId) : ?>selected<?php endif ?>
            <?php endforeach ?><?php endif ?>><?= $option->nom ?></option>
        <?php endforeach ?>
</select>