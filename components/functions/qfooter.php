<th scope="row">QFooter:</th>
<td>
  <div>
    <label for="quasarwp-settings-qfooter-reveal">
      <input name="quasarwp-settings[qfooter-reveal]" type="checkbox" value="1" <?php checked(isset($options['qfooter-reveal'])); ?> id="quasarwp-settings-qfooter-reveal" />
      Footer Reveal
    </label>
    <br>
    <label for="quasarwp-settings-qfooter-icon">
      <input name="quasarwp-settings[qfooter-icon]" type="checkbox" value="1" <?php checked(isset($options['qfooter-icon'])); ?> id="quasarwp-settings-qfooter-icon" />
      Show Site Icon
    </label>
  </div>
  <div style="padding: 10px 0 10px 0;">
    <label for="quasarwp-settings-qfooter-separator">Separator type:</label>
    <select name="quasarwp-settings[qfooter-separator]" id="quasarwp-settings-qfooter-separator">
      <option value="none" <?php selected($options['qfooter-separator'], 'none'); ?>>None</option>
      <option value="elevated" <?php selected($options['qfooter-separator'], 'elevated'); ?>>Elevated</option>
      <option value="bordered" <?php selected($options['qfooter-separator'], 'bordered'); ?>>Bordered</option>
    </select>
  </div>
</td>
