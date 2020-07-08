<th scope="row">Language Pack:</th>
<td>
  <div>
    <select name="quasarwp-settings[language]" id="quasarwp-settings-language">
      <?php
      foreach ($languages as $key => &$lang) {
        echo '<option value="' . esc_html($key) . '" ' . selected($options['language'], $key) . '>' . esc_html($lang) . '</option>';
      }
      ?>
    </select>
  </div>
</td>
