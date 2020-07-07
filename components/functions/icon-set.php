<th scope="row">Icon Set:</th>
<td>
  <div>
    <select name="quasarwp-settings[icon-set]" id="quasarwp-settings-icon-set">
      <?php
      foreach ($iconSets as $key => &$iconSet) {
        echo '<option value="' . esc_html($key) . '" ' . esc_html(selected($options['icon-set'], $key)) . '>' . esc_html($iconSet) . '</option>';
      }
      ?>
    </select>
  </div>
</td>
