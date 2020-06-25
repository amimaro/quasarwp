<th scope="row">Right-side Drawer:</th>
<td>
  <div>
    <label for="quasarwp-settings-rqdrawer">
      <input name="quasarwp-settings[rqdrawer]" type="checkbox" value="1" <?php checked(isset($options['rqdrawer'])); ?> id="quasarwp-settings-rqdrawer" />
      Enabled
    </label>
    <br>
    <label for="quasarwp-settings-rqdrawer-overlay">
      <input name="quasarwp-settings[rqdrawer-overlay]" type="checkbox" value="1" <?php checked(isset($options['rqdrawer-overlay'])); ?> id="quasarwp-settings-rqdrawer-overlay" />
      Overlay Mode
    </label>
    <br>
    <label for="quasarwp-settings-rqdrawer-show">
      <input name="quasarwp-settings[rqdrawer-show]" type="checkbox" value="1" <?php checked(isset($options['rqdrawer-show'])); ?> id="quasarwp-settings-rqdrawer-show" />
      Show if Above
    </label>
  </div>
  <div style="padding: 10px 0 10px 0;">
    <label for="quasarwp-settings-rqdrawer-behavior">Behavior:</label>
    <select name="quasarwp-settings[rqdrawer-behavior]" id="quasarwp-settings-rqdrawer-behavior">
      <option value="normal" <?php selected($options['rqdrawer-behavior'], 'normal'); ?>>Behave Normal</option>
      <option value="mobile" <?php selected($options['rqdrawer-behavior'], 'mobile'); ?>>Behave Mobile</option>
      <option value="desktop" <?php selected($options['rqdrawer-behavior'], 'desktop'); ?>>Behave Desktop</option>
    </select>
  </div>
  <div>
    <label for="quasarwp-settings-rqdrawer-separator">Separator type:</label>
    <select name="quasarwp-settings[rqdrawer-separator]" id="quasarwp-settings-rqdrawer-separator">
      <option value="none" <?php selected($options['rqdrawer-separator'], 'none'); ?>>None</option>
      <option value="elevated" <?php selected($options['rqdrawer-separator'], 'elevated'); ?>>Elevated</option>
      <option value="bordered" <?php selected($options['rqdrawer-separator'], 'bordered'); ?>>Bordered</option>
    </select>
  </div>
</td>
