<th scope="row">Tabs:</th>
<td>
  <div>
    <label for="quasarwp-settings-qtabs">
      <input name="quasarwp-settings[qtabs]" type="checkbox" value="1" <?php checked(isset($options['qtabs'])); ?> id="quasarwp-settings-qtabs" />
      Enabled
    </label>
  </div>
  <div style="padding: 10px 0 10px 0;">
    <label for="quasarwp-settings-qtabs-position">Position:</label>
    <select name="quasarwp-settings[qtabs-position]" id="quasarwp-settings-qtabs-position">
      <option value="left" <?php selected($options['qtabs-position'], 'left'); ?>>Left</option>
      <option value="center" <?php selected($options['qtabs-position'], 'center'); ?>>Center</option>
      <option value="right" <?php selected($options['qtabs-position'], 'right'); ?>>Right</option>
    </select>
  </div>
</td>
