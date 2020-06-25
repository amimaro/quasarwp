<th scope="row">Left-side Drawer:</th>
<td>
  <div>
    <label for="quasarwp-settings-lqdrawer">
      <input name="quasarwp-settings[lqdrawer]" type="checkbox" value="1" <?php checked(isset($options['lqdrawer'])); ?> id="quasarwp-settings-lqdrawer" />
      Enabled
    </label>
    <br>
    <label for="quasarwp-settings-lqdrawer-overlay">
      <input name="quasarwp-settings[lqdrawer-overlay]" type="checkbox" value="1" <?php checked(isset($options['lqdrawer-overlay'])); ?> id="quasarwp-settings-lqdrawer-overlay" />
      Overlay Mode
    </label>
    <br>
    <label for="quasarwp-settings-lqdrawer-show">
      <input name="quasarwp-settings[lqdrawer-show]" type="checkbox" value="1" <?php checked(isset($options['lqdrawer-show'])); ?> id="quasarwp-settings-lqdrawer-show" />
      Show if Above
    </label>
  </div>
  <div style="padding: 10px 0 10px 0;">
    <label for="quasarwp-settings-lqdrawer-behavior">Behavior:</label>
    <select name="quasarwp-settings[lqdrawer-behavior]" id="quasarwp-settings-lqdrawer-behavior">
      <option value="normal" <?php selected($options['lqdrawer-behavior'], 'normal'); ?>>Behave Normal</option>
      <option value="mobile" <?php selected($options['lqdrawer-behavior'], 'mobile'); ?>>Behave Mobile</option>
      <option value="desktop" <?php selected($options['lqdrawer-behavior'], 'destop'); ?>>Behave Desktop</option>
    </select>
  </div>
  <div>
    <label for="quasarwp-settings-lqdrawer-separator">Separator type:</label>
    <select name="quasarwp-settings[lqdrawer-separator]" id="quasarwp-settings-lqdrawer-separator">
      <option value="none" <?php selected($options['lqdrawer-separator'], 'none'); ?>>None</option>
      <option value="elevated" <?php selected($options['lqdrawer-separator'], 'elevated'); ?>>Elevated</option>
      <option value="bordered" <?php selected($options['lqdrawer-separator'], 'bordered'); ?>>Bordered</option>
    </select>
  </div>
</td>
