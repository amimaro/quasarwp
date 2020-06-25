<th scope="row">Language Pack:</th>
<td>
  <div>
    <select name="quasarwp-settings[language]" id="quasarwp-settings-language">
      <?php
      foreach ($languages as $key => &$lang) {
        echo '<option value="' . $key . '" ' . selected($options['language'], $key) . '>' . $lang . '</option>';
      }
      ?>
    </select>
  </div>
</td>
