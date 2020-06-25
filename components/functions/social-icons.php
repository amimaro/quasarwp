<th scope="row">Social Icons:</th>
<td>
  <div>
    <!-- <input type="text" name="quasarwp-settings[layout]" value="<?php echo $options['layout']; ?>" /> -->
    <table>
      <thead>
        <th>Media</th>
        <th>Enabled</th>
        <th>Icon</th>
      </thead>
      <tbody>
        <tr>
          <td style="padding: 0px;"><label for="quasarwp-social-whatsapp">Whatsapp</label></td>
          <td style="padding: 0px;">
            <input name="quasarwp-settings[whatsapp]" type="checkbox" value="1" <?php checked(isset($options['whatsapp'])); ?> id="quasarwp-settings-whatsapp" />
          </td>
          <td style="padding: 0px;"><input type="text" name="quasarwp-settings[whatsapp-icon]" value="<?php echo $options['whatsapp-icon']; ?>" /></td>
        </tr>
        <tr>
          <td style="padding: 0px;"><label for="quasarwp-social-telegram">Telegram</label></td>
          <td style="padding: 0px;">
            <input name="quasarwp-settings[telegram]" type="checkbox" value="1" <?php checked(isset($options['telegram'])); ?> id="quasarwp-settings-telegram" />
          </td>
          <td style="padding: 0px;"><input type="text" name="quasarwp-settings[telegram-icon]" value="<?php echo $options['telegram-icon']; ?>" /></td>
        </tr>
        <tr>
          <td style="padding: 0px;"><label for="quasarwp-social-facebook">Facebook</label></td>
          <td style="padding: 0px;">
            <input name="quasarwp-settings[facebook]" type="checkbox" value="1" <?php checked(isset($options['facebook'])); ?> id="quasarwp-settings-facebook" />
          </td>
          <td style="padding: 0px;"><input type="text" name="quasarwp-settings[facebook-icon]" value="<?php echo $options['facebook-icon']; ?>" /></td>
        </tr>
        <tr>
          <td style="padding: 0px;"><label for="quasarwp-social-twitter">Twitter</label></td>
          <td style="padding: 0px;">
            <input name="quasarwp-settings[twitter]" type="checkbox" value="1" <?php checked(isset($options['twitter'])); ?> id="quasarwp-settings-twitter" />
          </td>
          <td style="padding: 0px;"><input type="text" name="quasarwp-settings[twitter-icon]" value="<?php echo $options['twitter-icon']; ?>" /></td>
        </tr>
        <tr>
          <td style="padding: 0px;"><label for="quasarwp-social-mail">E-mail</label></td>
          <td style="padding: 0px;">
            <input name="quasarwp-settings[mail]" type="checkbox" value="1" <?php checked(isset($options['mail'])); ?> id="quasarwp-settings-mail" />
          </td>
          <td style="padding: 0px;"><input type="text" name="quasarwp-settings[mail-icon]" value="<?php echo $options['mail-icon']; ?>" /></td>
        </tr>
        <tr>
          <td style="padding: 0px;"><label for="quasarwp-social-linkedin">Linkedin</label></td>
          <td style="padding: 0px;">
            <input name="quasarwp-settings[linkedin]" type="checkbox" value="1" <?php checked(isset($options['linkedin'])); ?> id="quasarwp-settings-linkedin" />
          </td>
          <td style="padding: 0px;"><input type="text" name="quasarwp-settings[linkedin-icon]" value="<?php echo $options['linkedin-icon']; ?>" /></td>
        </tr>
        <tr>
          <td style="padding: 0px;"><label for="quasarwp-social-reddit">Reddit</label></td>
          <td style="padding: 0px;">
            <input name="quasarwp-settings[reddit]" type="checkbox" value="1" <?php checked(isset($options['reddit'])); ?> id="quasarwp-settings-reddit" />
          </td>
          <td style="padding: 0px;"><input type="text" name="quasarwp-settings[reddit-icon]" value="<?php echo $options['reddit-icon']; ?>" /></td>
        </tr>
        <tr>
          <td style="padding: 0px;"><label for="quasarwp-social-pinterest">Pinterest</label></td>
          <td style="padding: 0px;">
            <input name="quasarwp-settings[pinterest]" type="checkbox" value="1" <?php checked(isset($options['pinterest'])); ?> id="quasarwp-settings-pinterest" />
          </td>
          <td style="padding: 0px;"><input type="text" name="quasarwp-settings[pinterest-icon]" value="<?php echo $options['pinterest-icon']; ?>" /></td>
        </tr>
      </tbody>
    </table>
  </div>
</td>
<script>
  const setDefaultTheme = function() {
    document.getElementById('quasarwp-theme-primary').value = '#027be3'
    document.getElementById('quasarwp-theme-secondary').value = '#26a69a'
    document.getElementById('quasarwp-theme-accent').value = '#9c27b0'
    document.getElementById('quasarwp-theme-dark').value = '#1d1d1d'
    document.getElementById('quasarwp-theme-positive').value = '#21ba45'
    document.getElementById('quasarwp-theme-negative').value = '#c10015'
    document.getElementById('quasarwp-theme-info').value = '#31ccec'
    document.getElementById('quasarwp-theme-warning').value = '#f2c037'
  }
</script>
