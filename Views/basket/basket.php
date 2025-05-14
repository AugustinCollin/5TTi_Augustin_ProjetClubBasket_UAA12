<slect name="option[]" id="option_select" multiple>
    <?php foreach ($options as $option) : ?>
        <option value="<?= $option->optionclub_basketId ?>">
            <?php if (isset($OptionsAvtiveclub_Basket)) : ?><?php foreach ($OptionsAvtiveclub_Basket as $OptionEquipe) : ?>
            <?php if ($option->OptionEquipeId === $OptionEquipe->OptionsEquipeId) : ?>selected<?php endif  
</select>