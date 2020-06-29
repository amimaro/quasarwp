<th scope="row">QHeader:</th>
<td>
  <div>
    <label for="quasarwp-settings-qheader-menu">
      <input name="quasarwp-settings[qheader-menu]" type="checkbox" value="1" <?php checked(isset($options['qheader-menu'])); ?> id="quasarwp-settings-qheader-menu" />
      Header Menu
    </label>
    <br>
    <label for="quasarwp-settings-qheader-reveal">
      <input name="quasarwp-settings[qheader-reveal]" type="checkbox" value="1" <?php checked(isset($options['qheader-reveal'])); ?> id="quasarwp-settings-qheader-reveal" />
      Header Reveal
    </label>
    <br>
    <label for="quasarwp-settings-qheader-icon">
      <input name="quasarwp-settings[qheader-icon]" type="checkbox" value="1" <?php checked(isset($options['qheader-icon'])); ?> id="quasarwp-settings-qheader-icon" />
      Show Site Icon
    </label>
    <br>
    <label for="quasarwp-settings-qheader-name">
      <input name="quasarwp-settings[qheader-name]" type="checkbox" value="1" <?php checked(isset($options['qheader-name'])); ?> id="quasarwp-settings-qheader-name" />
      Show Site Name
    </label>
    <br>
    <label for="quasarwp-settings-qheader-search">
      <input name="quasarwp-settings[qheader-search]" type="checkbox" value="1" <?php checked(isset($options['qheader-search'])); ?> id="quasarwp-settings-qheader-search" />
      Search Input
    </label>
  </div>
  <div style="padding: 10px 0 10px 0;">
    <label for="quasarwp-settings-qheader-separator">Separator type:</label>
    <select name="quasarwp-settings[qheader-separator]" id="quasarwp-settings-qheader-separator">
      <option value="none" <?php selected($options['qheader-separator'], 'none'); ?>>None</option>
      <option value="elevated" <?php selected($options['qheader-separator'], 'elevated'); ?>>Elevated</option>
      <option value="bordered" <?php selected($options['qheader-separator'], 'bordered'); ?>>Bordered</option>
    </select>
  </div>
</td>
