<th scope="row">General:</th>
<td>
  <div>
    <label for="quasarwp-settings-show-loading" style="padding-right: 20px;">
      <input name="quasarwp-settings[show-loading]" type="checkbox" value="1" <?php checked(isset($options['show-loading'])); ?> id="quasarwp-settings-show-loading" />
      Show Loading Overlay
    </label>
  </div>
  <br>
  <div>
    <label for="quasarwp-settings-layout" style="padding-right: 20px;">
      Layout View:
      <input type="text" name="quasarwp-settings[layout]" id="quasarwp-settings-layout" value="<?php echo $options['layout']; ?>" />
    </label>
  </div>
</td>
