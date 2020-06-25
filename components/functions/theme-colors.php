<th scope="row">Theme:</th>
<td>
  <div>
    <!-- <input type="text" name="quasarwp-settings[layout]" value="<?php echo $options['layout']; ?>" /> -->
    <table>
      <thead>
        <th>Class</th>
        <th>Color</th>
      </thead>
      <tbody>
        <tr>
          <td style="padding: 0px;"><label for="quasarwp-theme-primary">Primary</label></td>
          <td style="padding: 0px;"><input type="color" id="quasarwp-theme-primary" name="quasarwp-settings[theme-primary]" value="<?php echo $options['theme-primary']; ?>"></td>
        </tr>
        <tr>
          <td style="padding: 0px;"><label for="quasarwp-theme-secondary">Secondary</label></td>
          <td style="padding: 0px;"><input type="color" id="quasarwp-theme-secondary" name="quasarwp-settings[theme-secondary]" value="<?php echo $options['theme-secondary']; ?>"></td>
        </tr>
        <tr>
          <td style="padding: 0px;"><label for="quasarwp-theme-accent">Accent</label></td>
          <td style="padding: 0px;"><input type="color" id="quasarwp-theme-accent" name="quasarwp-settings[theme-accent]" value="<?php echo $options['theme-accent']; ?>"></td>
        </tr>
        <tr>
          <td style="padding: 0px;"><label for="quasarwp-theme-dark">Dark</label></td>
          <td style="padding: 0px;"><input type="color" id="quasarwp-theme-dark" name="quasarwp-settings[theme-dark]" value="<?php echo $options['theme-dark']; ?>"></td>
        </tr>
        <tr>
          <td style="padding: 0px;"><label for="quasarwp-theme-positive">Positive</label></td>
          <td style="padding: 0px;"><input type="color" id="quasarwp-theme-positive" name="quasarwp-settings[theme-positive]" value="<?php echo $options['theme-positive']; ?>"></td>
        </tr>
        <tr>
          <td style="padding: 0px;"><label for="quasarwp-theme-negative">Negative</label></td>
          <td style="padding: 0px;"><input type="color" id="quasarwp-theme-negative" name="quasarwp-settings[theme-negative]" value="<?php echo $options['theme-negative']; ?>"></td>
        </tr>
        <tr>
          <td style="padding: 0px;"><label for="quasarwp-theme-info">Info</label></td>
          <td style="padding: 0px;"><input type="color" id="quasarwp-theme-info" name="quasarwp-settings[theme-info]" value="<?php echo $options['theme-info']; ?>"></td>
        </tr>
        <tr>
          <td style="padding: 0px;"><label for="quasarwp-theme-warning">Warning</label></td>
          <td style="padding: 0px;"><input type="color" id="quasarwp-theme-warning" name="quasarwp-settings[theme-warning]" value="<?php echo $options['theme-warning']; ?>"></td>
        </tr>
      </tbody>
    </table>
    <br>
    <input type="button" class="button button-secondary" value="Set Default Theme" onclick="setDefaultTheme()">
  </div>
</td>
