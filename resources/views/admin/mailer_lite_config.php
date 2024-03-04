<h1>Mailer lite config</h1>

<form method="post" action="">
    <input type="hidden" name="save" value="1">
    <label>
        Mailer lite API Key<br>
        <textarea name="ascui_mailer_lite[api_key]" style="width: 100%"><?php echo isset($optionData['api_key']) && !empty($optionData['api_key']) ? $optionData['api_key'] : ''; ?></textarea>
    </label>

    <label>
        Group<br>
        <select name="ascui_mailer_lite[group_id]">
            <option>Seleccionar grupo</option>
            <?php foreach ($groups as $group) : ?>
                <option value="<?php echo $group['id']; ?>" <?php echo $group['id'] == $optionData['group_id'] ? 'selected' : ''; ?>><?php echo $group['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <br>
    <br>
    <button type="submit">Save</button>
</form>